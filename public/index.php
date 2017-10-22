<?php
/**
 * This makes our life easier when dealing with paths. 
 * Everything is relative to the application root now.
 */
chdir(dirname(__DIR__));

/**
 * Composer autoloading
 */
require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Setup default timezone to 'Asia/Shanghai'
 */
date_default_timezone_set('Asia/Shanghai');

/**
 * Self-called anonymous function that creates its own scope 
 * and keep the global namespace clean.
 */
call_user_func(function () {
    $app = Zend\Expressive\AppFactory::create();
    $app->pipe('/api', function(){
        return new Zend\Diactoros\Response\JsonResponse([
            'welcome' => 'hello world.'
        ]);
    });
    $app->pipeRoutingMiddleware();
    $app->pipeDispatchMiddleware();
    $app->run();
});
