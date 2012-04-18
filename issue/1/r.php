<?php

/**
 * @author bluelovers
 * @copyright 2012
 */

require_once (dirname(__file__) . '/../bootstrap.php');

$data['function'] = 'addProduct';

$doc = phpQuery::ajax(array(
	'type' => 'GET',
	'url' => $url,
	'data' => $data,
	'success' => getJsCallback($doc)));
