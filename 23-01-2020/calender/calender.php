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
    
    if($year1<$year2)
    { 
        for($i=$month1;$i<=12;$i++)
        {  
            calender($i,$year1);
        }
        for($i=1;$i<=$month2;$i++)
        {   
            calender($i,$year2);
        }
    }
    else if($year1>$year2)
    {
        echo "Not Found";
    }
    else if($year1==$year2)
    {    
       
        for($i=$month1;$i<=$month2;$i++)
        {
            calender($i,$year1);
        }
    }
}
else
{
    $year1=$_SESSION['year1'];
    $year2=$_SESSION['year2'];
    $month1=$_SESSION['month1'];
    $month2=$_SESSION['month2'];
    if($year1<$year2)
    { 
        for($i=$month1;$i<=12;$i++)
        {  
            calender($i,$year1);
        }
        for($i=1;$i<=$month2;$i++)
        {   
            calender($i,$year2);
        }
    }
    else if($year1>$year2)
    {
        echo "Not Found";
    }
    else if($year1==$year2)
    {    
       
        for($i=$month1;$i<=$month2;$i++)
        {
            calender($i,$year1);
        }
    }
    echo"<br>===========================================<br>";
}
function calender($month,$year)
{
    $tday=cal_days_in_month(0,$month,$year);
    echo $month."-".$year;
    $day= date("l", mktime(0, 0, 0,$month,1,$year));
    $days=["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];

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
    <br><br>
        <form method="POST">
        <table border="1">
            <tr>
                <td>Month1 : <input type="number" name="month1" max="12" min="1"></td>
                <td>Year 1 : <input type="text" name="year1"></td>
            </tr>
            <tr>
                <td>Month2 : <input type="number" name="month2"max="12" min="1"></td>
                <td>Year 2 : <input type="text" name="year2"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="Get calender"></td>
            </tr>
        </table>

        
    </form>
</body>
</html>