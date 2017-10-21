<?php

namespace Zzlx\Album\Action;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zzlx\Album\Action\Hello;

class HelloFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return Hello
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Hello($container->get(\Zend\Expressive\Template\TemplateRendererInterface::class));
    }
}
