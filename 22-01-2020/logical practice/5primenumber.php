
<!DOCTYPE html>
<?php
    if(isset($_POST['submit'])){
    $number=$_POST['number'];
    $flag=1;
    for($i=2;$i<$number;$i++)
    {
        if($number%$i==0)
        {
            $flag=0;
            break;
        }
    }
    if($flag==1)
    {
        echo"Enter number is prime number";
    }
    else{
        echo"Number is not prime";
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
        <input type="text" name="number"><input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>