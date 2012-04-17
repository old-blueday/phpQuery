<?php

/**
 * @author bluelovers
 * @copyright 2012
 */

/**
 * CallbackParameterToReference can be used when we don't really want a callback,
 * only parameter passed to it. CallbackParameterToReference takes first
 * parameter's value and passes it to reference.
 *
 * @author Tobiasz Cudnik <tobiasz.cudnik/gmail.com>
 */
class CallbackParameterToReference extends Callback
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
