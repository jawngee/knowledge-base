<?php

return [
	/*
	 * Make our template pages not viewable by the public
	 */
	'get:templates/{which}' => [
		'early' => true,
		"requirements" => [
			'which' => '.*'
		],
		'function' => function() {
			return \Symfony\Component\HttpFoundation\RedirectResponse::create('/');
		}
	]
];