<?php
require'config.php';
$TF=new TableFactory($db,PATH_TO_MODEL);
$request=new Request;
$controllerName=ucfirst(strtolower($request->get('get')))."_Controller";
require(PATH_TO_CONTROLLER.'/'.strtolower($request->get('get')).'.php');
$controller=new $controllerName($request,$TF);
$methodName=ucfirst(strtolower($request->get('display')));
$controller->$methodName();
	//print_r($TF->getTable('messages_tags')->get(array('id_messages'=>1)));
	//print_r($factory->getTable('users')->update_users(array('lastname'=>'Чайников'),4));
	//print_r($TF->getTable('messages')->set(array('message'=>'user','id_users'=>'1')));
	//print_r($TF->getTable('users')->set(array('login'=>'user','password'=>'userpass','firstname'=>"Юзер",'lastname'=>'Юзеров','email'=>'user\@us.er','img'=>'')));
	//print_r($db->get_last_id());
	//print_r($TF->getTable('messages')->delete(array('message'=>'user')));
	//print_r($TF->getTable('users')->delete(array('lastname'=>'Юзеров')));
?>