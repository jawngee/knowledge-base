<?php

namespace ClippyKB\Controllers;

use ClippyKB\Models\Article;
use Stem\Controllers\PostsController;
use Stem\Core\Context;

class ArchiveArticleController extends PostsController {
	public function __construct(Context $context, $template = null) {
		parent::__construct($context, 'templates.article-archive');
	}
}