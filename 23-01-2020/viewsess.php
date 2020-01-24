<?php
session_start();

if(isset($_POST['submit']))
{
    unset($_SESSION['name']);
    
}   
echo "Welcome ".$_SESSION['name'];
?>
<form method="POST">
    <input type="submit" name="submit" value="unset">
    </form>