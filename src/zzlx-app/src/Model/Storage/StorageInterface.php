<?php
namespace Zzlx\App\Model\Storage;

use Zzlx\App\Model\Entity;

interface StorageInterface
{
    /**
     * Fetch a list of albums.
     *
     * @return Entity[]
     */
    public function fetchList();

    /**
     * Fetch an album by identifer.
     *
     * @param int $id
     * @return Entity|null
     */
    public function fetchById($id);

    /**
     * Insert an album into storage.
     *
     * @param Entity $entity
     * @return bool
     */
    public function insertEntity(Entity $entity);

    /**
     * Update an album.
     *
     * @param AlbumEntity $album
     * @return bool
     */
    public function updateEntity(Entity $entity);

    /**
     * Delete an album.
     *
     * @param AlbumEntity $album
     * @return bool
     */
    public function deleteEntity(Entity $entity);
}
