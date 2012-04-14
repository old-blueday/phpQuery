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

	public function __construct($baseDir, $prefix)
	{
		$this->_baseDir = $baseDir;
		$this->_prefix = $prefix;
		$this->_prefixLen = strlen($prefix);
	}

	public function autoload($class)
	{
		if (strlen($class) <= $this->_prefixLen)
		{
			return false;
		}
		if (0 !== strpos($class, $this->_prefix))
		{
			return false;
		}

		$fragment = substr($class, $this->_prefixLen);
		$fragment = str_replace('_', '/', trim($fragment, '_'));
		return include ($this->_baseDir . '/' . $fragment . '.php');
	}

	/**
	 * Retrieve singleton instance
	 *
	 * @return phpQuery_Autoloader
	 */
	public static function getInstance()
	{
		if (null === self::$_instance)
		{
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}
