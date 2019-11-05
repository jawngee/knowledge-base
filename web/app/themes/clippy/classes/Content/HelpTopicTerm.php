<?php

namespace ClippyKB\Content;

use Stem\Models\Attachment;

/**
 * @package MediaCloudPress\Content
 *
 * @property-read \WP_Term $term
 * @property HelpTopicTerm $parent
 * @property-read HelpTopicTerm[] $children
 * @property-read Attachment $icon
 */
class HelpTopicTerm {
	/** @var \WP_Term */
	private $_term;

	/** @var HelpTopicTerm|null  */
	private $_parent = null;

	/** @var HelpTopicTerm[]  */
	private $_children = [];

	/** @var Attachment|null  */
	private $_icon = null;

	public function __construct(\WP_Term $term) {
		$this->_term = $term;
	}

	public function __get($name) {
		if ($name === 'parent') {
			return $this->_parent;
		} else if ($name === 'children') {
			return $this->_children;
		} else if ($name === 'icon') {
			if ($this->_icon !== null) {
				return $this->_icon;
			}

			$iconId = get_field('icon', 'article-category_'.$this->_term->term_id);
			if (!empty($iconId)) {
				$this->_icon = Attachment::find($iconId);
			} else if (!empty($this->_parent)) {
				$this->_icon = $this->_parent->icon;
			} else if (!empty($this->_term->parent)) {
				$iconId = get_field('icon', 'article-category_'.$this->_term->parent);
				if (!empty($iconId)) {
					$this->_icon = Attachment::find($iconId);
				}
			}

			return $this->_icon;
		} else if ($name === 'term') {
			return $this->_term;
		}
	}

	public function __set($name, $value) {
		if ($name === 'parent') {
			$this->_parent = $value;
			$value->addChild($this);
		}
	}

	public function __isset($name) {
		if ($name === 'parent') {
			return isset($this->_parent);
		} else if ($name === 'children') {
			return isset($this->_children);
		} else if ($name === 'icon') {
			return isset($this->_icon);
		} else if ($name === 'term') {
			return isset($this->_term);
		}

		return isset($this->{$name});
	}

	public function addChild($child) {
		$this->_children[] = $child;
	}
}