<?php

use Zend\ConfigAggregator\ConfigAggregator;
use Zend\ConfigAggregator\PhpFileProvider;

/**
 * Application configuration.
 *
 * @see https://github.com/zendframework/zend-config-aggregator
 */
return (new ConfigAggregator([ 
    Zzlx\App\ConfigProvider::class,
    Zzlx\Wechat\ConfigProvider::class,
    Zend\Db\ConfigProvider::class, 
    Zend\Filter\ConfigProvider::class, 
    Zend\Hydrator\ConfigProvider::class, 
    Zend\I18n\ConfigProvider::class, 
    Zend\InputFilter\ConfigProvider::class, 
    Zend\Validator\ConfigProvider::class, 
    new PhpFileProvider(
        // @caution autoload目录用于存放系统级别配置
        __DIR__ . '/autoload/{{,*.}global,{,*.}local,{,*.}config}.php'
    ),
    new PhpFileProvider(__DIR__ . '/development.config.php'),
], dirname(__DIR__) . '/data/config-cache.php'))->getMergedConfig();
