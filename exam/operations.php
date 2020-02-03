<?php   
require_once'connection.php';
session_start();

function getFieldValue($fieldname,$returntype="")
{   $data=[];
    if(isset($_SESSION['uid']))
    {
        $data = userdata('user',$_SESSION['uid']); 
    }
    
    return (is_array($data) ? $data[$fieldname] : $returntype);
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
        $data['last_login']='';
        $data['created_at']='';
        $data['update_at']=''; 
        if(isset($_POST['btnupdate']))
        {   
            updatedata($table,$data,$_SESSION['uid']);
        }
        else{  
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
        $data['created_at']='';
        $data['update_at']='';   
        insertdata($table,$data);
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
        $data['image']='';
        $data['created_at']='';
        $data['updated_at']='';   
        $id=insertdata($table,$data);
        $parent_ID=$_POST['parent_category_id'];
        $input['post_id ']=$id;
        echo $id;
        $input['category_id ']=$parent_ID;
        $table='post_category';
        $id=insertdata($table,$input);
    }

    if(isset($_POST['loginSubmit']))
    {
        
        $login=checklogin($_POST);
        if($login['uid'])
        {
           
            $_SESSION['name']=$login['first_name'];
            
            $_SESSION['uid']=$login['uid'];
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
    if(isset($_POST['profile']))
    {
        header('location:updateprofile.php');
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
?>