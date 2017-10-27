<?php
namespace Zzlx\App\Model\Repository;

use Zzlx\App\Model\Storage\StorageInterface;
use Interop\Container\ContainerInterface;

class RepositoryFactory
{
    /**
     * @param ContainerInterface $container
     * @return AlbumRepository
     */
    public function __invoke(ContainerInterface $container)
    {
        return new Repository(
            $container->get(StorageInterface::class)
        );
    }
}
