<?php

namespace ClippyKB\Controllers;

use ClippyKB\Content\HelpTopicTerm;
use Stem\Content\Controllers\ContentPostController;
use Stem\Core\Context;
use Stem\Models\Term;

class SingleArticleController extends ContentPostController {
	protected $targetPagePath = 'templates/article';

	public function __construct(Context $context, $template = null) {
		parent::__construct($context, 'templates.article');
	}

	public function addIndexData($data) {
		$terms = $this->post->tax('article-category');
		$currentTerm = array_shift($terms);

		$termList = [];

		if (!empty($currentTerm->parent())) {
			$termList[] = new HelpTopicTerm(\WP_Term::get_instance($currentTerm->parent()->id()));
		}

		$termList[] = new HelpTopicTerm(\WP_Term::get_instance($currentTerm->id()));

		$data['termList'] = $termList;

		return parent::addIndexData($data);
	}
}