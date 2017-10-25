<?php
return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\FastRouteRouter::class,
        ],
    ],

    'router' => [ 
        'fastroute' => [ 
            // Enable caching support:
            'cache_enabled' => true,
             // Optional (but recommended) cache file path:
            'cache_file'    => 'data/cache/fastroute.php',
        ],
    ],
];

