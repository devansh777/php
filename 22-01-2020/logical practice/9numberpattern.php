<?php
echo"<table border='1'>";
for($column=8;$column>0;$column--)
{
    echo"<tr>";
    for($row=1;$row<=$column;$row++)
    {
        echo "<td>".$row."</td>";
    }
    echo"</tr>";
}
echo"</table>";


?>