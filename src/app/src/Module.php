<?php
namespace Zzlx\App;

/**
 * Register with a zend-mvc application.
 */
class Module
{
    /**
     * Provide default router configuration.
     *
     * @return array
     */
    public function getConfig()
    {
        $provider = new ConfigProvider();
        return [
            'service_manager' => $provider->getDependencyConfig(),
            'route_manager' => $provider->getRouteManagerConfig(),
            'router' => ['routes' => []],
        ];
    }
}

