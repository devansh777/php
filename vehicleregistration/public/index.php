<?php
session_start();
require_once dirname(__DIR__).'/vendor/autoload.php';
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');
$obj = new Core\Router();   
$obj->add('',['controller'=>'User','action'=>'index']);
$obj->add('admin',['namespace' => 'Admin','controller'=>'admin','action'=>'index']);
$obj->add('admin/{controller}',['namespace' => 'Admin', 'action'=> 'index']);
$obj->add('admin/{controller}/{action}',['namespace'=>'Admin']);
$obj->add('Admin/{controller}/{action}/{id:[a-z\d]+}',['namespace'=>'Admin']);
$obj->add('{controller}/{action}');
$obj->add('{controller}/{action}/{id:[a-z\d]+}');
$url=$_SERVER['QUERY_STRING'];
$obj->dispatch($url);
?> 