<?php
namespace App\Controllers\Admin;
use Core\View;
use App\Models\Post;
use App\Config; 
class Product extends \Core\Controller
{
    public function indexAction()
    {
        if(Config::logincheck())
        {
            $posts=Post::getAll("products");
            View::renderTemplate("admin/productlist.html",['posts'=>$posts]);
        }
        else{
            header('location:/task/public/Admin/login');
        }
    }
    public function addproductAction()
    {  
        if(Config::logincheck())
        {
            if(isset($_POST['btninsert'])){
                $data=[];
                $data=Product::filterproduct();
                $data['createdAt']=date("d-m-Y");
                $result=Post::insertdata($data,"products");
                $cat['categoryId']=$_POST['category'];
                foreach ($cat['categoryId'] as $key => $value) {
                   $c['categoryId']=$value;
                   $c['productId']=$result;
                   Post::insertdata($c,"products_categories");
                }
                header("location:/task/public/Admin/Product/index");
            }
            else{
                $category=Post::getAll("category");
                View::renderTemplate("admin/addnewproduct.html",['parents'=>$category]);
            }
        }
        else
        {
            header('location:/task/public/Admin/login');
        }
    }
    public function filterproduct()
    {   
        $data=[];
        $validation = 0;
        $data['productName']=$_POST['productName'];
        $data['sku']=$_POST['sku'];
        $data['urlKey']=$_POST['urlKey'];
        $img=Product::fileuplode();
        if($img!="")
        {
            $data['image']=$img;
        }
        $data['status']=$_POST['status'];
        $data['description']=$_POST['description'];
        $data['price']=$_POST['price'];
        $data['stock']=$_POST['stock'];
        $data['shortDescription']=$_POST['shortDescription'];
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
        
    }
    public function deleteAction()
    {
        if(Config::logincheck())
        {
            $result=Post::deletedata($_GET['id'],"products","productId");
            if($result)
            {
                header("location:/task/public/Admin/Product/index");
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
            $posts=Post::getusrdata($_GET['id'],"products","productId");
            $parants=Post::getAll("category");
            $category=Post::getusrdata($_GET['id'],"products_categories","productId");   
            $arr=[];
            foreach ($category as $key) {
                array_push($arr,$key['categoryId']);
            }
            View::renderTemplate("admin/addnewproduct.html",['data'=>$posts[0],'category'=>$parants,'selectedcategory'=>$arr]);
            $data=[];
            if(isset($_GET['id']) && isset($_POST['btninsert']))
            {
                $data=Product::filterproduct();

                $result=Post::updatedata($data,$_GET['id'],"products","productId");
                $cat['categoryId']=$_POST['category'];
                $result=Post::deletedata($_GET['id'],"products_categories","productId");
                print_r($cat['categoryId']);
                foreach ($cat['categoryId'] as $key => $value) {
                    $c['categoryId']=$value;
                    $c['productId']=$_GET['id'];
                    Post::insertdata($c,"products_categories");
                 }
                header("location:/task/public/Admin/Product/index");
            }
        }
        else
        {
            $category=Post::getAll("category");
            View::renderTemplate("admin/addnewproduct.html",['parents'=>$category]);
        }
    }
}
?>