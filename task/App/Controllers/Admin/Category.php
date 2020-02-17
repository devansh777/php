<?php
namespace App\Controllers\Admin;
use Core\View;
use App\Models\Post; 
use App\Config;   
class Category extends \Core\Controller
{
    public function indexAction()
    {
        if(Config::logincheck())
        {
            $posts=Post::getAll("category");
            View::renderTemplate("admin/categorylist.html",['posts'=>$posts]);
           // session_destroy();
        }
        else
        {
            header('location:/task/public/Admin/login');
        }
    }
    public function addAction()
    {  
        if(Config::logincheck())
        {
            if(isset($_POST['btninsert']))
            {
                $data=[];
                $data=Category::filtercategory();
                $data['createdAt']=date("d-m-Y");
                $result=Post::insertdata($data,"category");
                header("location:/task/public/Admin/Category/index");
            }
            else{
                $parents=Post::getAll("parentcategory");
            View::renderTemplate("admin/addnewcategory.html",['parents'=>$parents]);}
        }
        else
        {
            header('location:/task/public/Admin/login');
        }
    }
   
    public function filtercategory()
    {   
        $data=[];
        $validation = 0;
        if(!preg_match('/^[A-Z a-z]*$/',$_POST['CategoryName']))
        {
            echo "Enter Valide Name";
            $validation = 1;
        }
        else
        {
            $data['CategoryName']=$_POST['CategoryName'];
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
    function fileuplode(){
        if(isset($_FILES['file'])){            
            $name=$_FILES['file']['name'];
            $temp_name=$_FILES['file']['tmp_name'];
            $extension=substr($name,strpos($name,'.')+1);
            echo $extension;        
            echo $name;
            if($extension == 'jpg' || $extension == 'jpeg'){ 
                if(isset($name)){
                    $location = '../file/';
                    if(move_uploaded_file($temp_name,$location.$name)){
                        return $name;
                    }
                }
            }
            else{
                return "";
            }
        }
        else{
            return "";
        }
        
    }
    public function deleteAction()
    {
        if(Config::logincheck())
        {
            $result=Post::deletedata($_GET['id'],"category","categoryId");
            if($result)
            {
                header("location:/task/public/Admin/Category/index");
            }
        }
        else
        {
            header('location:/task/public/Admin/login');
        }
    }
   
    public function editAction()
    {
        if(Config::logincheck())
        {
            $posts=Post::getusrdata($_GET['id'],"category","categoryId");
            $parants=Post::getAll("parentcategory");
            
            View::renderTemplate("admin/addnewcategory.html",['data'=>$posts[0],'parents'=>$parants]);
            $data=[];
            if(isset($_GET['id']) && isset($_POST['btninsert']))
            {
                $data=Category::filtercategory();
                $result=Post::updatedata($data,$_GET['id'],"category","categoryId");
                
                header("location:/task/public/Admin/Category/index");
            }
        }
        else
        {
            header('location:/task/public/Admin/login');
        }
    }
}   
?>