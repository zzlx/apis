<?php
return [
    'dependencies' => [
        'aliases' => [
            // Expressive 2.0:
            'Zend\Expressive\Delegate\DefaultDelegate' => 'Zend\Expressive\Delegate\NotFoundDelegate',
        ],
        'invokables' => [
            'Zend\Expressive\Router\RouterInterface'     => 'Zend\Expressive\Router\FastRouteRouter',
            'Zend\Expressive\Template\TemplateRendererInterface' => 'Zend\Expressive\Plates\PlatesRenderer'
        ],
        'factories' => [
            'Zend\Expressive\Application'       => 'Zend\Expressive\Container\ApplicationFactory',
            'Zend\Expressive\Whoops'            => 'Zend\Expressive\Container\WhoopsFactory',
            'Zend\Expressive\WhoopsPageHandler' => 'Zend\Expressive\Container\WhoopsPageHandlerFactory',

            // Expressive 2.X:
            'Zend\Expressive\Middleware\ErrorResponseGenerator' => 'Zend\Expressive\Container\ErrorResponseGeneratorFactory',
            'Zend\Stratigility\Middleware\ErrorHandler'    => 'Zend\Expressive\Container\ErrorHandlerFactory',
            'Zend\Expressive\Delegate\NotFoundDelegate'  => 'Zend\Expressive\Container\NotFoundDelegateFactory',
            'Zend\Expressive\Middleware\NotFoundHandler' => 'Zend\Expressive\Container\NotFoundHandlerFactory',
        ],
    ],
];
