<?php
namespace App\Controllers;
use Core\View;
use App\Models\Post;
class Mvc extends \Core\Controller
{
    public function cmsAction(){
        $url = $_SERVER['QUERY_STRING'];
        $temp = substr($url,strripos($url,"/")+1);
       
        if($temp=="")
        {
            $temp='home';
        }

        $temp="'".$temp."'";

        $category=Post::getall('category');
        $parent=Post::getall('parentcategory');
        View::renderTemplate("header.html",['content'=>$category,'parents'=>$parent]);

        $data = Post::getusrdata($temp,"cms_page","urlKey");
        if($data!=[]){
         View::renderTemplate("cmspage.html",['content'=>$data[0]]);}
        else{
        throw new \Exception("",404);}
       
        $category=Post::getall('cms_page');
        View::renderTemplate("footer.html",['content'=>$category]);

    }
    public function displayproduct()
    {
        $url = $_SERVER['QUERY_STRING'];
        $temp = substr($url,strripos($url,"/")+1);
        $temp="'".$temp."'";

        $category=Post::getall('category');
        $parent=Post::getall('parentcategory');
        View::renderTemplate("header.html",['content'=>$category,'parents'=>$parent]);

        $data = Post::getusrdata($temp,"category","CategoryName");
        $data = Post::products($data[0]["categoryId"]);
        View::renderTemplate("productpage.html",['content'=>$data]);

        $category=Post::getall('cms_page');
        View::renderTemplate("footer.html",['content'=>$category]);
        
    }
    public function products()
    {
        $url = $_SERVER['QUERY_STRING'];
        $temp = substr($url,strripos($url,"/")+1);
        $temp="'".$temp."'";
        $category=Post::getall('category');
        $parent=Post::getall('parentcategory');
        View::renderTemplate("header.html",['content'=>$category,'parents'=>$parent]);
        $data = Post::getusrdata($temp,"products","productName");
        View::renderTemplate("product.html",['content'=>$data]);
        $category=Post::getall('cms_page');
        View::renderTemplate("footer.html",['content'=>$category]);
    }
}
?>