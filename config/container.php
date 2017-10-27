<?php

use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;

// Load configuration
$config = require __DIR__ . '/config.php';

// Build container
$container = new ServiceManager();

(new Config($config['dependencies']))->configureServiceManager($container);

$container->setService('config', $config);

// Inject config

return $container;
