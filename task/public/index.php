<?php
session_start();
require_once dirname(__DIR__).'/vendor/autoload.php';
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');
$obj = new Core\Router();   
$obj->add('',['controller'=>'home','action'=>'index']);
$obj->add('admin/{controller}',['namespace' => 'Admin', 'action'=> 'index']);
$obj->add('{controller}/{action}');
$obj->add('admin/{controller}/{action}',['namespace'=>'Admin']);
$obj->add('{controller}/{action}/{id:[a-z]+}');

$url=$_SERVER['QUERY_STRING'];
$obj->dispatch($url);
?> 