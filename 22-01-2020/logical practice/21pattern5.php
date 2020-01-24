<?php
$num=1;
echo"<table border='1'>";
for($column=1;$column<8;$column++)
{   echo"<tr>";
    for($row=1;$row<=$column;$row++)
    {
        echo "<td>". $num."</td>";
        $num++;
    }
    echo"</tr>";
}
echo"</table>";



?>