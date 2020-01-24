<?php
$count=1;
echo"<table border='1'>";
for($i=0;$i<15;$i=$i+$count)
{   echo"<tr>";
    for($j=0;$j<=$i;$j++)
    {
        echo"<td>*</td>";
    }
    for($j=0;$j<$count;$j++)
    {
        echo"<td>0</td>";
    }
    $count++;
    echo"</tr>";
}
echo"</table>";
?>