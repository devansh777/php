<!DOCTYPE html>
<?php 
$content = "";
    if(isset($_POST['submit']))
    {
        $find = $_POST['find'];
        $replace =$_POST['replace'];
        if($_POST['text'] != "")
        {
            $content = str_ireplace($find,$replace,$_POST['text']);
        
        }
        else
        {
            echo"Text Area is empty";
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
    <textarea name="text" rows="6" cols="30"><?php echo $content ?></textarea>
    <br>
    Search for:<br>
    <input type="text" name="find">
    <br>
    Replace With :<br>
    <input type="text" name="replace">
    <br>
    <input type="submit" name="submit" value="submit">
    </form>
    <td style="background-color: black;"></td>
</body>
</html> 