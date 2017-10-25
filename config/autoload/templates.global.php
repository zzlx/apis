<?php

return [
    'dependencies' => [
        'factories' => [
            Zend\Expressive\FinalHandler::class =>
                Zend\Expressive\Container\TemplatedErrorHandlerFactory::class,

            Zend\Expressive\Template\TemplateRendererInterface::class =>
                Zend\Expressive\Plates\PlatesRendererFactory::class,

            //Zend\View\HelperPluginManager::class =>
                //Zend\Expressive\ZendView\HelperPluginManagerFactory::class,
        ],
    ],

    'templates' => [
        'layout' => 'layout/default',
        'map' => [
            'layout/default' => dirname(dirname(__DIR__)) . '/templates/layout/default.phtml',
            'error/error'    => dirname(dirname(__DIR__)) . '/templates/error/error.phtml',
            'error/404'      => dirname(dirname(__DIR__)) . '/templates/error/404.phtml',
        ],
        'paths' => [
            'layout' => [dirname(dirname(__DIR__)) . '/templates/layout'],
            'error'  => [dirname(dirname(__DIR__)) . '/templates/error'],
        ],
    ],

    'view_helpers' => [
        // zend-servicemanager-style configuration for adding view helpers:
        // - 'aliases'
        // - 'invokables'
        // - 'factories'
        // - 'abstract_factories'
        // - etc.
    ],
];

