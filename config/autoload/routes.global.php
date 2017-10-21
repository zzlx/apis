<?php
return [
    'dependencies' => [
        'invokables' => [
        ],
        'factories'  => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\FastRouteRouterFactory::class,
        ],
    ],

    'router' => [ 
        'fastroute' => [ 
            // Enable caching support:
            'cache_enabled' => true,
             // Optional (but recommended) cache file path:
            'cache_file'    => 'var/cache/fastroute.php',
        ],
    ],

    'routes' => [],
];

