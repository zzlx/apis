<?php
namespace Zzlx\App;

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
            'dependencies' => $this->getDependencyConfig(),
        ];
    }


    public function getDependencies()
    {
        return [
            /* . . . */
            'delegators' => [
                \Zend\Expressive\Application::class => [
                    Factory\PipelineAndRoutesDelegator::class,
                ],
            ],
        ];
    }
}
