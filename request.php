<?php
class Request
	{
	function __construct()
		{
		if(empty($_REQUEST['get']))
			{
			$_REQUEST['get']='messages';
			}
		if(empty($_REQUEST['display']) && empty($_REQUEST['user']))
			{
			$_REQUEST['display']='all';
			}
		}
	function get($field)
		{
		return $_REQUEST[$field];
		}
	function set($field,$data)
		{
		$_REQUEST[$field]=$data;
		}
	function get_all()
		{
		return $_REQUEST;
		}
	function in_request($field)
		{
		return array_key_exists($field,$_REQUEST);
		}
	}
?>