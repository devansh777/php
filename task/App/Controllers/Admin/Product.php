<?php
namespace App\Controllers\Admin;
use Core\View;
use App\Models\Post;
class Product extends \Core\Controller
{
    public function indexAction()
    {
        $posts=Post::getAll("products");
        View::renderTemplate("admin/productlist.html",['posts'=>$posts]);
    }
    public function addproductAction()
    {  
        if(isset($_POST['btninsert'])){
            $data=[];
            $data=Product::filterproduct();
            $data['createdAt']=date("d-m-Y");
            $result=Post::insertdata($data,"products");
            $cat['category_id']=$_POST['category'];
            $cat['product_id']=$result;
            Post::insertdata($cat,"products_categories");
            header("location:/task/public/Admin/Product/index");
        }
        else{
            $category=Post::getAll("category");
            View::renderTemplate("admin/addnewproduct.html",['parents'=>$category]);
        }
    }
    public function filterproduct()
    {   
        $data=[];
        $validation = 0;
        $data['productName']=$_POST['productName'];
        $data['sku']=$_POST['sku'];
        $data['urlKey']=$_POST['urlKey'];
        $data['image']="";
        $data['status']=$_POST['status'];
        $data['description']=$_POST['description'];
        $data['price']=$_POST['price'];
        $data['stock']=$_POST['stock'];
        $data['shortDescription']="";
       //s $data['category']=$_POST['category'];    
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
        $result=Post::deletedata($_GET['id'],"products","productId");
        if($result)
        {
            header("location:/task/public/Admin/Product/index");
        }
    }
    public function editAction()
    {
        $posts=Post::getusrdata($_GET['id'],"products","productId");
        $parants=Post::getAll("category");
        $category=Post::getusrdata($_GET['id'],"products_categories","product_Id");   
        View::renderTemplate("admin/addnewproduct.html",['data'=>$posts[0],'parents'=>$parants,'category'=>$category[0]]);
        $data=[];
        if(isset($_GET['id']) && isset($_POST['btninsert']))
        {
            $data=Product::filterproduct();
            $result=Post::updatedata($data,$_GET['id'],"products","productId");
            $cat['category_id']=$_POST['category'];
            $cat['product_id']=$_GET['id'];
            $result=Post::updatedata($cat,$_GET['id'],"products_categories","product_Id");
            header("location:/task/public/Product/index");
        }
    }
}
?>