<?php
namespace Zzlx\App;

use Zzlx\Db\TableGateway\TableGatewayFactory;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Router\FastRouteRouter;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Expressive\Plates\PlatesRendererFactory;

/**
 * Provide base configuration for using the component.
 *
 * Provides base configuration expected in order to:
 *
 * - seed and configure the default routers and route plugin manager.
 * - provide routes to the given routers.
 */
class ConfigProvider
{
    /**
     * Provide default configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'routes' => $this->getConfig(),
            'map' => [
                'layout/default' => dirname(__DIR__) . '/templates/layout/default.phtml',
                'error/error'    => dirname(__DIR__) . '/templates/error/error.phtml',
                'error/404'      => dirname(__DIR__) . '/templates/error/404.phtml',
            ],
            'templates' => [
                'layout' => 'layout/default',
                'paths' => [
                    'app'    => [dirname(__DIR__) . '/templates'],
                    'layout' => [dirname(__DIR__) . '/templates/layout'],
                    'error'  => [dirname(__DIR__) . '/templates/error'],
                ],
                'extension' => 'phtml',
            ],
        ];
    }

    /**
     * Returns the container dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            'delegators' => [],
            'aliases' => [],
            'invokables' => [
                //FastRouteRouter
                RouterInterface::class => FastRouteRouter::class,
            ],
            'factories' => [
                //use Plates templates
                TemplateRendererInterface::class => PlatesRendererFactory::class,
                Action\Hello::class => Action\HelloFactory::class,
                Action\Lists::class => Action\ListsFactory::class,
                Action\CreateForm::class   => Action\CreateFormFactory::class,
                Action\CreateHandle::class => Action\CreateHandleFactory::class,
                Action\UpdateForm::class => Action\UpdateFormFactory::class,
                Action\UpdateHandle::class => Action\UpdateHandleFactory::class,
                Action\DeleteForm::class => Action\DeleteFormFactory::class,
                Action\DeleteHandle::class => Action\DeleteHandleFactory::class,
                Form\DataForm::class => Form\DataFormFactory::class,
                Form\DeleteForm::class => Form\DeleteFormFactory::class,
                Model\InputFilter\InputFilter::class => Model\InputFilter\InputFilterFactory::class,
                Model\Repository\RepositoryInterface::class => Model\Repository\RepositoryFactory::class,
                Model\Storage\StorageInterface::class => TableGatewayFactory::class,
                //Middleware\VerifyUser::class => Container\VerifyUserFactory::class,
            ],
        ];
    }

    /**
     * Provide default route plugin manager configuration.
     *
     * @return array
     */
    public function getConfig()
    {
        return [
            [
                'name'            => 'home',
                'path'            => '/',
                'middleware'      => Action\Hello::class,
                'allowed_methods' => ['GET'],
            ],
            [
                'name'            => 'album',
                'path'            => '/album',
                'middleware'      => Action\Lists::class,
                'allowed_methods' => ['GET'],
            ],
            [
                'name'            => 'album-create',
                'path'            => '/album/create',
                'middleware'      => Action\CreateForm::class,
                'allowed_methods' => ['GET'],
            ],
            [
                'name'            => 'album-create-handle',
                'path'            => '/album/create/handle',
                'middleware'      => [
                    Action\CreateHandle::class,
                    Action\CreateForm::class,
                ],
                'allowed_methods' => ['POST'],
            ],
            [
                'name'            => 'album-update',
                'path'            => '/album/update/:id',
                'middleware'      => Action\UpdateForm::class,
                'allowed_methods' => ['GET'],
                'options'         => [
                    'constraints' => [
                        'id' => '[1-9][0-9]*',
                    ],
                ],
            ],
            [
                'name'            => 'album-update-handle',
                'path'            => '/album/update/:id/handle',
                'middleware'      => [
                    Action\UpdateHandle::class,
                    Action\UpdateForm::class,
                ],
                'allowed_methods' => ['POST'],
                'options'         => [
                    'constraints' => [
                        'id' => '[1-9][0-9]*',
                    ],
                ],
            ],
            [
                'name'            => 'album-delete',
                'path'            => '/album/delete/:id',
                'middleware'      => Action\DeleteForm::class,
                'allowed_methods' => ['GET'],
                'options'         => [
                    'constraints' => [
                        'id' => '[1-9][0-9]*',
                    ],
                ],
            ],
            [
                'name'            => 'album-delete-handle',
                'path'            => '/album/delete/:id/handle',
                'middleware'      => Action\DeleteHandle::class,
                'allowed_methods' => ['POST'],
                'options'         => [
                    'constraints' => [
                        'id' => '[1-9][0-9]*',
                    ],
                ],
            ],
        ];
    }
}
