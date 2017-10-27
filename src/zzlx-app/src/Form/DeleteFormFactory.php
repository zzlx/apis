<?php
namespace Zzlx\App\Form;

use Interop\Container\ContainerInterface;
use Zend\Form\Form;

/**
 * Class AlbumDeleteFormFactory
 *
 * @package Zzlx\App\Form
 */
class DeleteFormFactory extends Form
{
    /**
     * @param ContainerInterface $container
     *
     * @return AlbumDeleteForm
     */
    public function __invoke(ContainerInterface $container)
    {
        $form = new DeleteForm();
        $form->init();

        return $form;
    }
}
