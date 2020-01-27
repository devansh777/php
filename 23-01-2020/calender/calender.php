<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <br><br>
        <form method="POST">
        <table>
            <tr>
                <td>Month From : <input type="number" name="monthFrom" max="12" min="1"></td>
                <td>Year From  : <input type="text" name="yearFrom"></td>
            </tr>
            <tr>
                <td>Month To : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="monthTo" max="12" min="1"></td>
                <td>Year To  :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="yearTo"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="Get calender"></td>
            </tr>
        </table>
    </form>
    <br><br>
</body>
</html>
<?php 
session_start();
if(isset($_POST['submit']))
{
    $monthFrom=$_POST['monthFrom'];
    $_SESSION['monthFrom']=$monthFrom;
    $yearFrom=$_POST['yearFrom'];   
    $_SESSION['yearFrom']=$yearFrom;

    $monthTo=$_POST['monthTo'];
    $_SESSION['monthTo']=$monthTo;
    $yearTo=$_POST['yearTo'];   
    $_SESSION['yearTo']=$yearTo;
    
    if($yearFrom<$yearTo)
    { 
        for($i=$monthFrom;$i<=12;$i++)
        {  
            calender($i,$yearFrom);
        }
        for($i=1;$i<=$monthTo;$i++)
        {   
            calender($i,$yearTo);
        }
    }
    else if($yearFrom>$yearTo)
    {
        echo "Not Found";
    }
    else if($yearFrom==$yearTo)
    {    
       
        for($i=$monthFrom;$i<=$monthTo;$i++)
        {
            calender($i,$yearFrom);
        }
    }
}
else
{
    $yearFrom=$_SESSION['yearFrom'];
    $yearTo=$_SESSION['yearTo'];
    $monthFrom=$_SESSION['monthFrom'];
    $monthTo=$_SESSION['monthTo'];
  
    if($yearFrom<$yearTo)
    { 
        for($i=$monthFrom;$i<=12;$i++)
        {  
            calender($i,$yearFrom);
        }
        for($i=1;$i<=$monthTo;$i++)
        {   
            calender($i,$yearTo);
        }
    }
    else if($yearFrom>$yearTo)
    {
        echo "Not Found";
    }
    else if($yearFrom==$yearTo)
    {    
       
        for($i=$monthFrom;$i<=$monthTo;$i++)
        {
            calender($i,$yearFrom);
        }
    }
    
}
function calender($month,$year)
{
    $tday=cal_days_in_month(0,$month,$year);
   
    $day= date("l", mktime(0, 0, 0,$month,1,$year));
    $days=["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
    $arymonth=['January','February','March','April','May','June','July','August','September','October','November','December'];
    echo "<h3>".$arymonth[$month-1]." ".$year."</h3> <br>";
    echo"<table border='1'>
            <tr>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>&nbsp;Friday&nbsp;</th>
                <th>Saturday</th>
                <th>Sunday</th>
            </tr>";
    $d=1;
    for($i = 1;$d<=$tday;$i++)
    {  
        echo"<tr>";
        for($j=0;$j<7;$j++)
        {
            if(($day==$days[$j]) && ($d==1))
            {

                echo"<td>".$d."</td>";
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