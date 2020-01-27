<?php
session_start();
function pdfvalidate()
{
    $name=$_FILES['certificate']['name'];
        $size=$_FILES['certificate']['size'];
        $temp_name=$_FILES['certificate']['tmp_name'];
        $extension=substr($name,strpos($name,'.')+1);
        {
            echo $name;
            if($extension == 'pdf')
            {
                if(isset($name))
                {
                    $location = 'file/';
                    if(move_uploaded_file($temp_name,$location.$name))
                    {
                        $data['certificate'] = $location.$name;
                        return 1;
                    }
                }
            }
            else
            {
                echo "<br>file is not jpg or jpeg";
            }
        }
}
function filevalide()
{
    $name = $_FILES['profilePicture']['name'];
    $size = $_FILES['profilePicture']['size'];
    $temp_name = $_FILES['profilePicture']['tmp_name'];
    $extension = substr($name,strpos($name,'.')+1);
    {
        echo $name;
        if($extension =='jpg' || $extension =='jpeg')
        {                
            if(isset($name))
            {
                $location = 'file/';
                if(move_uploaded_file($temp_name,$location.$name))
                {
                    $_SESSION['profilePicture'] = $location.$name;
                    return 1;
                }
            }
        }
        else
        {
            echo "<br>file is not jpg or jpeg";
        }
    }
}
function validation()
{
    if(!preg_match('/^[A-Z a-z]*$/',$_POST['firstName']))
    {
        echo"Firstname should be in string";
        return 0;
    }
    else if(!preg_match('/^[A-Z a-z]*$/',$_POST['lastName']))
    {
        echo"Lastname should be in string";
        return 0;
    }
    else if(!preg_match('/^[A-Z a-z]*$/',$_POST['city']))
    {
        echo"City should be in string";
        return 0;
    }
    else if(!preg_match('/^[A-Z a-z]*$/',$_POST['compny']))
    {
        echo"compny should be in string";
        return 0;
    }
    else if(!preg_match('/^[A-Z a-z]*$/',$_POST['state']))
    {
        echo"state should be in string";
        return 0;
    }
    else if(!preg_match('/^[0-9]*$/',$_POST['phoneNumber']))
    {
        echo"Phone number should be Numeric";
        return 0;
    }
    else if(!preg_match('/^[0-9]*$/',$_POST['postalcode']))
    {
        echo"Postal Code should be in numeric";
        return 0;
    }
    else{
        return 1;
    }

}
if(isset($_POST['submit']))
{
    if(validation())
    {
        $data = [
            'prefix' => $_POST['prefix'],
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'dob' => $_POST['dob'],
            'email' => $_POST['email'],
            'phoneNumber' => $_POST['phoneNumber'],
            'addressLine1' => $_POST['addressLine1'],
            'addressLine2' => $_POST['addressLine2'],
            'compny' => $_POST['compny'],
            'country' => $_POST['country'],
            'city' => $_POST['city'],
            'state' => $_POST['state'],
            'postalcode' => $_POST['postalcode'],
            'password' => $_POST['password'],
            'describeSelf' => $_POST['describeSelf'],
            'clients' => $_POST['clients'],
            'phone' => $_POST['phone'],
            'sms' => $_POST['sms'],
            'chkemail' => $_POST['chkemail'],
            'post' => $_POST['post'],
            'businessYear' => $_POST['businessYear']
        ];
        $_SESSION['registration'] = $data;
        
        if(filevalide())
        {
            echo "<br>profile picture uploded";
        }
        if(pdfvalidate())
        {
            echo "<br>pdf uploded";
        }
    }
}
?>