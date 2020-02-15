<?php
namespace App\Controllers\Admin;
use Core\View;
use App\Models\Post;
class Category extends \Core\Controller
{
    public function indexAction()
    {
        $posts=Post::getAll("category");
        View::renderTemplate("posts/index.html",['posts'=>$posts]);
    }
    public function insertAction()
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
        View::renderTemplate("posts/insert.html",['parents'=>$parents]);}
    }
    public function displayAction()
    {
        echo"devansh";
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
        $data['image']="";
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
    public function deleteAction()
    {
        $result=Post::deletedata($_GET['id'],"category","categoryId");
        if($result)
        {
            header("location:/task/public/Admin/Category/index");
        }
    }
    public function addNewAction()
    {
        echo "Hello from the add-new action in the Posts controller!";
    }
    public function editAction()
    {
        $posts=Post::getusrdata($_GET['id'],"category","categoryId");
        $parants=Post::getAll("parentcategory");
        
        View::renderTemplate("posts/insert.html",['data'=>$posts[0],'parents'=>$parants]);
        $data=[];
        if(isset($_GET['id']) && isset($_POST['btninsert']))
        {
            $data=Admincontroller::filtercategory();
            $result=Post::updatedata($data,$_GET['id'],"category","categoryId");
            
            header("location:/task/public/Admin/Category/index");
        }
    }
}   
?>