<?php
class Messages_Controller
	{
	function __construct($request,$TF)
		{
		$this->request=$request;
		$this->TF=$TF;
		$this->view=new View();
		$this->array=array('users'=>$this->TF->getTable('users')->get_all(),'messages'=>$this->TF->getTable('messages')->get_all(),'tags'=>$this->TF->getTable('tags')->get_all(),'messages_tags'=>$this->TF->getTable('messages_tags')->get_all());
		}
	function all()
		{
		$this->view->render($this->request->get('get'),$this->array);
		}
	function get()
		{
		if($this->request->in_request('user'))
			{
			$this->array['messages']=$this->TF->getTable($this->request->get('get'))->get(array('id_users'=>$this->request->get('user')));
			$this->view->render($this->request->get('get'),$this->array);
			}
		if($this->request->in_request('tag'))
			{
			$this->array['messages']=$this->TF->getTable('messages_tags')->iget($this->request->get('get'),array('messages.id','messages_tags.id_messages'),array('messages_tags.id_tags',$this->request->get("tag")));
			$this->view->render($this->request->get('get'),$this->array);
			}
		}
	function set()
		{
		if($this->request->get('message')!='')
			{
			$this->TF->getTable($this->request->get('get'))->set(array('message'=>$this->request->get('message'),'id_users'=>$_COOKIE["name"]));
			if(count($this->request->get('tag'))>0)
				{
				foreach($this->request->get('tag') as $ve)
					{
					$oneoftag=$this->TF->getTable('tags')->get(array('tagname'=>$ve));
					$this->TF->getTable('messages_tags')->set(array('id_tags'=>$oneoftag[0]['id'],'id_messages'=>$this->TF->getTable('messages')->max()));
					}
				}
			elseif(strlen($this->request->get('usertag'))>0)
				{
				foreach(explode(',',mysql_escape_string(trim($this->request->get('usertag')))) as $ve)
					{
					if(in_array($ve,$this->TF->getTable('tags')->get_all(false,'tagname')))
						{
						$oneoftag=$this->TF->getTable('tags')->get(array('tagname'=>$ve));
						$this->TF->getTable('messages_tags')->set(array('id_tags'=>$oneoftag[0]['id'],'id_messages'=>$this->TF->getTable('messages')->max()));
						}
					else
						{
						$this->TF->getTable('tags')->set(array('tagname'=>$ve));
						$this->TF->getTable('messages_tags')->set(array('id_tags'=>$this->TF->getTable('tags')->max(),'id_messages'=>$this->TF->getTable('messages')->max()));
						}
					}
				}
			}
		header("Location:index.php");
		}
	function delete()
		{
		$this->TF->getTable($this->request->get('get'))->delete(array('id'=>$this->request->get('message')));
		header("Location:index.php");
		}
	}
?>