<?php

namespace ClippyKB\Content;


use Stem\Content\Models\ACFLink;
use Stem\Content\Models\ContentBlock;
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * @package MediaCloudPress\Content
 *
 * @property-read string $title
 * @property-read string $placeholder
 */
class BigSearch extends ContentBlock {
	public static function identifier() {
		return 'big-search';
	}

	public static function title() {
		return "Big Search";
	}

	public static function buildFields() {
		$builder = new FieldsBuilder(static::identifier());

		$builder
			->addText('title', ['required' => 1, 'default_value' => 'How can we help?'])
				->setInstructions('The title for the block')
			->addText('placeholder', ['required' => 1, 'default_value' => 'Search the knowledge base ...'])
				->setInstructions('The placeholder text used in the search text field')
		;

		return $builder;
	}

	public static function contentTargets() {
		return ['pre_content'];
	}
}