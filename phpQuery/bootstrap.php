<?php

/**
 * @author bluelovers
 * @copyright 2012
 */

require_once('Zend/Loader/Autoloader.php');
require_once(dirname(__FILE__).'/phpQuery/Autoloader.php');

Zend_Loader_Autoloader::getInstance()
	->pushAutoloader(phpQuery_Autoloader::getInstance(dirname(__FILE__), 'phpQuery'));
;
