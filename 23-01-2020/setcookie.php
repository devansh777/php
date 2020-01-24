<?php
if(isset($_POST['submit']))
{

    setcookie('name',$_POST['name'],time()+1000 );
    
    setcookie('password',$_POST['password'],time()+1000 );
    if( (!empty($_COOKIE['name'])) && (!empty($_COOKIE['password'])) )
    {
        header('location: viewcookie.php');
    }
}
?>

<form method="POST">
   Name: <input type="text" name="name">
   Password: <input type="password" name="password">
    <input type="submit" name="submit">
</form>