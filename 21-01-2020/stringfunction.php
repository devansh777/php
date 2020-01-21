<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="#" method="POST">
        Name: <input type="text" name="txtName"><br>
        <input type="submit" name="btnSubmit" value="Submit">
    </form>
</body>
</html>
<?php
if(isset($_POST["btnSubmit"]))
{
    $name=$_POST['txtName'];
    $name=strtoupper($name);
    echo$name;
}



?>