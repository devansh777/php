<?php
    $n=1;
    for($i=0;$i<4;$i++)
    {
        echo"<br>";
        for($j=0,$n=$i+1;$j<3;$j++,$n+=4)
        {
            echo $n." ";
        }
        
    }


?>