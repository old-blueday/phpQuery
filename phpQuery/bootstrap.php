<?php

/**
 * @author bluelovers
 * @copyright 2012
 */

require_once('Zend/Loader/Autoloader.php');

Zend_Loader_Autoloader::getInstance();
Zend_Loader::loadClass('phpQuery_Autoloader', dirname(__FILE__));

Zend_Loader_Autoloader::getInstance()
	->pushAutoloader(phpQuery_Autoloader::getInstance(dirname(__FILE__), 'phpQuery'));
;
