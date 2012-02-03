<?php
class Users_Controller extends Controller
	{
	function __construct($request,$TF)
		{
		parent::__construct($request,$TF);
		}
	function login()
		{
		foreach($this->TF->getTable($this->request->get('get'))->get_all() as $v)
			{
			if($this->request->get('login')===$v['login'] && $this->request->get('password')===$v['password'])
				{
				setcookie('name',$v['id'],time()+6000);
				setcookie('auth',$v['login'],time()+6000);
				parent::redirect("index.php");
				}
			else
				{
				parent::redirect('index.php');
				}
			}
		}
	function logout()
		{
		setcookie('name',0,time()-6000);
		setcookie('auth',0,time()-6000);
		parent::redirect("index.php");
		}
	function check()
		{
		if($this->request->get('login')=='' && $this->request->get('password')=='' && $this->request->get('firstname')=='' && $this->request->get('lastname')=='' && $this->request->get('email')=='')
			{
			$this->view->render($this->request->get('get'),array());
			}
		else
			{
			if(is_array($this->TF->getTable($this->request->get('get'))->get(array('login'=>$this->request->get('login')))))
				{
				$errorarray['loginerror']=1;
				}
			if(strlen($this->request->get('login'))<3)
				{
				$errorarray['loginerror']=1;
				}
			if(strlen($this->request->get('password'))<3)
				{
				$errorarray['passworderror']=1;
				}
			if(strlen($this->request->get('firstname'))<3)
				{
				$errorarray['firstnameerror']=1;
				}
			if(strlen($this->request->get('lastname'))<3)
				{
				$errorarray['lastnameerror']=1;
				}
			if(!preg_match('|([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is',$this->request->get('email')))
				{
				$errorarray['emailerror']=1;
				}
			if(count($errorarray)>0)
				{
				$this->view->render($this->request->get('get'),$errorarray);
				}
			else
				{
				return array('login'=>mysql_escape_string(trim($this->request->get('login'))),'password'=>mysql_escape_string(trim($this->request->get('password'))),'firstname'=>mysql_escape_string(trim($this->request->get('firstname'))),'lastname'=>mysql_escape_string(trim($this->request->get('lastname'))),'email'=>mysql_escape_string(trim($this->request->get('email'))));
				}
			}
		}
	function set()
		{
		if(is_array($this->check()))
			{
			$this->TF->getTable($this->request->get('get'))->set($this->check());
			setcookie('name',$this->TF->getTable($this->request->get('get'))->max(),time()+6000);
			setcookie('auth',$this->request->get('login'),time()+6000);
			parent::redirect("index.php");	
			}
		}
	}
?>