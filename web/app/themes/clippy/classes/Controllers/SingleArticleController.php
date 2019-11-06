<?php

namespace ClippyKB\Controllers;

use ClippyKB\Content\HelpTopicTerm;
use ClippyKB\Models\Article;
use Stem\Content\Controllers\ContentPostController;
use Stem\Core\Context;
use Stem\Models\Term;
use Symfony\Component\HttpFoundation\Request;

class SingleArticleController extends ContentPostController {
	protected $targetPagePath = 'templates/article';

	public function __construct(Context $context, $template = null) {
		parent::__construct($context, 'templates.article');
	}

	public function getIndex(Request $request) {
		$terms = $this->post->tax('article-category');
		$currentTerm = array_shift($terms);

		$termList = [];

		if (!empty($currentTerm->parent())) {
			$termList[] = new HelpTopicTerm(\WP_Term::get_instance($currentTerm->parent()->id()));
		}

		$termList[] = new HelpTopicTerm(\WP_Term::get_instance($currentTerm->id()));

		$data = $this->addIndexData([
			'errors' => [],
			'params' => $request->request,
			'post' => $this->post,
			'page' => $this,
			'termList' => $termList
		]);

		if ($request->query->has('json')) {
			$related = [];

			/** @var Article $relatedArticle */
			foreach($this->post->related as $relatedArticle) {
				$related[] = [
					'url' => $relatedArticle->permalink,
					'title' => $relatedArticle->title,
					'excerpt' => $relatedArticle->excerpt(50, false, null)
				];
			}

			wp_send_json([
				'title' => $this->post->title,
				'content' => $this->post->content,
				'related' => $related,
			], 200);
		} else {
			return $this->renderContent($request->query->get('partial'), $request->query->get('partial-target'), $this->template, $data);
		}

	}
}