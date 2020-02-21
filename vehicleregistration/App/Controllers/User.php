<?php
namespace App\Controllers;
use Core\View;
use App\Models\Post;

class User extends \Core\Controller
{
    public function indexAction()
    {
        if(isset($_POST['Registration']))
        {
            header('location:/vehicleregistration/public/User/registration');
        }
        else{
            if(isset($_POST['login']))
            {
                $data=Post::loginchk($_POST['uname'],$_POST['password']);
                if(isset($data[0]['userid']))
                {
                    $_SESSION['userid']=$data[0]['userid'];
                    header('location:/vehicleregistration/public/User/dashboard');
                }
            }
        View::renderTemplate("User/login.html");}
    }
    public function registrationAction()
    {
        if(isset($_POST['submitdata']))
        {
            $data=[];
            $data['firstname']=$_POST['firstname'];
            $data['lastname']=$_POST['lastname'];
            $data['email']=$_POST['email'];
            $data['password']=$_POST['password'];
            $data['phonenumber']=$_POST['phonenumber'];
            $uid=Post::insertdata($data,"users");
            $data=[];
            $data['userid']=$uid;
            $data['street']=$_POST['street'];
            $data['city']=$_POST['city'];
            $data['zipcode']=$_POST['zipcode'];
            $data['country']=$_POST['country'];
            Post::insertdata($data,"useradderss");
            User::index();
        }
        else{
        View::renderTemplate("User/registration.html");}
    }
    public function dashboardAction()
    {
        $data=Post::getusrdata('*',$_SESSION['userid'],'service','userid');
        View::renderTemplate("User/dashboard.html",['service'=>$data]); 
    }

    public function filterdata()
    {   
        $data=[];
        $validation = 0;
        if(!preg_match('/^[A-Z a-z]*$/',$_POST['firstname']))
        {
            echo "Enter Valide Name";
            $validation = 1;
        }
        else
        {
            $data['firstname']=$_POST['firstname'];
        }
        if(!preg_match('/^[A-Z a-z]*$/',$_POST['description']))
        {
            echo "Enter Valide Name";
            $validation = 1;
        }
        else
        {
            $data['description']=$_POST['description'];
        }
        
        $data['urlKey']=$_POST['urlKey'];
        $img=Category::fileuplode();
        if($img!="")
        {
            $data['image']=$img;
        }
        $data['status']=$_POST['status'];
        $data['parentCategory']=$_POST['parentCategory'];    
        if($validation == 0)
        {
            return $data;
        }
        else
        {
            echo "safddsfdsf";
        }
    }
    public function logout()
    {
        session_destroy();
        header('location:/task/public/admin/Admin/login');
    }
} 
?>