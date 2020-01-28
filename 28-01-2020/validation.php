<?php
session_start();
function getFieldValue($section,$fieldname,$returntype="")
{
    return (isset($_POST[$section][$fieldname]) ? $_POST[$section][$fieldname] : getSessionValue($section,$fieldname,$returntype));
}
function getSessionValue($section,$fieldname,$returntype)
{
    return (isset($_SESSION[$section][$fieldname]) ? $_SESSION[$section][$fieldname] : $returntype);
}



function setSession($section)
{   $error = [];
    foreach ($_POST[$section] as $key => $value) 
    {
        
        if(!validation($key,$value))
        {
            echo "enter valid value for ".$key."<br>";
            array_push($error,$key);
        }
        
    }
    if(empty($error))
    {
        (isset($_POST[$section])) ? $_SESSION[$section] = $_POST[$section] : [];
    }

}
function validation($key,$value)
{
    switch($key)
    {
        case 'firstName':
        case 'lastName':
            if(preg_match('/^[A-Z a-z]*$/',$value))
            {
                return 1;
            }
            break;
        case 'password' :
            if($value == $_POST['account']['cnfpassword'])
            {
                return 1;
            }
            break;
        case 'phoneNumber' :
        case 'postalcode' :
            if(preg_match('/^[0-9]*$/',$value))
            {
                return 1;
            
            }
            break;
        default :
                return 1;
    }
}
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

if(isset($_POST['account']))
    setSession('account');
if(isset($_POST['address']))
    setSession('address');
if(isset($_POST['other']))
{
    $profileext=['jpg','jpeg','png'];
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
    }
    setSession('other');
}
?>