<?php

namespace ClippyKB\Controllers;

use ClippyKB\Models\Article;
use Stem\Content\Controllers\ContentPostsController;
use Stem\Controllers\PostsController;
use Stem\Core\Context;

class SearchController extends ContentPostsController {
	protected $targetPagePath = 'templates/search';

	public function __construct(Context $context, $template = null) {
		parent::__construct($context, 'templates.search-results');
	}
}