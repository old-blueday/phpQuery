<?php

/**
 * @author bluelovers
 * @copyright 2012
 */

set_include_path(get_include_path() . PATH_SEPARATOR . 'D:/Users/Documents/The Project/ZendFramework-1.x/library/');

$_get_declared_classes = get_declared_classes();
$_get_declared_interfaces = get_declared_interfaces();

require_once('Zend/Loader/Autoloader.php');

Zend_Loader_Autoloader::getInstance();
Zend_Loader::loadClass('phpQuery_Autoloader', dirname(__FILE__));

Zend_Loader_Autoloader::getInstance()
	->pushAutoloader(phpQuery_Autoloader::getInstance(dirname(__FILE__), 'phpQuery'));
;

$class_check = array(
	'phpQuery_Autoloader',
	'phpQuery',
	'phpQuery_DOMEvent',
	'phpQuery_DOMDocumentWrapper',
	'phpQueryEvents',
	'CallbackParam',
	'Callback',
	'CallbackBody',
	'CallbackReturnReference',
	'CallbackReturnValue',
	'CallbackParameterToReference',
	'phpQuery_Plugins',
	'phpQuery_Object',

	'phpQuery_ICallbackNamed',
);

$r = array();
foreach($class_check as $_c)
{
	$r[$_c] = class_exists($_c) || interface_exists($_c);
}

echo '<pre>';
var_dump($r);

var_export(array_diff(get_declared_classes(), $_get_declared_classes, $class_check));
var_export(array_diff(get_declared_interfaces(), $_get_declared_interfaces, $class_check));
echo '</pre>';