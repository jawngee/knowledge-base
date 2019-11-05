<?php

namespace ClippyKB\Content;

use Stem\Content\Models\ContentBlock;
use Stem\Core\Context;
use Stem\Models\Page;
use Stem\Models\Post;
use Stem\Models\Term;

/**
 * @package MediaCloudPress\Content
 *
 * @property-read HelpTopicTerm[] $terms
 */
class HelpTopics extends ContentBlock {
	private $_terms = null;

	public static function identifier() {
		return 'help-topics';
	}

	public static function title() {
		return "Help Topics";
	}

	public static function contentTargets() {
		return ['main_content'];
	}

	public function __construct(Context $context, $data = null, Post $post = null, Page $page = null, $template = null) {
		parent::__construct($context, $data, $post, $page, $template);

		$query = new \WP_Term_Query([
			'taxonomy' => 'article-category',
			'hide_empty' => false,
			'number' => (int)0
		]);

		$this->_terms = [];

		/** @var \WP_Term $term */
		foreach($query->terms as $term) {
			if (empty($term->parent)) {
				$topicTerm = new HelpTopicTerm($term);
				$this->_terms[] = $topicTerm;

				/** @var \WP_Term $subTerm */
				foreach($query->terms as $subTerm) {
					if ($subTerm->parent === $term->term_id) {
						$subTerm = new HelpTopicTerm($subTerm);
						$subTerm->parent = $topicTerm;
					}
				}
			}
		}
	}

	public function __get($name) {
		if ($name === 'terms') {
			return $this->_terms;
		}

		return parent::__get($name);
	}
}