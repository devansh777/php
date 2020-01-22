<?php 
if(isset($_POST['submit']))
{
    $first=1;
    $next=0;
    $n=$_POST['number'];

    for($i=0;$i<=$n;$i++)
    {
        echo $first.",";
        $temp=$first;
        $first=$temp+$next;
        $next=$temp;   
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
        Enter number for fibonancci :<input type="text" name="number"><input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>