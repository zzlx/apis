<?php
/**
 * 
 */
$configManager = new Zend\ConfigAggregator\ConfigAggregator([ 
    Zzlx\Album\ConfigProvider::class, 
    Zend\Db\ConfigProvider::class, 
    Zend\Filter\ConfigProvider::class, 
    Zend\Hydrator\ConfigProvider::class, 
    Zend\I18n\ConfigProvider::class, 
    Zend\InputFilter\ConfigProvider::class, 
    Zend\Router\ConfigProvider::class, 
    Zend\Validator\ConfigProvider::class, 
	  new Zend\ConfigAggregator\PhpFileProvider(
		    __DIR__ . '/autoload/{{,*.}global,{,*.}local,{,*.}config}.php'
	  ),
]);

return new ArrayObject($configManager->getMergedConfig());
