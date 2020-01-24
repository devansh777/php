
<!DOCTYPE html>
<html lang="en">
<?php
if(isset($_GET['submit']))
{
    
    if(!empty($_GET['day']) && !empty($_GET['month']) && !empty($_GET['year']))
    {
  
        $day=$_GET['day'];
        $month=$_GET['month'];
        $year=$_GET['year'];
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
    <form action="#" method="GET">
        Date:<input type="text" name="day"><br>
        Month:<input type="text" name="month"><br>
        Year:<input type="text" name="year"><br>
        <input type="submit" name="submit" value="submit">
    </form>  
</body>
</html>