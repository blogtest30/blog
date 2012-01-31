<?php
//////////////////////////////////////////////
/////////////BLOG.MAVR.ELITNO.NET/////////////
//////////////////////////////////////////////
require'db.php';
require'model.php';
require'view.php';
require'request.php';
require'lib.php';
define(DB_NAME,'MySQL');
define(DB_SERVER,'localhost');
define(DB_USER,'root');
define(DB_PASSWORD,'password');
define(DB_BASE,'blog');
define(PATH_TO_MODEL,'./models');
define(PATH_TO_TEMPLATE,'./templates');
define(PATH_TO_CONTROLLER,'./controllers');
//////////////////////////////////////////////
header("Content-type:text/html; charset=utf-8");
$database=DB_NAME;
$db=new $database;
?>