<?php 
if(isset($_POST['submit'])){
$number=$_POST['number'];
$reverse=0;
while($number>=1)
{
    $reverse*=10;
    $reverse=$reverse+($number%10);
    $number=(int)$number/10;
    
}
echo"Reverse number is :".$reverse;
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
        <input type="text" name="number"><input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>