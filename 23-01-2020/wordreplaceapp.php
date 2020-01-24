<?php 
    if(isset($_POST['submit']))
    {
        $find = ['devansh', 'anand', 'naman'];
        $replace = ['d*****h', 'a***d', 'n***n'];
        if($_POST['text'] != "")
        {
            $replacestr = str_ireplace($find,$replace,$_POST['text']);
            echo $replacestr;
        }
        else
        {
            echo"Text Area is empty";
        }
    }
?>
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
    <textarea name="text"></textarea>
    <br>
    <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>