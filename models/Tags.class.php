<?php
class Tags extends Tables
	{
	function __construct($db)
		{
		parent::__construct($db,strtolower(get_class($this)));
		}
	}
?>