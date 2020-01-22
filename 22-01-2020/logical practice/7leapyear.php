<?php
if(isset($_POST['submit'])){
    $year=$_POST['year'];
    if($year%4==0)
    {
        echo"Enter yaer is Leap year";
    }
    else
    {
        echo"Year is not Leap year";
    }
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
        <input type="text" name="year"><input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>