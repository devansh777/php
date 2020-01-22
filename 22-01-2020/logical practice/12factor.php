<?php
    if(isset($_POST['submit']))
    {
        $number=$_POST['number'];
        $factor=[];
        $index=0;
        for($i=1;$i<=$number;$i++)
        {
            if($number%$i==0)
            {
                $factor[$index]=$i;
                $index++;
            }
        }
        echo("factor of value is: ");
        for($i=0;$i<count($factor);$i++)
        {
            echo $factor[$i].", ";
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
       Enter number for factor : <input type="text" name="number"><input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>