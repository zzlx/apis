<?php

// in src/Application/Container/RouterFactory.php
namespace Application\Container;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Router\FastRouteRouter as FastRouteBridge;

class RouterFactory
{
    /**
     * @param ContainerInterface $container
     * @return FastRouteBridge
     */
    public function __invoke(ContainerInterface $container)
    {
        return new FastRouteBridge(
            $container->get('FastRoute\RouteCollector'),
            $container->get('FastRoute\DispatcherFactory')
        );
    }
}
