<?php
namespace Zzlx\App\Action;

use Zzlx\App\Form\DataForm;
use Zzlx\App\Model\Repository\RepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * Class AlbumUpdateFormFactory
 *
 * @package Zzlx\App\Action
 */
class UpdateFormFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return AlbumUpdateFormAction
     */
    public function __invoke(ContainerInterface $container)
    {
        $template        = $container->get(TemplateRendererInterface::class);
        $albumRepository = $container->get(RepositoryInterface::class);
        $albumForm       = $container->get(DataForm::class);

        return new UpdateForm(
            $template, $albumRepository, $albumForm
        );
    }
}
