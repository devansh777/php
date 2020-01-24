
<!DOCTYPE html>
<html lang="en">
<?php
if(isset($_POST['submit']))
{
    
    if(!empty($_POST['day']) && !empty($_POST['month']) && !empty($_POST['year']))
    {
  
        $day=htmlentities($_POST['day']);
        $month=htmlentities($_POST['month']);
        $year=htmlentities($_POST['year']);
        echo "Date is :".$day."-".$month."-".$year;
    }
}


?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="#" method="POST">
        Date:<input type="text" name="day"><br>
        Month:<input type="text" name="month"><br>
        Year:<input type="text" name="year"><br>
        <input type="submit" name="submit" value="submit">
    </form>  
</body>
</html>