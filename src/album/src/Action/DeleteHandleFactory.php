<?php
namespace Zzlx\Album\Action;

use Zzlx\Album\Form\DeleteForm;
use Zzlx\Album\Model\Repository\RepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;

/**
 * Class AlbumDeleteHandleFactory
 *
 * @package Zzlx\Album\Action
 */
class DeleteHandleFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return AlbumDeleteHandleAction
     */
    public function __invoke(ContainerInterface $container)
    {
        $router          = $container->get(RouterInterface::class);
        $albumRepository = $container->get(RepositoryInterface::class);

        return new DeleteHandle(
            $router, $albumRepository
        );
    }
}
