<?php
class Controller
	{
	function __construct($request,$TF)
		{
		$this->request=$request;
		$this->TF=$TF;
		$this->view=new View();
		}
	function redirect($path)
		{
		header("Location:".$path);
		}
	}
?>