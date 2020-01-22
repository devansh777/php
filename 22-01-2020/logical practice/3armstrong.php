<?php
    declare(strict_types=1);
    if(isset($_POST['submit']))
    {
    $n=$_POST['number'];
    $temp=$n;
    $armstrong=0;
    $count=0;
    while($n>0)
    {
        $no=$n%10;
        $armstrong=$armstrong+($no*$no*$no);
        $n=(int)$n/10;
    }
    if($armstrong == $temp)
    {
        echo" Enter Numbar is an armstrong numbre ";
    }
    else
    {
        echo "Number is not an armstrong";
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
        Enter number for Armstrong :<input type="text" name="number"><input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>