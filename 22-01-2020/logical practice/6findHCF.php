<?php
if(isset($_POST['submit']))
{
        $number1=$_POST['number1'];
        $number2=$_POST['number2'];
        $hcf;

        for ($i = 1; $i <= $number1 && $i <= $number2;$i++) {
            if ($number1 % $i == 0 && $number2 % $i == 0)
                $hcf = $i;
        }

        echo "HCF :".$hcf;
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
        Enter number1 :<input type="text" name="number1"><br>
        Enter number2 :<input type="text" name="number2"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
