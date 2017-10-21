<?php
/**
 * Setup default timezone to 'Asia/Shanghai'
 */
date_default_timezone_set('Asia/Shanghai');

/**
 * This makes our life easier when dealing with paths. 
 * Everything is relative to the application root now.
 */
chdir(dirname(dirname(dirname(dirname(__DIR__)))));

/**
 * Composer autoloading
 */
require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Self-called anonymous function that creates its own scope 
 * and keep the global namespace clean.
 */
call_user_func(function () {
    // Load configuration
    $container = require dirname(__DIR__) . '/config/container.php';

	$app = $container->get(Zend\Expressive\Application::class);
    $app->run();
});
