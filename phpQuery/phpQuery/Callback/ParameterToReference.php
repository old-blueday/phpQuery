<?php

/**
 * @author bluelovers
 * @copyright 2012
 */

/**
 * phpQuery_Callback_ParameterToReference can be used when we don't really want a callback,
 * only parameter passed to it. phpQuery_Callback_ParameterToReference takes first
 * parameter's value and passes it to reference.
 *
 * @author Tobiasz Cudnik <tobiasz.cudnik/gmail.com>
 */
class phpQuery_Callback_ParameterToReference extends phpQuery_Callback
{
	/**
	 * @param $reference
	 * @TODO implement $paramIndex;
	 * param index choose which callback param will be passed to reference
	 */
	public function __construct(&$reference)
	{
		$this->callback = &$reference;
	}
}
