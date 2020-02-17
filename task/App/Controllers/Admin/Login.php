<?php
namespace App\Controllers\Admin;
use Core\View;
use App\Models\Post;

class Login extends \Core\Controller
{
    public function indexAction()
    {
         if(isset($_POST['login']))
        {
            if($_POST['uname']=='admin' && $_POST['password']=='admin')
            {
                $_SESSION['uname']="admin";
                Login::dashboard();
            }
        }
        else
        {View::renderTemplate("admin/login.html");}
    }
    public function dashboard()
    {
        View::renderTemplate("admin/dashboard.html");
    }
    public function logout()
    {
        session_destroy();
        header('location:/task/public/Admin/login');
    }
} 
?>