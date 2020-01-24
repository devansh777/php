<!DOCTYPE html>
<?php 
session_start();
if(isset($_POST['submit']))
{
    $month1=$_POST['month1'];
    $_SESSION['month1']=$month1;
    $year1=$_POST['year1'];   
    $_SESSION['year1']=$year1;

    $month2=$_POST['month2'];
    $_SESSION['month2']=$month2;
    $year2=$_POST['year2'];   
    $_SESSION['year2']=$year2;
    
    $y1=(int)$year1;
    
    $y2=(int)$year2;
    
    for($i=$month1;$i<=12;$i++)
    {
        calender($i,$year1);
    }
    for($i=1;$i<=$month2;$i++)
    {
        calender($i,$year2);
    }
}
else
{
    calender($_SESSION['month'],$_SESSION['year']);
    echo"<br>===========================================<br>";
}
function calender($month,$year)
{
    $tday=cal_days_in_month(0,$month,$year);
    echo $month."-".$year;
    $day= date("l", mktime(0, 0, 0,$month,1,$year));
    $days=["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
    echo $day."<br>";
    echo"<table border='1'>
            <tr>
                <th>Monday</th>
                <th>tuesday</th>
                <th>wednesday</th>
                <th>thursday</th>
                <th>friday</th>
                <th>saturday</th>
                <th>sunday</th>
            </tr>";
    $flag=0;
    $d=1;
    for($i = 1;$d<=$tday;$i++)
    {  
        echo"<tr>";
        for($j=0;$j<7;$j++)
        {
            if(($day==$days[$j]) && ($d==1))
            {

                echo"<td align='center'>".$d."</td>";
                $d++;
            }
            else
            {
                if($d<=$tday)
                {
                    if($d!=1)
                    { 
                        echo"<td align='center'>".$d."</td>";  
                        $d++;   
                    }
                    else{
                    echo"<td align='center'></td>";
                    }
                }
            }
        }
        echo"</tr>";
    }
    echo"</table>";
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
    <br><br><br><br>
        <form action="#" method="POST">
        
        Month1 : <input type="text" name="month1"><br>
        Year1 : <input type="text" name="year1"><br>
        Month2 : <input type="text" name="month2"><br>
        Year2 : <input type="text" name="year2"><br>
        <input type="submit" name="submit" value="Get calender">
    </form>
</body>
</html>