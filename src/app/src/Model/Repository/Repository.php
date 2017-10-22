<?php
namespace Zzlx\App\Model\Repository;

use Zzlx\App\Model\Entity;
use Zzlx\App\Model\Storage\StorageInterface;

class Repository implements RepositoryInterface
{
    /**
     * @var AlbumStorageInterface
     */
    private $storage;

    /**
     * AlbumRepository constructor.
     *
     * @param AlbumStorageInterface $albumStorage
     */
    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * {@inheritDoc}
     */
    public function fetchAll()
    {
        return $this->storage->fetchList();
    }

    /**
     * {@inheritDoc}
     * Fetch a single album
     */
    public function fetchSingle($id)
    {
        return $this->storage->fetchById($id);
    }

    /**
     * {@inheritDoc}
     */
    public function save(Entity $entity)
    {
        if (! $entity->getId()) {
            return $this->storage->insert($entity);
        }

        return $this->storage->update($entity);
    }

    /**
     * {@inheritDoc}
     */
    public function delete(Entity $entity)
    {
        return $this->storage->delete($entity);
    }
}
