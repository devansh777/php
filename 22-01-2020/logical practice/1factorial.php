<?php

if(isset($_POST['submit']))
{
    $no=$_POST['number'];
    $factorial=1;
    while($no>0)
    {
        $factorial=$factorial*$no;
        $no-=1;
    }
    echo "factorial of given number is : ".$factorial;
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="#" method="POST">
        Enter number for factorial :<input type="text" name="number"><input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>