<?php

/**
 * @author bluelovers
 * @copyright 2012
 */

require_once ('Zend/Loader/Autoloader.php');

Zend_Loader_Autoloader::getInstance();
Zend_Loader::loadClass('phpQuery_Autoloader', dirname(__file__));

Zend_Loader_Autoloader::getInstance()->pushAutoloader(phpQuery_Autoloader::getInstance(dirname(__file__), 'phpQuery'));
;

/**
 * Shortcut to phpQuery::pq($arg1, $context)
 * Chainable.
 *
 * @see phpQuery::pq()
 * @return phpQuery_Object|QueryTemplatesSource|QueryTemplatesParse|QueryTemplatesSourceQuery
 * @author Tobiasz Cudnik <tobiasz.cudnik/gmail.com>
 * @package phpQuery
 */
function pq($arg1, $context = null)
{
	$args = func_get_args();
	return call_user_func_array(array('phpQuery', 'pq'), $args);
}
// add plugins dir and Zend framework to include path
set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__file__) . '/phpQuery/' . PATH_SEPARATOR . dirname(__file__) . '/phpQuery/plugins/');
// why ? no __call nor __get for statics in php...
// XXX __callStatic will be available in PHP 5.3
phpQuery::$plugins = new phpQuery_Plugins();
// include bootstrap file (personal library config)
if (file_exists(dirname(__file__) . '/phpQuery/bootstrap.php')) require_once dirname(__file__) . '/phpQuery/bootstrap.php';
