<?php
namespace Zzlx\App\Action;

use Zzlx\App\Model\Repository\RepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ListsFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return AlbumListAction
     */
    public function __invoke(ContainerInterface $container)
    {
        return new Lists(
            $container->get(TemplateRendererInterface::class),
            $container->get(RepositoryInterface::class)
        );
    }
}
