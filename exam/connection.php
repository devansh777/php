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
    function updatedata($table,$data,$cid,$cond){
        $fields = [];
        $values = [];
        $set = "";
        $fields = array_keys($data);
        $values = array_values($data);
        for($i = 0;$i<count($fields);$i++){
            $set.=$fields[$i]."=";
            $set.="'".$values[$i]."',";
        }
        $query = "update $table set ".substr($set,0,strlen($set)-1)." where ".$cond."='".$cid."'";
        $customer = mysqli_query(conn(),$query);
        if($customer){
            echo"Update Successfully";
        }
    }
    function userdata($table,$uid,$cond)
    {
        $query="SELECT * FROM $table where ".$cond."='".$uid."'";
        $result=mysqli_query(conn(),$query);
        return mysqli_fetch_assoc($result);
    }
    function insertdata($table,$data) 
    {
        $email="";
        if($table=='user'){
            $email=chkemail($data['email']);}
           
        if($email || $table=='category' || $table=='blog_post' || $table='post_category')
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
            if($insert)
            {
                echo "Data inserted";
            }
            else
            {
                echo "error";
            }
        }
    }
    function lastid($table)
    {
        
        $query="SELECT max(post_id) mx FROM $table ";
        $insert = mysqli_query(conn(),$query);
        return mysqli_fetch_assoc($insert);
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
        $query="SELECT bp.post_id,c.title ctitle,bp.title,bp.published_at FROM category c,blog_post bp WHERE bp.uid=c.uid";
        $result=mysqli_query(conn(),$query);    
        return $result;
    }
    function show_catagory($table)
    {
        $query="SELECT * FROM $table";
        $result=mysqli_query(conn(),$query);
        return $result;
    }   
?>