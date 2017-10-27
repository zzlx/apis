<?php
namespace Zzlx\App\Model\InputFilter;

use Zend\InputFilter\InputFilter as InputFilters;

/**
 * Class AlbumInputFilter
 *
 * @package Album\Model\InputFilter
 */
class InputFilter extends InputFilters
{
    /**
     * Init input filter
     */
    public function init()
    {
        $this->add([
            'name'     => 'artist',
            'required' => true,
            'filters'  => [
                ['name' => 'StripTags'],
                ['name' => 'StringTrim'],
            ],
            'validators' => [
                [
                    'name'    => 'StringLength',
                    'options' => [
                        'min'      => 1,
                        'max'      => 100,
                    ],
                ],
            ],
        ]);

        $this->add([
            'name'     => 'title',
            'required' => true,
            'filters'  => [
                ['name' => 'StripTags'],
                ['name' => 'StringTrim'],
            ],
            'validators' => [
                [
                    'name'    => 'StringLength',
                    'options' => [
                        'min'      => 1,
                        'max'      => 100,
                    ],
                ],
            ],
        ]);
    }
}

