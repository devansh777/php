<?php   
require_once'connection.php';
session_start();
$flag="";

function getFieldValue($fieldname,$table,$returntype="")
{   $data=[];
    
    if($table=='blog_post')
    {
        if(isset($_SESSION['editid']))
            $data = userdata('blog_post',$_SESSION['editid'],'post_id');
    } 
    if($table=='user')
    {    
        $data = userdata('user',$_SESSION['uid'],'uid'); 
    }
    if($table=='category')
    {
        if(isset($_SESSION['editcid']))
            $data = userdata('category',$_SESSION['editcid'],'category_id');
    }
    if($table=='post_category')
    {   
        if(isset($_SESSION['editid']))
            $data = userdata('post_category',$_SESSION['editid'],'post_id');
    }
    return (!empty($data) ? $data[$fieldname] : $returntype);
}

    function validation($key,$value)
    {
        switch($key){
            case 'first_name':
            case 'last_name':

                if(preg_match('/^[A-Z a-z]*$/',$value)){
                    return 1;
                }
                break;
            case 'password' :
                if($value == $_POST['cnfPassword']){
                    return 1;
                }
                break;
            case 'mobile' :
                if(preg_match('/^[0-9]*$/',$value)){
                    return 1;
                
                }
                break;
            default :
                    return 1;
        }
    }
    if(isset($_POST['regisrtationSubmit']))
    {
        header('location:registration.php');
    }
    if(isset($_POST['btnregisrtation']))
    {
        $error = [];
        foreach ($_POST as $key => $value){ 
            
            if(!validation($key,$value)){
                echo "enter valid value for ".$key."<br>";
                array_push($error,$key);
            } 
        }
        if(empty($error)){
            
            $cleanary = filterdata($_POST);
        }
    }
    function filterdata($post)
    {
        $data=[];
        $table='user';
        foreach ($_POST as $key => $value){
            switch($key){
                case 'prefix' :
                    $data[$key]=$value;
                    break;
                case 'first_name' :
                    $data[$key]=$value;
                    break;
                case 'last_name' :
                    $data[$key]=$value;
                    break;
                case 'mobile' :
                    $data[$key]=$value;
                    break;
                case 'email' :
                    $data[$key]=$value;
                    break;
                case 'password':
                    $data[$key]=$value;
                    break;
                case 'information':
                    $data[$key]=$value;
                    break;
            }
        }
        
        
        $data['update_at']=date('m/d/Y h:i:s a', time()); 
        if(isset($_POST['btnupdate']))
        {   
            updatedata($table,$data,$_SESSION['uid'],'uid');
        }
        else{
            $data['last_login']=NULL;
            $data['created_at']=date('m/d/Y h:i:s a', time());  
        insertdata($table,$data);}
    }
    function filtercategory($post)
    {
        $data=[];
        $table='category';
        foreach ($_POST as $key => $value){
            switch($key){
                case 'title' :
                    $data[$key]=$value;
                    break;
                case 'content' :
                    $data[$key]=$value;
                    break;
                case 'url' :
                    $data[$key]=$value;
                    break;
                case 'meta_title' :
                    $data[$key]=$value;
                    break;
                case 'parent_category_id' :
                    $data[$key]=$value;
                    break;
            }
        }
        $data['uid']=$_SESSION['uid'];
        $data['image']=fileuplode();
        echo $data['image'];
       
        $data['update_at']=date('m/d/Y h:i:s a', time());  
        if(isset($_POST['updatecatagory']))
        {
            
            updatedata($table,$data,$_SESSION['editcid'],'category_id');
        } 
        else{
            $data['created_at']=date('m/d/Y h:i:s a', time());
            insertdata($table,$data);}
    }

    
    function filterblog($post)
    {
        $data=[];
        $table='blog_post';
        foreach ($_POST as $key => $value){
            switch($key){
                case 'title' :
                    $data[$key]=$value;
                    break;
                case 'content' :
                    $data[$key]=$value;
                    break;
                case 'url' :
                    $data[$key]=$value;
                    break;
                case 'published_at' :
                    $data[$key]=$value;
                    break;
            }
        }
        $data['uid']=$_SESSION['uid'];
        $data['image']=fileuplode();
        echo $data['image'];
        
        $data['updated_at']=date('m/d/Y h:i:s a', time());   
        if(isset($_POST['updateblog']))
        {
            updatedata($table,$data,$_SESSION['editid'],'post_id');
        }
        else{
            $data['created_at']=date('m/d/Y h:i:s a', time());
            insertdata($table,$data);
            $id=lastid($table);
            $post_ID=$_POST['category_id'];
            print_r($_POST['category_id']);
            $input['post_id']=$id['mx'];
            foreach ($post_ID as $key => $value) {
              
            $table='post_category';
          
            $input['category_id']=$value;
          
          
            $id=insertdata($table,$input);
            
            }
            
        }
    }

    if(isset($_POST['loginSubmit']))
    {
        
        $login=checklogin($_POST);
        if($login['uid'])
        {
           
            $_SESSION['name']=$login['first_name'];
            
            $_SESSION['uid']=$login['uid'];
            $table='user';
            $cond='uid';
            $data['last_login']=date('m/d/Y h:i:s a', time());
            updatedata($table,$data,$_SESSION['uid'],$cond);
           header('location:blogpostlst.php');
        }
    }
    if(isset($_POST['addcatagory']))
    {
        filtercategory($_POST);
    }
    if(isset($_POST['addblog']))
    {
        filterblog($_POST);
    }
    if(isset($_POST['logout']))
    {
        session_destroy();
        header('location:login.php'); 
    }
    if(isset($_POST['btnupdate']))
    {
        filterdata($_POST);
    }
    
    if(isset($_GET['editid']))
    {   
    $GLOBALS['flag']='blogupd';
    $_SESSION['editid']=$_GET['editid'];
    header('location:addBlog.php');
    }
    if(isset($_GET['editcid']))
    {   
        echo"devansh";
        $_SESSION['editcid']=$_GET['editcid'];
        $GLOBALS[flag]='catupd';
        header('location:addcategory.php');
    }
    if(isset($_POST['profile']))
    {
        $flag='usrupd';
        header('location:updateprofile.php');
    }
    
    if(isset($_POST['updatecatagory']))
    {
        filtercategory($_POST);
    }
    if(isset($_POST['updateblog']))
    {
        filterblog($_POST);
    }
    if(isset($_POST['AddCategory']))
    {
        unset($_SESSION['editcid']);
        header('location:addcategory.php');   
    }
    if(isset($_POST['manageCategory']))
    {
        unset($_SESSION['editcid']);
        header('location:ManageCategory.php');   
    }
    if(isset($_POST['AddBlog']))
    {
        unset($_SESSION['editid']);
        header('location:addBlog.php');   
    }

    function fileuplode()
    {
        if(isset($_FILES['file']))
        {            
            
            $name=$_FILES['file']['name'];
            $temp_name=$_FILES['file']['tmp_name'];
            $extension=substr($name,strpos($name,'.')+1);
            echo $extension;        
            echo $name;
            if($extension == 'jpg' || $extension == 'jpeg')
            { 
                if(isset($name))
                {
                    $location = 'file/';
                    if(move_uploaded_file($temp_name,$location.$name))
                    {
                        return $name;
                    }
                }
            }
            else
            {
                echo $location.$name;
                echo "<br>file is not jpg or jpeg";
            }
        }
    }
?>