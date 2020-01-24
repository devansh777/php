<?php
    $n=1;
    echo"<table border='1'>";
    for($i=0;$i<4;$i++)
    {
        echo"<tr>";
        for($j=0,$n=$i+1;$j<3;$j++,$n+=4)
        {
            echo "<td>".$n."</td>";
        }
        echo"</tr>";
    }
    echo"</table>";


?>