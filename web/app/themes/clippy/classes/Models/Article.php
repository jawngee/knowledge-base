<?php

namespace ClippyKB\Models;

use Stem\External\Blade\Directives\InlineSVGDirective;
use Stem\Models\Post;
use Stem\Models\Utilities\CustomPostTypeBuilder;
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Class FAQ
 * @package ClippyKB\Models
 *
 */
class Article extends Post {
	#region Static Post Properties
	protected static $postType = 'article';

	/**
	 * Perform any related initialization
	 */
	public static function initialize() {
	}


	public static function postTypeProperties() {
		$builder = new CustomPostTypeBuilder(static::$postType, 'Article', 'Articles', static::$postType);
		return $builder
			->showInRest(true)
			->supportsTitle(true)
			->supportsThumbnail(false)
			->supportsEditor(true)
			->supportsExcerpt(true)
			->supportsPageAttributes(false)
			->excludeFromSearch(false)
			->publicQueryable(true)
			->hierarchical(false)
			->addTaxonomy('article-category')
			->menuIcon('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB2aWV3Qm94PSIwIDAgMTM0IDEwMCIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj4KICAgIDxnIGlkPSJQYWdlLTEiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPgogICAgICAgIDxnIGlkPSJub3VuX3NjaG9sYXJfMTc0MjgzNyIgZmlsbD0iIzAwMDAwMCIgZmlsbC1ydWxlPSJub256ZXJvIj4KICAgICAgICAgICAgPGcgaWQ9Ikdyb3VwIj4KICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik0xMjYuMiwxMS44IEMxMjQuNywxMS4zIDEyMy4xLDEyLjYgMTIzLjEsMTQuNCBMMTIzLjEsNzguMiBDMTIzLjEsODAuMyAxMjEuMyw4MiAxMTkuMyw4MiBMMTQuMSw4MiBDMTIsODIgMTAuMyw4MC4yIDEwLjMsNzguMiBMMTAuMywxNC42IEMxMC4zLDEyLjggOC4yLDExLjUgNi43LDEyLjMgQzIuOCwxNC4xIDAsMTguMiAwLDIzLjEgTDAsODIuMSBDMCw4Ny43IDQuNiw5Mi40IDEwLjMsOTIuNCBMNTIuNiw5Mi40IEM1NC43LDkyLjQgNTYuNCw5NC4yIDU2LjQsOTYuMiBDNTYuNCw5OC4zIDU4LjIsMTAwIDYwLjIsMTAwIEw3MywxMDAgQzc1LjEsMTAwIDc2LjgsOTguMiA3Ni44LDk2LjIgQzc2LjgsOTQuMSA3OC42LDkyLjQgODAuNiw5Mi40IEwxMjIuOSw5Mi40IEMxMjguNSw5Mi40IDEzMy4yLDg3LjggMTMzLjIsODIuMSBMMTMzLjIsMjMuMSBDMTMzLjMsMTcuNyAxMzEuNSwxMy4xIDEyNi4yLDExLjggWiIgaWQ9IlBhdGgiPjwvcGF0aD4KICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik03NS42LDcxLjggTDEwOSw3MS44IEMxMTEuMSw3MS44IDExMi44LDcwIDExMi44LDY4IEwxMTIuOCwzLjggQzExMi44LDEuNyAxMTEsMCAxMDksMCBMODAsMCBDNzYuMiwwIDcxLjgsMy4zIDcxLjgsNy43IEw3MS44LDY4IEM3MS44LDcwIDczLjYsNzEuOCA3NS42LDcxLjggWiIgaWQ9IlBhdGgiPjwvcGF0aD4KICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik0yNC40LDcxLjggTDU3LjcsNzEuOCBDNTkuOCw3MS44IDYxLjUsNzAgNjEuNSw2OCBMNjEuNSw3LjcgQzYxLjUsMy4zIDU2LjksMCA1My4zLDAgTDI0LjMsMCBDMjIuMiwwIDIwLjUsMS44IDIwLjUsMy44IEwyMC41LDY3LjkgQzIwLjUsNzAgMjIuMyw3MS44IDI0LjQsNzEuOCBaIiBpZD0iUGF0aCI+PC9wYXRoPgogICAgICAgICAgICA8L2c+CiAgICAgICAgPC9nPgogICAgPC9nPgo8L3N2Zz4=')
			->hasArchive(true)
			->rewrite('/articles/%article-category%/%postname%/')
			;
	}
	//endregion
}