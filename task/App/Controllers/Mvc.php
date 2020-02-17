<?php
namespace App\Controllers;
use Core\View;
use App\Models\Post;
class Mvc extends \Core\Controller
{
    public function cmsAction(){
        $url = $_SERVER['QUERY_STRING'];
        $temp = substr($url,strripos($url,"/")+1);
        if($temp=="cms")
        {
            $temp="home";
        }
        $temp="'".$temp."'";
        $category=Post::getall('category');
        View::renderTemplate("header.html",['content'=>$category]);
        $data = Post::getusrdata($temp,"cms_page","urlKey");
        View::renderTemplate("cmspage.html",['content'=>$data[0]]);
        $category=Post::getall('cms_page');
        View::renderTemplate("footer.html",['content'=>$category]);
    }
    public function displayproduct()
    {
        $url = $_SERVER['QUERY_STRING'];
        $temp = substr($url,strripos($url,"/")+1);
        $temp="'".$temp."'";
        $category=Post::getall('category');
        View::renderTemplate("header.html",['content'=>$category]);
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
        View::renderTemplate("header.html",['content'=>$category]);
        $data = Post::getusrdata($temp,"products","productName");
        View::renderTemplate("product.html",['content'=>$data]);
        $category=Post::getall('cms_page');
        View::renderTemplate("footer.html",['content'=>$category]);
    }
}
?>