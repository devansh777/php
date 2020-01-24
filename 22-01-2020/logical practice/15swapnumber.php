<?php
   if(isset($_POST['submit']))
   {
        $number1=$_POST['number1'];
        $number2=$_POST['number2'];

        $number1=$number2+$number1;
        $number2=$number1-$number2;
        $number1=$number1-$number2;

        echo"number 1 is :".$number1."<br> number 2 is :".$number2;
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
        Enter number for number 1 :<input type="text" name="number1"><br>
        Enter number for number 2 :<input type="text" name="number2"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>