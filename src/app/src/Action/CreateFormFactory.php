<?php
namespace Zzlx\App\Action;

use Zzlx\App\Form\DataForm;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * Class AlbumCreateFormFactory
 *
 * @package Album\Action
 */
class CreateFormFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return AlbumCreateFormAction
     */
    public function __invoke(ContainerInterface $container)
    {
        $template  = $container->get(TemplateRendererInterface::class);
        $albumForm = $container->get(DataForm::class);

        return new CreateForm(
            $template, $albumForm
        );
    }
}

