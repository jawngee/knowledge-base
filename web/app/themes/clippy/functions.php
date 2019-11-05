<?php

/**
 * This file bootstraps your Stem app.  Whatever you'd normally do in a functions.php file you can do in the "onSetup"
 * callback down at the bottom of the file.
 *
 * If you are using composer for whatever, make sure you uncomment out the require_once line below too.
 */

/**
 * Must include this for trellis deploys.
 */
if (!class_exists(\Stem\Core\Context::class)) {
    return;
}

if (file_exists(dirname(__FILE__).'/vendor/autoload.php')) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

function termHierarchyPath(\WP_Term $term) {
	$result = '';

	while(true) {
		$result = $term->slug . '/'. $result;

		if (empty($term->parent)) {
			break;
		}

		$term = get_term($term->parent);
		if (is_wp_error($term)) {
			break;
		}
	}


	return $result;
}


/**
 * Create the context for this theme.
 *
 */
$context=\Stem\Core\Context::initialize(dirname(__FILE__));

/**
 * Setup functions
 */
$context->onSetup(function() use ($context) {
	add_filter('upload_mimes', function($mimes){
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	});

	\PressBits\MediaLibrary\ScalableVectorGraphicsDisplay::enable();


	/**
	 * Required to get article category hierarchy path URLs working.  Maybe there is a less manual way?
	 */
	add_filter('post_type_link', function($link, \WP_Post $post)	{
		if ($post->post_type !== 'article') {
			return $link;
		}

		$cats = get_the_terms($post->ID, 'article-category');

		if (!empty($cats)) {
			$firstCat = array_pop($cats);
			$catPath = termHierarchyPath($firstCat);

			$link = home_url(trailingslashit('/articles/'.$catPath).$post->post_name);
		}

		return $link;
	}, 10, 2);

	/**
	 * Provide very specific rewrite rules to cover:
	 *
	 * /articles
	 * /articles/page/{page}
	 * /articles/{category}
	 * /articles/{category}/page/{page}
	 * /articles/{category}/{subcategory}
	 * /articles/{category}/{subcategory}/page/{page}
	 * /articles/{category}/{subcategory}/{article}
	 * /articles/{category}/{article}
	 *
	 */
	add_action('generate_rewrite_rules', function(\WP_Rewrite $wp_rewrite) {
		$articleCats = new \WP_Term_Query([
			'taxonomy' => 'article-category',
			'hide_empty' => true,
			'number' => (int)0
		]);

		$new_rules = [
			'articles/?$' => 'index.php?post_type=article',
			'articles/page/(\d{1,})/?$' => 'index.php?post_type=article&paged='.$wp_rewrite->preg_index(1),
			'articles/([^/]+)/?$' => 'index.php?article-category='.$wp_rewrite->preg_index(1),
			'articles/([^/]+)/page/(\d{1,})/?$' => 'index.php?article-category='.$wp_rewrite->preg_index(1).'&paged='.$wp_rewrite->preg_index(2),
		];

		foreach($articleCats->terms as $term) {
			if (empty($term->parent)) {
				foreach($articleCats->terms as $childTerm) {
					if ($childTerm->parent === $term->term_id) {
						$new_rules["articles/{$term->slug}/{$childTerm->slug}/?$"] = 'index.php?article-category='.$childTerm->slug;
						$new_rules["articles/{$term->slug}/{$childTerm->slug}/page/(\d{1,})/?$"] = 'index.php?article-category='.$childTerm->slug.'&paged='.$wp_rewrite->preg_index(2);
						$new_rules["articles/{$term->slug}/{$childTerm->slug}/([^/]+)/?$"] = 'index.php?article-category='.$childTerm->slug. '&article=' . $wp_rewrite->preg_index(1);
					}
				}

				$new_rules["articles/{$term->slug}/([^/]+)/?$"] = 'index.php?article-category='.$term->slug. '&article=' . $wp_rewrite->preg_index(1);
			}
		}

		$wp_rewrite->rules = array_merge($new_rules, $wp_rewrite->rules);
	});


	/**
	 * Make sure SEO Framework is below the content block editors
	 */
	add_filter('the_seo_framework_metabox_priority', function () {
		return 'low';
	});

	/**
	 * For syntax highlighting in Gutenberg
	 */
	add_filter('syntax_highlighting_code_block_style', function() {
			return 'github';
	});

	/**
	 * Auto flush rewrite rules when a post is published or updated.
	 */
	add_action('save_post', function($post_id) {
		update_option('clippy_flush_rewrite_rules', 1);
	});

	add_action('init', function() {
		if (is_admin() && !empty(get_option('clippy_flush_rewrite_rules'))) {
			flush_rewrite_rules();
			delete_option('clippy_flush_rewrite_rules');
		}
	}, PHP_INT_MAX);

	add_filter('searchwp_live_search_configs', function($configs) {
		$configs['default']['results']['offset']['y'] = 0;
		return $configs;
	});

	add_action('wp_enqueue_scripts', function () {
		wp_dequeue_style( 'searchwp-live-search' );
	});
});