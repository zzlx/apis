<?php
namespace Zzlx\App\Action;

use Zzlx\App\Form\AlbumDataForm;
use Zzlx\App\Model\Repository\AlbumRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * Class AlbumUpdateHandleFactory
 *
 * @package Zzlx\App\Action
 */
class UpdateHandleFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return AlbumUpdateHandleAction
     */
    public function __invoke(ContainerInterface $container)
    {
        $router          = $container->get(RouterInterface::class);
        $albumRepository = $container->get(AlbumRepositoryInterface::class);
        $albumForm       = $container->get(AlbumDataForm::class);

        return new AlbumUpdateHandleAction(
            $router, $albumRepository, $albumForm
        );
    }
}
