<?php
class Chats_Controller extends Controller
	{
	function __construct($request,$TF)
		{
		parent::__construct($request,$TF);
		$this->array=array('users'=>$this->TF->getTable('users')->get_all(),'chats'=>$this->TF->getTable('chats')->get_all(true));
		}
	function all()
		{
		if($this->request->get('param'))
			{
			$answ=json_decode($this->request->get('param'),true);
			if($this->TF->getTable($this->request->get('get'))->max()!==$answ['lastid'])
				{
				$rere=$this->TF->getTable($this->request->get('get'))->get(array('id'=>$this->TF->getTable($this->request->get('get'))->max()));
				$ur=$this->TF->getTable('users')->get(array('id'=>$rere[0]['user']));
				$rere[0]['user']=$ur[0]['login'];
				echo json_encode($rere);
				}
			exit();
			}
		$this->view->render($this->request->get('get'),$this->array);
		}
	function set()
		{
		if($this->request->get('post')!='')
			{
			$this->TF->getTable($this->request->get('get'))->set(array('post'=>$this->request->get('post'),'user'=>$_COOKIE["name"]));
			}
		parent::redirect("index.php?get=chats");
		}
	}
?>