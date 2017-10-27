<?php
// in src/Application/Container/FastRouteCollectorFactory.php:
namespace Application\Container;

use FastRoute\RouteCollector;
use FastRoute\RouteGenerator;
use FastRoute\RouteParser\Std as RouteParser;
use Psr\Container\ContainerInterface;

class FastRouteCollectorFactory
{
    /**
     * @param ContainerInterface $container
     * @return RouteCollector
     */
    public function __invoke(ContainerInterface $container)
    {
        return new RouteCollector(
            new RouteParser(),
            new RouteGenerator()
        );
    }
}
