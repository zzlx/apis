<?php
namespace Zzlx\App\Form;

use Zzlx\App\Model\InputFilter\InputFilter;
use Interop\Container\ContainerInterface;
use Zend\Form\Form;
use Zend\Hydrator\ArraySerializable;

/**
 * Class AlbumDataFormFactory
 *
 * @package Album\Form
 */
class DataFormFactory extends Form
{
    /**
     * @param ContainerInterface $container
     *
     * @return AlbumDataForm
     */
    public function __invoke(ContainerInterface $container)
    {
        $hydrator    = new ArraySerializable();
        $inputFilter = $container->get(InputFilter::class);

        $form = new DataForm();
        $form->setHydrator($hydrator);
        $form->setInputFilter($inputFilter);
        $form->init();

        return $form;
    }
}
