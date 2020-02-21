<?php
namespace App\Controllers;
use Core\View;
use App\Models\Post;

class Service extends \Core\Controller
{
    public function indexAction()
    {
        header('location:/vehicleregistration/public/Service/registration');
    }
    public function registrationAction()
    {
        if(isset($_POST['submitservice']))
        { 
            $data=[];
            $vehical=Post::chkvehical($_POST['vehiclenumber'],$_POST['userlicense']);
            if(empty($vehical))
            {
                $vehical[0]['userid']==$_SESSION['userid'];
                $sloat[0]['row']=0; 
            }
            if($vehical[0]['userid']==$_SESSION['userid'] )
            {
                $sloat=Post::chksloat($_POST['date'],$_POST['timeslot']);
                if(empty($sloat) || $sloat[0]['row']!=3)
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
                    Post::insertdata($data,"service");
                    header('location:/vehicleregistration/public/User/dashboard');        
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
        else
        {
            View::renderTemplate("Service/registration.html");
        }
    }
    public function filterdata()
    {
       
    }
    public function deshboardAction()
    {
        View::renderTemplate("User/deshboard.html"); 
    }
    public function logout()
    {
        session_destroy();
        header('location:/vehicleregistration/public/User/index');
    }
} 
?>