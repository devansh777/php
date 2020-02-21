<?php
namespace App\Controllers\Admin;
use Core\View;
use App\Models\Post;

class Admin extends \Core\Controller
{
    public function indexAction()
    {
        header('location:/vehicleregistration/public/Admin/admin/deshboard');
    }
    public function deshboard()
    {
        $data=Post::getall('service');
        View::renderTemplate("admin/dashboard.html",['service'=>$data]); 
    }
    public function edit($id)
    {
        $posts=Post::getusrdata("*",$id,"service","serviceid");
        View::renderTemplate("Service/registration.html",['data'=>$posts[0]]);
        if(isset($id) && isset($_POST['submitservice']))
        {
            $data=[];
            $vehical=Post::chkvehical($_POST['vehiclenumber'],$_POST['userlicense']);
            echo($vehical[0]['userid']);
            if($vehical[0]['userid']==$_POST['userid'])
            {
                
                $sloat=Post::chksloat($_POST['date'],$_POST['timeslot']);
                    if($sloat[0]['row']!=3)
                    {
                        $data['title']=$_POST['title'];
                        $data['vehiclenumber']=$_POST['vehiclenumber'];
                        $data['userlicense']=$_POST['userlicense'];
                        $data['date']=$_POST['date'];
                        $data['timeslot']=$_POST['timeslot'];
                        $data['vehicalissue']=$_POST['vehicalissue'];
                        $data['servicecenter']=$_POST['center'];
                        $data['status']=$_POST['status'];
                        $result=Post::updatedata($data,$id,"service","serviceid");
                        header('location:/vehicleregistration/public/Admin/admin/index');    
                    } 
                    else
                    {
                        echo"selected Slot is Already Booked";
                    }
            }
            else
            {
                echo"licence or vehicle number already registered";
            }
        }   
    }
    public function filterdata($vehical)
    {
        
    }
    public function booked($id)
    {
        $data['status']=1;
        $result=Post::updatedata($data,$id,"service","serviceid");
        header('location:/vehicleregistration/public/Admin/admin/index');
    }
    public function pending($id)
    {
        $data['status']=0;
        $result=Post::updatedata($data,$id,"service","serviceid");
        header('location:/vehicleregistration/public/Admin/admin/index');
    }
}
   
?>