<?php
namespace Zzlx\Db\TableGateway;

use Zzlx\App\Model\Entity;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Hydrator\ArraySerializable;

class TableGatewayFactory
{
    /**
     * @param ContainerInterface $container
     * @return AlbumTableGateway
     */
    public function __invoke(ContainerInterface $container)
    {
        $resultSetPrototype = new HydratingResultSet(
            new ArraySerializable(),
            new Entity()
        );

        return new TableGateway(
            $container->get(AdapterInterface::class),
            $resultSetPrototype
        );
    }
}
