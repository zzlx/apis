#!/usr/bin/env php
<?php
/**
 * This makes our life easier when dealing with paths. 
 * Everything is relative to the application root now.
 */
chdir(dirname(__DIR__));

$phar = new PharData('var/usr.zip');

// add all files in the project
$phar->buildFromDirectory('usr');
