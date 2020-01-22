<?php
echo"<table border='1'>";
for($column=10;$column>0;$column--)
{
    echo"<tr>";
    for($row=0;$row<$column;$row++)
    {
        echo"<td>*</td> ";
    }
    echo"</tr>";
}
echo"</table>";
?>