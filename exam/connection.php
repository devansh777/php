<?php
    function conn(){
        $host = 'localhost';
        $uname = 'root';
        $password = '';
        $db = 'blog_app';
        $cn = mysqli_connect($host,$uname,$password,$db);
        return $cn;
    }
    function updatedata($table,$data,$cid,$cond){
         $email = "";
        if($table == 'user'){
            if($data['email'] != $_SESSION['email']){
                $email = chkemail($data['email']);
            }
            else{
                $email = 1;
            }
        }      
        if($email || $table == 'category' || $table == 'blog_post' || $table == 'post_category'){ 
            $fields = [];
            $values = [];
            $set = "";
            if($table == 'user')
                $_SESSION['email'] = $data['email'];
            $fields = array_keys($data);
            $values = array_values($data);
            for($i = 0;$i<count($fields);$i++){
                $set.= $fields[$i]."=";
                $set.= "'".$values[$i]."',";
            }
            $query = "update $table set ".substr($set,0,strlen($set)-1)." where ".$cond."='".$cid."'";
            $customer = mysqli_query(conn(),$query);
            if($customer){
                echo"Update Successfully";
            }

            if($table == 'post_category'){
                $query = 'delete from post_category where post_id='.$cid;
                mysqli_query(conn(),$query);
                $input['post_id'] = $cid;
                foreach ($data as $key => $value){
                    echo $value;
                $table = 'post_category';
                $input['category_id'] = $value; 
                insertdata($table,$input);
                }
            }
        }
    }
    function insertdata($table,$data){
        $email = "";
        if($table == 'user'){
            $email = chkemail($data['email']);
        }
            
        if($email || $table == 'category' || $table == 'blog_post' || $table='post_category'){
            $fields = [];
            $values = [];
            $fields = implode(",",array_keys($data));
            $values = implode("','",$data);
            $query = "insert into ".$table;
            $query.="(".$fields.")";
            $query.= " VALUES ('".$values."') ";
            $insert = mysqli_query(conn(),$query);
            if($insert){
                echo "Data inserted";
            }
            else{
                echo "error";
            }
        }
    }
    function userdata($table,$uid,$cond){
        $query = "SELECT * FROM $table where ".$cond."='".$uid."'";
        $result = mysqli_query(conn(),$query);
        return  $result;
    }
    
    function lastid($table){
        $query = "SELECT max(post_id) mx FROM $table ";
        $insert = mysqli_query(conn(),$query);
        return mysqli_fetch_assoc($insert);
    }
    function chkemail($email){
        $query = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query(conn(),$query);
        if(mysqli_num_rows($result) == 0){
            return true;
        }
        else{
            echo "already register email";
        }
    }
    function checklogin($post){
        $query = "SELECT * FROM user WHERE email='".$post['email']."' AND password ='".$post['password']."'";
        $login = mysqli_query(conn(),$query);
        return mysqli_fetch_assoc($login);
    }
    function show_blogpost(){
        $query = "Select 
        P.post_id,P.title,P.published_at,
        GROUP_CONCAT(C.title) AS ctitle
        FROM
            blog_post P
        INNER JOIN
            post_category PC
        ON	
            P.post_id = PC.post_id
        INNER JOIN
            category C
        ON
            C.category_id = PC.category_id
            AND P.uid=".$_SESSION['uid']."
        GROUP BY
            P.post_id";
        $result = mysqli_query(conn(),$query);  
        if($result){  
            return $result;
        }
    }
    function deleteblog($id){   
        $query = 'delete from blog_post where post_id='.$id;
        $result = mysqli_query(conn(),$query);    
        return $result;
    }
    function show_catagory($table){
        $query = "SELECT * FROM $table" ;
        $result = mysqli_query(conn(),$query);
        return $result;
    }   
?>