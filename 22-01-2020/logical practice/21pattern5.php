<?php
$num=1;
for($column=1;$column<8;$column++)
{
    for($row=1;$row<=$column;$row++)
    {
        echo $num;
        $num++;
    }
    echo"<br><br>";
}



?>