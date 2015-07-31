<?php

return [
	'tag' => '',
	'test' => [
    	'Link to url' => 'bar',
    	'Link to external url' => 'http://bar',
    	[ 
    		'label' => 'Link to url', 
    		'route' => [ 'q', 'id' => '1' ] 
    	],
    	'Link to route' => [ 
    		'route' => [ 'q', 'id' => '1' ] 
    	],
	]
];