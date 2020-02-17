<?php
//require '../Core/Router.php';
//$obj=new Router();
//echo get_class($obj);
//require '../App/Controllers/Posts.php';
require_once dirname(__DIR__).'/vendor/autoload.php';

  /*   spl_autoload_register(
	function ($class){
		$root = dirname(__DIR__);
		$file = $root.'/'.str_replace('\\','/',$class).'.php';
		if(is_readable($file)){
			require $root.'/'.str_replace('\\','/',$class).'.php';
		}
	}
); */   
$obj = new Core\Router();
$obj->add('',['controller'=>'Home','action'=>'index']);
/*$obj->add('posts',['controller'=>'Posts','action'=>'index']); */
//$obj->add('posts/new',['controller'=>'Posts','action'=>'new']);
$obj->add('{controller}/{action}');
$obj->add('admin/{controller}/{action}',['namespace'=>'Admin']);
$obj->add('{controller}/{id:\d+}/{action}');
/* echo"<pre>";
echo htmlspecialchars(print_r($obj->getRoutes()));
echo"</pre>"; */
$url=$_SERVER['QUERY_STRING'];
if($obj->match($url)){
	/* echo "<pre>";
	var_dump($obj->getParams());
	echo "</pre>"; */
}
else {
	echo "No rute fount for URL '$url'";	
}
$obj->dispatch($url);
?>