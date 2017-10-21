<?php
namespace Zzlx\Album\Action;

use Zzlx\Album\Form\DataForm;
use Zzlx\Album\Model\Repository\RepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * Class AlbumUpdateFormFactory
 *
 * @package Zzlx\Album\Action
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
