<?php
namespace Zzlx\Album\Action;

use Zzlx\Album\Form\DataForm;
use Zzlx\Album\Model\Repository\RepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;

/**
 * Class AlbumCreateHandleFactory
 *
 * @package Album\Action
 */
class CreateHandleFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return AlbumCreateHandleAction
     */
    public function __invoke(ContainerInterface $container)
    {
        $router          = $container->get(RouterInterface::class);
        $albumRepository = $container->get(RepositoryInterface::class);
        $albumForm       = $container->get(DataForm::class);

        return new CreateHandle(
            $router, $albumRepository, $albumForm
        );
    }
}

