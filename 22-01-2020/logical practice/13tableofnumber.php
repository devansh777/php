<?php
    if(isset($_POST['submit']))
    {
        $number=$_POST['number'];
        for($index=1;$index<=10;$index++)
        {
            echo $number." * ".$index." = ".$number*$index;
            echo"<br>";
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
        Enter number for table :<input type="text" name="number"><input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>