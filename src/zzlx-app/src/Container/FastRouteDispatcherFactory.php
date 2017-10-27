<?php
// in src/Application/Container/FastRouteDispatcherFactory:

namespace Application\Container;

use FastRoute\Dispatcher\GroupPosBased as FastRouteDispatcher;
use Psr\Container\ContainerInterface;

class FastRouteDispatcherFactory
{
    /**
     * @param ContainerInterface $container
     * @return callable
     */
    public function __invoke(ContainerInterface $container)
    {
        return function ($data) {
            return new FastRouteDispatcher($data);
        };
    }
}
