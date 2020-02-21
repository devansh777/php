<?php
namespace App\Controllers;
use Core\View;
use App\Models\Post;

class Service extends \Core\Controller
{
    public function indexAction()
    {
        header('location:/vihicalregistration/public/Service/registration');
    }
    public function registrationAction()
    {
        if(isset($_POST['submitservice']))
        { 
            $data=Admin::filterdata();
            Post::insertdata($data,"service");
            header('location:/vihicalregistration/public/User/deshboard');        
            View::renderTemplate("Service/registration.html");
        }
    }
    public function filterdata()
    {
        $vehical=Post::chkvehical($_POST['vehiclenumber'],$_POST['userlicense']);
        if($vehical[0]['userid']==$_SESSION['userid'])
        {
            $sloat=Post::chksloat($_POST['date'],$_POST['timeslot']);
            if($sloat[0]['row']!=3)
            {
                $data['userid']=$_SESSION['userid'];
                $data['title']=$_POST['title'];
                $data['vehiclenumber']=$_POST['vehiclenumber'];
                $data['userlicense']=$_POST['userlicense'];
                $data['date']=$_POST['date'];
                $data['timeslot']=$_POST['timeslot'];
                $data['vehicalissue']=$_POST['vehicalissue'];
                $data['servicecenter']=$_POST['center'];
                $data['status']=$_POST['status'];
                return $data;
            }
            else
            {
                echo"selected Slot is Already Booked";
            }
        }
        else{
            echo"licence or vehicle number already registered";
        }
    }
    public function deshboardAction()
    {
        View::renderTemplate("User/deshboard.html"); 
    }
    public function logout()
    {
        session_destroy();
        header('location:/vihicalregistration/public/User/index');
    }
} 
?>