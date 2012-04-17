<?php

/**
 * @author bluelovers
 * @copyright 2012
 */

//set_include_path(get_include_path() . PATH_SEPARATOR . 'D:/Users/Documents/The Project/ZendFramework-1.x/library/');

require_once('Zend/Loader/Autoloader.php');

Zend_Loader_Autoloader::getInstance();
Zend_Loader::loadClass('phpQuery_Autoloader', dirname(__FILE__));

Zend_Loader_Autoloader::getInstance()
	->pushAutoloader(phpQuery_Autoloader::getInstance(dirname(__FILE__), 'phpQuery'));
;
