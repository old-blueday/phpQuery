<?php

/**
 * @author bluelovers
 * @copyright 2012
 */

require_once (dirname(__file__) . '/../bootstrap.php');

$url = 'http://' . $_SERVER["HTTP_HOST"] . str_replace('r.php', 's.php', $_SERVER["PHP_SELF"]);

phpQuery::ajaxAllowHost($_SERVER["HTTP_HOST"]);

$data['function'] = 'addProduct';

$doc = phpQuery::ajax(array(
	'type' => 'GET',
	'url' => $url,
	'data' => $data,
	'success' => 'getJsCallback'));


function getJsCallback($doc)
{
	echo $doc;
}
