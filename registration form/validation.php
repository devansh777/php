<?php
require_once 'connection.php';
$GLOBALS['cust']=0;
function getFieldValue($section,$fieldname,$returntype=""){   
    if(isset($_GET['id'])){
     $GLOBALS['cid'] = $_GET['id'];
    }
    else{
        $GLOBALS['cid'] = 1;
    }
    $data;
    if($section == 'account'){
        $data = lastdata('customers',$GLOBALS['cid']);
        return (is_array($data) ? $data[$fieldname] : $returntype);
    }
    if($section == 'address'){
        $data = lastdata('customer_address',$GLOBALS['cid']); 
        return (is_array($data) ? $data[$fieldname] : $returntype);
    }
    if($section == 'other'){
        $data = otherdata('customer_additional_info',$GLOBALS['cid'],$fieldname);    
        return ($data['field_key'] == $fieldname ? $data['value'] : '');
    }
}
function setSession($section){
    $error = [];
    foreach ($_POST[$section] as $key => $value){ 
        if(!validation($key,$value)){
            echo "enter valid value for ".$key."<br>";
            array_push($error,$key);
        } 
    }
    if(empty($error)){
        $cleanary = filterdata($section);
    }
}
function validation($key,$value){
    switch($key){
        case 'firstName':
        case 'lastName':
            if(preg_match('/^[A-Z a-z]*$/',$value)){
                return 1;
            }
            break;
        case 'password' :
            if($value == $_POST['account']['cnfpassword']){
                return 1;
            }
            break;
        case 'phoneNumber' :
        case 'postalcode' :
            if(preg_match('/^[0-9]*$/',$value)){
                return 1;
            
            }
            break;
        default :
                return 1;
    }
}

function filterdata($section){   
    $table = "";
    if($section == 'account'){
        $data=[];
        foreach ($_POST[$section] as $key => $value){
            switch($key){
                case 'prefix' :
                    $data[$key]=$value;
                    break;
                case 'firstName' :
                    $data[$key]=$value;
                    break;
                case 'lastName' :
                    $data[$key]=$value;
                    break;
                case 'dob' :
                    $data[$key]=$value;
                    break;
                case 'phoneNumber' :
                    $data[$key]=$value;
                    break;
                case 'email' :
                    $data[$key]=$value;
                    break;
                case 'password':
                    $data[$key]=$value;
                    break;
            }
        }
        $table='customers';
        if(isset($_POST['update'])){
            updatecustomer($table,$data,$_GET['id']);
        }
        else{
            if(!isset($_GET['id'])){
                $GLOBALS['cust']=insertCustomers($table,$data);
            }
        }
    }
    else if($section == 'address'){        
        $table='customer_address';
        foreach ($_POST[$section] as $key => $value) {
            switch($key){
                case 'addressLine1' :
                    $data[$key]=$value;
                    break;
                case 'addressLine2' :
                    $data[$key]=$value;
                    break;
                case 'compny' :
                    $data[$key]=$value;
                    break;
                case 'city' :
                    $data[$key]=$value;
                    break;
                case 'state' :
                    $data[$key]=$value;
                    break;
                case 'country':
                    $data[$key]=$value;
                    break;
                case 'postalCode' :
                    $data[$key]=$value;
                    break;
            }
        }
        if(isset($_POST['update'])){
            updatecustomer($table,$data,$_GET['id']);
        }
        else{
            if(!isset($_GET['id'])){
            $data['customerId']=$GLOBALS['cust'];
            insertCustomers($table,$data);
            }
        }
    }
    else{
        $table='customer_additional_info';   
        $fields=["customerId","field_key","value"];

        foreach ($_POST[$section] as $key => $value){
            if(is_array($value)){   
                $data['field_key'] = $key;
                $data['value'] = implode(",",$value);   
                if(isset($_POST['update'])){
                    updateotherdata($table,$data,$_GET['id']);
                }
                else{
                    if(!isset($_GET['id'])){
                        $data['customerId'] = $GLOBALS['cust'];
                        insertCustomers($table,$data);
                    }
                }
            }
            else{   
                $data['field_key'] = $key;
                $data['value'] = $value;
                if(isset($_POST['update'])){
                    updateotherdata($table,$data,$_GET['id']);            
                }
                else{
                    if(!isset($_GET['id'])){
                        $data['customerId'] = $GLOBALS['cust'];
                        insertCustomers($table,$data);
                    }
                }
            }   
        }
    }
}
if(isset($_GET['deleteid'])){
    $deleteid = $_GET['deleteid'];
    deletedata($deleteid);
}
if(isset($_POST['account']))
    setSession('account');
if(isset($_POST['address']))
    setSession('address');
if(isset($_POST['other'])){
  /* file upload code */
    setSession('other');
}











/* $profileext=['jpg','jpeg','png'];
$certyext=['pdf'];
if(fileUpload('profilePicture',$profileext))
{
    echo "Profile picture Upload successfully";
}
else
{
    echo "invalid file format";
}
if(fileUpload('certificate',$certyext))
{
    echo "certificate Upload successfully";
}
else
{
    echo "invalid file format";
} */
function fileUpload($fieldname,$profileext)
{
    $name = $_FILES[$fieldname]['name'];
    $size = $_FILES[$fieldname]['size'];
    $temp_name = $_FILES[$fieldname]['tmp_name'];
    $extension = substr($name,strpos($name,'.')+1);
    {
        if(in_array($extension,$profileext))
        {                
            if(isset($name))
            {
                $location = 'file/';
                if(move_uploaded_file($temp_name,$location.$name))
                {
                    return 1;
                }
            }
        }
        else{
            return 0;
        }  
    }
}
?>