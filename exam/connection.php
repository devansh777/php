<?php
    function conn()
    {
        $host = 'localhost';
        $uname = 'root';
        $password = '';
        $db = 'blog_app';
        $cn=mysqli_connect($host,$uname,$password,$db);
        return $cn;
    }
    function updatedata($table,$data,$cid){
        $fields = [];
        $values = [];
        $set = "";
        $fields = array_keys($data);
        $values = array_values($data);
        for($i = 0;$i<count($fields);$i++){
            $set.=$fields[$i]."=";
            $set.="'".$values[$i]."',";
        }
        $query = "update $table set ".substr($set,0,strlen($set)-1)." where uid='".$cid."'";
        $customer = mysqli_query(conn(),$query);
        if($customer){
            echo"Update Successfully";
        }
    }
    function userdata($table,$uid)
    {
        $query="SELECT * FROM user where uid=".$uid;
        $result=mysqli_query(conn(),$query);
        return mysqli_fetch_assoc($result);
    }
    function insertdata($table,$data) 
    {
        $email="";
        if($table=='user')
            $email=chkemail($data['email']);
           
        if($email || $table=='category' || $table=='blog_post')
        {
            $fields = [];
            $values = [];
            $fields = implode(",",array_keys($data));
            $values = implode("','",$data);
            $query="insert into ".$table;
            $query.="(".$fields.")";
            $query.=" VALUES ('".$values."') ";
            echo $query;
    
            $insert = mysqli_query(conn(),$query);
            return mysqli_insert_id(conn());
            /* if($insert)
            {
                header('location:blogpostlst.php');
            } */
        }
    }
    function chkemail($email)
    {
        $query="SELECT * FROM user WHERE email='$email'";
        $result=mysqli_query(conn(),$query);
        if(mysqli_num_rows($result)==0)
        {
            return true;
        }
        else
        {
            echo "already register email";
        }
    }
    function checklogin($post){
        $query = "SELECT * FROM user WHERE email='".$post['email']."' AND password='".$post['password']."'";
      
        $login = mysqli_query(conn(),$query);
        return mysqli_fetch_assoc($login);
    }
    function show_blogpost()
    {
        $query="SELECT * ,p.category_name,bp.published_at FROM category c,parent_category p, blog_post bp WHERE c. parent_category_id=p. parent_category_id";
        $result=mysqli_query(conn(),$query);
        return $result;
    }
    function show_catagory()
    {
        $query="SELECT * FROM parent_category";
        $result=mysqli_query(conn(),$query);
        return $result;
    }



?>