<?php
namespace Zzlx\Album\Model\Repository;

use Zzlx\Album\Model\Entity;

interface RepositoryInterface
{
    /**
     * Fetch all albums.
     *
     * @return AlbumEntity[]
     */
    public function fetchAll();

    /**
     * Fetch a single album by identifier.
     *
     * @param int $id
     * @return AlbumEntity|null
     */
    public function fetchSingle($id);

    /**
     * Save an album.
     *
     * Should insert a new album if no identifier is present in the entity, and
     * update an existing album otherwise.
     *
     * @param AlbumEntity $album
     * @return bool
     */
    public function save(Entity $entity);

    /**
     * Delete an album.
     *
     * @param AlbumEntity $album
     * @return bool
     */
    public function delete(Entity $entity);
}
