<?php

/**
 * This configuration controls image sizes and other things related to that.
 */

return [
	// Controls which of WordPress's default sizes are enabled or disabled.
	"disable-wp-sizes" => [
		//    "medium",
		//    "small",
		//    "large"
	],

	// Defines the image sizes you'll use in this app.
	"sizes" => [
		"help-topic-list" => [
			'width' => 64,
			'height' => 48,
			'crop' => false
		],
	],

	// Allows you to define alternate sizes for the srcset attribute for images using a particular
	// size in your theme
	"srcset" => [
		"full" => [
			"srcset" => [
				"1024" => [
					"width" => 1024,
					"height" => 15000,
					"crop" => false
				],
				"768" => [
					"width" => 768,
					"height" => 15000,
					"crop" => false
				],
				"320" => [
					"width" => 320,
					"height" => 15000,
					"crop" => false
				]
			]
		]
	]
];