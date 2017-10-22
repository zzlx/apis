#!/usr/bin/env php
<?php
/**
 * This makes our life easier when dealing with paths. 
 * Everything is relative to the application root now.
 */
chdir(dirname(__DIR__));

// 执行外部命令
passthru('gitbook build usr/share/docs var/docs');
