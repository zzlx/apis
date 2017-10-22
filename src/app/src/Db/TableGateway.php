<?php
namespace Zzlx\App\Db;

use Zzlx\App\Model\Entity;
use Zzlx\App\Model\Storage\StorageInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSetInterface;
use Zend\Db\TableGateway\TableGateway as TableGateways;

class TableGateway extends TableGateways implements StorageInterface
{
    /**
     * @param AdapterInterface   $adapter
     * @param ResultSetInterface $resultSet
     */
    public function __construct(AdapterInterface $adapter, ResultSetInterface $resultSet)
    {
        parent::__construct('album', $adapter, null, $resultSet);
    }

    /**
     * {@inheritDoc}
     */
    public function fetchList()
    {
        $select = $this->getSql()->select();

        $collection = [];

        /** @var AlbumEntity $entity */
        foreach ($this->selectWith($select) as $entity) {
            $collection[$entity->getId()] = $entity;
        }

        return $collection;
    }

    /**
     * {@inheritDoc}
     */
    public function fetchById($id)
    {
        $select = $this->getSql()->select();
        $select->where->equalTo('id', $id);

        return $this->selectWith($select)->current();
    }

    /**
     * {@inheritDoc}
     */
    public function insertEntity(Entity $entity)
    {
        $insertData = $entity->getArrayCopy();

        $insert = $this->getSql()->insert();
        $insert->values($insertData);

        return $this->insertWith($insert) > 0;
    }

    /**
     * {@inheritDoc}
     */
    public function updateEntity(Entity $entity)
    {
        $updateData = $entity->getArrayCopy();

        $update = $this->getSql()->update();
        $update->set($updateData);
        $update->where->equalTo('id', $entity->getId());

        return $this->updateWith($update) > 0;
    }

    /**
     * {@inheritDoc}
     */
    public function deleteEntity(Entity $entity)
    {
        $delete = $this->getSql()->delete();
        $delete->where->equalTo('id', $entity->getId());

        return $this->deleteWith($delete) > 0;
    }
}
