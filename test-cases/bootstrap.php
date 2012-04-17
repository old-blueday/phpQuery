<?php

/**
 * @author bluelovers
 * @copyright 2012
 */

set_include_path(get_include_path() . PATH_SEPARATOR . 'D:/Users/Documents/The Project/ZendFramework-1.x/library/');

$_get_declared_classes = get_declared_classes();
$_get_declared_interfaces = get_declared_interfaces();

require_once(dirname(__file__).'/../phpQuery/bootstrap.php');

$class_check = array(
	'phpQuery_Autoloader',
	'phpQuery',
	'phpQuery_Dom_DOMEvent',
	'phpQuery_Dom_DOMDocumentWrapper',
	'phpQuery_Events',
	'phpQuery_Callback_Param',
	'phpQuery_Callback',
	'phpQuery_Callback_Body',
	'phpQuery_Callback_ReturnReference',
	'phpQuery_Callback_ReturnValue',
	'phpQuery_Callback_ParameterToReference',
	'phpQuery_Plugins',
	'phpQuery_Object',

	'phpQuery_Callback_NamedInterface',
);

$class_check_plugin = array(
	'WebBrowser',
	'Scripts',
);

$r = array();
foreach($class_check as $_c)
{
	$r[$_c] = class_exists($_c) || interface_exists($_c);
}

$path_base = dirname(__file__).'/..';

$pluginLoader = new Zend_Loader_PluginLoader();

$pluginLoader->addPrefixPath('phpQueryPlugin', $path_base . '/phpQuery/plugins/');
$pluginLoader->addPrefixPath('phpQueryObjectPlugin', $path_base . '/phpQuery/plugins/');

phpQuery::pluginLoader($pluginLoader);

$r_plugin = array();
foreach($class_check_plugin as $_c)
{
	$r_plugin[$_c] = phpQuery::plugin($_c);
}

echo '<pre>';
var_dump($r);
var_dump($r_plugin);

var_export(array_diff(get_declared_classes(), $_get_declared_classes, $class_check));
var_export(array_diff(get_declared_interfaces(), $_get_declared_interfaces, $class_check));
echo '</pre>';
