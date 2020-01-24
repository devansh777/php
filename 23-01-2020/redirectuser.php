<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Home page</h2>    
</body>
</html>

<?php
ob_start();
$location="http://www.google.com";

$redirect=false;

if($redirect==true)
{
    header('Location:'.$location);
}
ob_end_flush();


?>