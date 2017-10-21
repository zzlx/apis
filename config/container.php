<?php

$config = include __DIR__ . '/config.php';

$container = new Zend\ServiceManager\ServiceManager();

(new Zend\ServiceManager\Config($config['dependencies']))
    ->configureServiceManager($container);

$container->setService('config', $config);

return $container;
