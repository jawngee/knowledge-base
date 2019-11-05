<?php

/**
 * This is the main configuration for your app.
 */

return [
	// Namespace for the theme
	"namespace" => "\\ClippyKB",

	// Text domain
	"text-domain" => "clippy-kb",

    // List of WordPress plugins this theme requires or recommends
    // For options, view the docs at http://tgmpluginactivation.com/configuration/
    "plugins" => [
	    [
		    'name' => "Advanced Custom Fields Pro",
		    'slug' => 'advanced-custom-fields-pro',
		    'version' => '5.7.8+',
		    'required' => true,
		    'force_activation' => true
	    ],
	    [
	        'name' => "Stem Content",
	        'slug' => 'stem-content',
	        'version' => '0.3.1+',
	        'required' => true,
		    'force_activation' => true
        ]
    ],

    "options" => [
		// Disables XML-RPC
		"disable-xml-rpc" => true,
		// Disables WordPress's JSON API
		"disable-wp-json-api" => true,
		// Disables WordPress's dumb emoji nonsense
		"disable-emoji" => true,
		// Disable RSS
		"disable-rss" => true,

		// Controls caching HTTP headers
		"cache-control" => [
			// Enables/disable sending cache control headers
			"enabled" => true,
			// Turns on cache control headers metabox on posts and pages
			"metabox" => true,
			// Default cache-control values
			"default" => [
				// Can be: public | private | no-store | no-cache | no-store, no-cache
				"cache-control" => "public",
				// Max age to cache on proxy or browser in seconds
				"max-age" => 3200,
				// Max age to cache on proxy
				"s-maxage" => 86400
			]
		]
	],

	// Configuration for logging
	"logging" => [
		// For development environment
		"development" => [
			// For debug AND GREATER error levels
			"debug" => [
				// error_log()
				"phperror" => [
					"format" => [
						"output" => "%level_name% > %message% %context%",
						"date" => ""
					]
				],

				// Will log message to the browser's js console via console.log()
				"browser" => [],

				// syslog
				"syslog" => [
					"ident" => "stem"
				],

			]
		],

		// For production environment
		"production" => [
			// For error AND GREATER error levels
			"error" => [
				// error_log()
				"phperror" => [],
			],

			// for emergency error levels
			"emergency" => [
				"mail" => [
					"to" => "jon@interfacelab.com",
					"from" => "donotreply@interfacelab.com",
					"subject" => "Emergency on production"
				]
			]
		]
	],

	// search options
	"search-options" =>[
		// Post types to include in search
		"post-types" =>[
			"post"
		],
		"search_tags" => true
	],

	// Command line commands
	// This will register any WP CLI command line classes you have defined in your app
	"commands" => [
//		\MediaCloudPress\Commands\FeaturesCommand::class,
	],

	// Page Template Controllers
	// This maps a "template" to a page controller.  These "templates" will be available when editing
	// pages with the WordPress admin.
	"template-controllers" => [
//		'Documentation' => \MediaCloudPress\Controllers\DocumentationController::class,
	],

	// Controllers
	// This maps templates to a controller with the template appearing in the page editor
	"controllers" => [
//		'happening' => \MediaCloudPress\Controllers\Members\Happenings\HappeningController::class,
	],

	// Register any custom taxonomies
	'taxonomies' => [
		\ClippyKB\Models\ArticleCategory::class,
//		\MediaCloudPress\Models\FAQTag::class,
//		\MediaCloudPress\Models\FAQCategory::class,
	],

	// Register the application's models
	"models" => [
		\ClippyKB\Models\Article::class,
//		\MediaCloudPress\Models\Feature::class,
//		\MediaCloudPress\Models\FeatureCategory::class,
//		\MediaCloudPress\Models\Freemius\Customer::class,
//		\MediaCloudPress\Models\Freemius\Transaction::class,
//		\MediaCloudPress\Models\Freemius\Plan::class,
//		\MediaCloudPress\Models\FAQ::class,
//		\MediaCloudPress\Models\Freemius\Event::class,
//		\MediaCloudPress\Models\Promotion::class,
	],

	// Custom post types to model map
	// This will map a post with a specific "post_type" to a model
	// THIS IS DEPRECATED, use 'models' above instead
	"model-map" => [
	],

	// Redis background queue configuration
	'queue' => [
		'timeout' => 5,
		'driver' => [
			'host' => 'localhost',
			'port' => 6379,
			'scheme' => 'tcp'
		]
	],
];