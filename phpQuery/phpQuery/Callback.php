<?php

/**
 * Callback class introduces currying-like pattern.
 *
 * Example:
 * function foo($param1, $param2, $param3) {
 *   var_dump($param1, $param2, $param3);
 * }
 * $fooCurried = new Callback('foo',
 *   'param1 is now statically set',
 *   new CallbackParam, new CallbackParam
 * );
 * phpQuery::callbackRun($fooCurried,
 * 	array('param2 value', 'param3 value'
 * );
 *
 * Callback class is supported in all phpQuery methods which accepts callbacks.
 *
 * @link http://code.google.com/p/phpquery/wiki/Callbacks#Param_Structures
 * @author Tobiasz Cudnik <tobiasz.cudnik/gmail.com>
 *
 * @TODO??? return fake forwarding function created via create_function
 * @TODO honor paramStructure
 */
class Callback
	implements phpQuery_ICallbackNamed {
	public $callback = null;
	public $params = null;
	protected $name;
	public function __construct($callback, $param1 = null, $param2 = null,
			$param3 = null) {
		$params = func_get_args();
		$params = array_slice($params, 1);
		if ($callback instanceof Callback) {
			// TODO implement recurention
		} else {
			$this->callback = $callback;
			$this->params = $params;
		}
	}
	public function getName() {
		return 'Callback: '.$this->name;
	}
	public function hasName() {
		return isset($this->name) && $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	// TODO test me
//	public function addParams() {
//		$params = func_get_args();
//		return new Callback($this->callback, $this->params+$params);
//	}
}

//class CallbackReference extends Callback {
//	/**
//	 *
//	 * @param $reference
//	 * @param $paramIndex
//	 * @todo implement $paramIndex; param index choose which callback param will be passed to reference
//	 */
//	public function __construct(&$reference, $name = null){
//		$this->callback =& $reference;
//	}
//}
class CallbackParam {}