<?php

namespace ClippyKB\Models;

use Stem\Models\Attachment;
use Stem\Models\Taxonomy;
use Stem\Models\Utilities\TaxonomyBuilder;
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Class ArticleCategory
 * @package ClippyKB\Models
 */
class ArticleCategory extends Taxonomy {
	public function register() {
		$taxBuilder = new TaxonomyBuilder('article-category', 'Category', 'Categories');
		$taxBuilder
			->setUi(true)
			->setHierarchical(true)
			->setRewriteSlug('articles')
			->setShowInRest(true)
			->setShowInMenu(true)
			->setShowInNavMenus(true)
			->setRewriteWithFront(false)
			->setRewriteHierarchical(true)
			->register();


		if (function_exists('acf_add_local_fields')) {
			$builder = new FieldsBuilder('Category Icon', ['position' => 'acf_after_title', 'menu_order' => 0]);
			$builder
				->addImage("icon", ['return_format' => 'id', 'preview_size' => 'thumbnail'])
					->setInstructions("The Icon to display for this category.  Should be SVG without a width/height attribute set on it.")
				->setLocation('taxonomy', '==', 'article-category');

			acf_add_local_field_group($builder->build());
		}
	}
}