<?php
namespace Zzlx\Db;

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
            'db' => $this->getConfig(),
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
            'invokables' => [],
            'factories' => [],
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
            'driver'  => 'pdo',
            'dsn'     => 'mysql:dbname=test;host=localhost;charset=utf8',
            'user'    => 'root',
            'pass'    => '',
        ];
    }
}
