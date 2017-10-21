<?php
namespace Zzlx\Album\Action;

use Zzlx\Album\Model\Repository\RepositoryInterface;
use Interop\Container\ContainerInterface;

class PingFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return AlbumListAction
     */
    public function __invoke(ContainerInterface $container)
    {
        return new Ping(
            $container->get(RepositoryInterface::class)
        );
    }
}

