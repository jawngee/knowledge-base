<?php

/**
 * This is the configuration for WordPress admin.
 */

return [
	// Controls what appears on the dashboard
	'dashboard' => [
		// Remove these build in WordPress widgets
		'remove' => [
			'dashboard/normal/core/dashboard_right_now',
			'dashboard/normal/core/dashboard_activity',
			'dashboard/side/core/dashboard_quick_press',
			'dashboard/side/core/dashboard_primary'
		],

		// Add these custom widgets
	    'add' => [
	    ]
	],

	// Customizes the appearance
    'customize' => [
    	// css or js to enqueue, files should be in public/css or public/js
	    // these files are enqueued for BOTH admin and login
        'enqueue' => [
            'js' => [
	            'kb-admin.js'
            ],
            'css' => [
            	'kb-admin.css'
            ]
        ],

    	// Login customization
    	'login' => [
    		// Logo to display
    		'logo' => [
    			'src' => 'logo-kb.svg',
		        'width' => 256,  // height = width * 0.219343696
		        'height' => 56 // width = height * 4.559055118
		    ]
	    ],

	    // Configures the admin bar
        "admin-bar" => [
        	// a value of false will disable the item
            'wp-logo' => false,
            'comments' => false,
			// Make the home link open in a new tab and lose the title
            'site-name' => [
	            'title' => '',
	            'href' => get_bloginfo('url'),
	            'meta' => [
		            'target' => '_blank'
	            ]
            ],
            // This option is redundant, so let's remove it
            'view-site' => false,
        ],

	    // Admin footer customization
        'footer' => [
        	// Text to display at the bottom of the admin
        	'text' => 'Built with <a href="https://stem.press/">Stem</a>.'
        ]
    ],

	// Admin pages
	'pages' => [

	]
];