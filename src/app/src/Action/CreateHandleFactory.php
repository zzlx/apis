<?php
namespace Zzlx\App\Action;

use Zzlx\App\Form\DataForm;
use Zzlx\App\Model\Repository\RepositoryInterface;
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

