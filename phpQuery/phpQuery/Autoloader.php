<?php

/**
 * @author bluelovers
 * @copyright 2012
 */

class phpQuery_Autoloader implements Zend_Loader_Autoloader_Interface
{
	protected $_baseDir;
	protected $_prefix;
	protected $_prefixLen;

	/**
	 * @var array Default autoloader callback
	 */
	protected $_defaultAutoloader = array('Zend_Loader', 'loadClass');

	public function __construct($baseDir, $prefix)
	{
		$this->_baseDir = rtrim(str_replace('\\', '/', $baseDir), '/') . '/';
		$this->_prefix = $prefix;
		$this->_prefixLen = strlen($prefix);
	}

	public function autoload($class)
	{
		if (strlen($class) < $this->_prefixLen)
		{
			return false;
		}
		if (0 !== strpos($class, $this->_prefix))
		{
			return false;
		}
		if (call_user_func($this->_defaultAutoloader, $class, $this->_baseDir))
		{
			return true;
		}
	}

	/**
	 * Retrieve singleton instance
	 *
	 * @return phpQuery_Autoloader
	 * @example phpQuery_Autoloader::getInstance(dirname(__FILE__), 'phpQuery');
	 */
	public static function getInstance($baseDir, $prefix)
	{
		$_instance = new self($baseDir, $prefix);

		return $_instance;
	}
}
