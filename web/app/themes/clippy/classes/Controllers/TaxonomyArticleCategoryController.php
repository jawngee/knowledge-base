<?php

namespace ClippyKB\Controllers;

use ClippyKB\Content\HelpTopicTerm;
use ClippyKB\Models\Article;
use Stem\Content\Controllers\ContentPostsController;
use Stem\Controllers\PostsController;
use Stem\Core\Context;
use Symfony\Component\HttpFoundation\Request;

class TaxonomyArticleCategoryController extends ContentPostsController {
	protected $targetPagePath = 'templates/taxonomy-landing';

	public function __construct(Context $context, $template = null) {
		parent::__construct($context, 'templates.article-category');
	}

	public function addIndexData($data) {
		global $wp_query;

		/** @var \WP_Term $term */
		$term = $wp_query->queried_object;

		$this->title = $term->name;

		$termList = [];
		$childTerms = [];

		if (!empty($term->parent)) {
			$parentTerm = new HelpTopicTerm(\WP_Term::get_instance($term->parent));
			$termList[] = $parentTerm;
			$termList[] = new HelpTopicTerm($term);
		} else {
			$parentTerm = new HelpTopicTerm($term);
			$termList[] = $parentTerm;
		}

		$termQuery = new \WP_Term_Query([
			'taxonomy' => 'article-category',
			'number' => 0,
			'parent' => $parentTerm->term->term_id
		]);

		foreach($termQuery->terms as $childTerm) {
			$childTopicTerm = new HelpTopicTerm($childTerm);
			$childTopicTerm->parent = $parentTerm;
			$childTerms[] = $childTopicTerm;
		}


		$data['currentTerm'] = new HelpTopicTerm($term);
		$data['termList'] = $termList;
		$data['childTerms'] = $childTerms;

		return parent::addIndexData($data);
	}
}