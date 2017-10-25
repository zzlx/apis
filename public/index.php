<?php
/**
 * This makes our life easier when dealing with paths. 
 * Everything is relative to the application root now.
 * API服务部署时，应调整入口程序的根目录位置 
 *
 */
chdir(dirname(__DIR__));

/**
 * Composer autoloading
 */
require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Setup default timezone to 'Asia/Shanghai'
 *
 */
date_default_timezone_set('Asia/Shanghai');

/**
 * Self-called anonymous function that creates its own scope 
 * and keep the global namespace clean.
 * 
 * @see https://docs.zendframework.com/zend-expressive/ 
 */
call_user_func(function () {
    $container = require dirname(__DIR__) . '/config/container.php'; 

    Zend\Expressive\AppFactory::create()->pipe(
        '/api', $container->get(Zend\Expressive\Application::class)
    )->run();
});
