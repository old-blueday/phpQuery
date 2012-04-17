<?php

/**
 * @author bluelovers
 * @copyright 2012
 */

/**
 * Shorthand for new phpQuery_Callback(create_function(...), ...);
 *
 * @author Tobiasz Cudnik <tobiasz.cudnik/gmail.com>
 */
class phpQuery_CallbackBody extends phpQuery_Callback
{
	public function __construct($paramList, $code, $param1 = null, $param2 = null, $param3 = null)
	{
		$params = func_get_args();
		$params = array_slice($params, 2);
		$this->callback = create_function($paramList, $code);
		$this->params = $params;
	}
}
