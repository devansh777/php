<?php
if(isset($_POST['submit']))
{
    $handle=fopen('names.txt','a');
    $names=$_POST['name'];
    fwrite($handle,$names."\n");
    fclose($handle);
    
    $readin=file('names.txt',);
    foreach($readin as $name)
    {
        echo trim($name).", ";
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
    <form method="POST">
        <input type="text" name="name">
        <input type="submit" name="submit">
    </form>
</body>
</html>