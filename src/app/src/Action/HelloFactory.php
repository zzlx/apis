<?php

namespace Zzlx\App\Action;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zzlx\App\Action\Hello;

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
