<?php
namespace App\Controllers\Admin;
use Core\View;
use App\Models\Post;
use App\Config; 
class Cms extends \Core\Controller
{
    public function indexAction()
    {
        if(Config::logincheck())
        {
            $posts=Post::getAll("cms_page");
            View::renderTemplate("admin/Cmslist.html",['posts'=>$posts]);
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
                $data=Cms::filterCms();
                $data['createdAt']=date("d-m-Y");
                $result=Post::insertdata($data,"cms_page");
                header("location:/task/public/Admin/Cms/index");
            }
            else{
                $parents=Post::getAll("cms_page");
            View::renderTemplate("admin/Addcms.html",['parents'=>$parents]);}
        }
        else
        {
            header('location:/task/public/Admin/login');
        }
    }
    public function filterCms()
    {   
        $data=[];
        $validation = 0;
        
        $data['pageTitle']=$_POST['pageTitle'];
        $data['urlKey']=$_POST['urlKey'];
        $data['status']=$_POST['status'];
        $data['content']=$_POST['content'];
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
        if(Config::logincheck())
        {
            $result=Post::deletedata($_GET['id'],"cms_page","id");
            if($result)
            {
                header("location:/task/public/Admin/Cms/index");
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
            $posts=Post::getusrdata($_GET['id'],"cms_page","id");
            $parants=Post::getAll("parentcategory");
            
            View::renderTemplate("admin/Addcms.html",['data'=>$posts[0],'parents'=>$parants]);
            $data=[];
            if(isset($_GET['id']) && isset($_POST['btninsert']))
            {
                $data=Cms::filterCms();
                $result=Post::updatedata($data,$_GET['id'],"cms_page","id");
                
                header("location:/task/public/Admin/Cms/index");
            }
        }
        else
        {
            header('location:/task/public/Admin/login');
        }
    }
}   
?>