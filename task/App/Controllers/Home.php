<?php
namespace App\Controllers;
use \Core\View;

class Home extends \Core\Controller     
{
    public function indexAction()
    {
       // echo "Hello from the index action in the HOME controller!";
       $data=['name' => 'Devansh','Color' => ['red','blue','black']];
        View::renderTemplate("Home/abc.html",$data);
    }
    protected function before()
    {
        //echo "(Before) ";
        
    }
    protected function after()
    {
        //echo "(after) ";
    }
}   
?>