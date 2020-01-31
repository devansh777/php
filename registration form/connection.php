<?php 
    $host = 'localhost';
    $uname = 'root';
    $password = '';
    $db = 'customer_portal';
    $cn = mysqli_connect($host,$uname,$password,$db);
    if(!$cn){
        echo " db error";
    }
    function insertCustomers($table,$insvalues){
        $fields = [];
        $values = [];
        $fields = implode(",",array_keys($insvalues));
        $values = implode("','",$insvalues);
        $query="insert into ".$table;
        $query.="(".$fields.")";
        $query.=" VALUES ('".$values."') ";
   
        $insert = mysqli_query($GLOBALS['cn'],$query);
        return mysqli_insert_id($GLOBALS['cn']);
    }
    function lastdata($table,$customerId){
        $query = "select * from ".$table." where customerId=".$customerId;
        $customerId = mysqli_query($GLOBALS['cn'],$query);
        return mysqli_fetch_assoc($customerId);
    }
    function otherdata($table,$customerId,$fieldname){
        $query = "select * from $table where customerId= '$customerId' and field_key= '$fieldname'";
        
        $customerId = mysqli_query($GLOBALS['cn'],$query);
        return mysqli_fetch_assoc($customerId);
    }
    function fetchall(){
        $query = 'SELECT c.customerId,c.firstName,c.email,ca.city,hob.value hobbie,getin.value get_in  from customers c LEFT JOIN customer_address ca ON c.customerId=ca.customerId LEFT JOIN customer_additional_info hob on c.customerId=hob.customerId AND hob.field_key = "hobbie" LEFT JOIN customer_additional_info getin on c.customerId=getin.customerId AND getin.field_key = "gettouch"';
        $customer = mysqli_query($GLOBALS['cn'],$query);
        return $customer;
    }
    function updatecustomer($table,$data,$cid){
        $fields = [];
        $values = [];
        $set = "";
        $fields = array_keys($data);
        $values = array_values($data);
        for($i = 0;$i<count($fields);$i++){
            $set.=$fields[$i]."=";
            $set.="'".$values[$i]."',";
        }
        $query = "update $table set ".substr($set,0,strlen($set)-1)." where customerId=".$cid;
        $customer = mysqli_query($GLOBALS['cn'],$query);
        if($customer){
            echo"Update Successfully";
        }
    }
    function deletedata($cid){
        $query = "delete from customer_additional_info where customerId='$cid'";
        mysqli_query($GLOBALS['cn'],$query);
        $query = "delete from customer_address where customerId='$cid'";
        mysqli_query($GLOBALS['cn'],$query);
        $query = "delete from customers where customerId='$cid'";
        mysqli_query($GLOBALS['cn'],$query);
    }
    function updateotherdata($table,$data,$cid){
        $fields = [];
        $values = [];
        $set = "";
        $fields = array_keys($data);
        $values = array_values($data);
        for($i = 0;$i<count($fields);$i++){
            $set.=$fields[$i]."=";
            $set.="'".$values[$i]."',";
        }
        $query = "update $table set ".substr($set,0,strlen($set)-1)." where customerId=".$cid." and field_key='".$values[0]."'";
        
        $customer = mysqli_query($GLOBALS['cn'],$query);
        if($customer){
        }
        else{
            echo"Error.<br>";
        }
    }
?>