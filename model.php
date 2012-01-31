<?php
class TableFactory
	{
	static $tables=array();
	function __construct($db,$path)
		{
		$this->db=$db;
		$this->path=$path;
		}
	function getTable($name)
		{
		$cname=ucfirst(strtolower($name));
		if(!array_key_exists($name,self::$tables) || !isset(self::$tables))
			{
			require_once($this->path.'/Tables.class.php');
			require_once($this->path.'/'.$cname.'.class.php');
			self::$tables[$name]=new $cname($this->db);
			}
		return self::$tables[$name];
		}
	}
?>