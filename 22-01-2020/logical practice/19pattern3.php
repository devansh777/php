<?php
      echo"<table border='1'>";
    $n=1;
    for($i=0;$i<5;$i++)
    {
        echo"<tr>";
       if($i==0 || $i==4)
        {
            for($j=0;$j<5;$j++)
            {
                echo"<td> * </td> ";
            }
        }
        else
        {
            for($j=0;$j<5;$j++)
            {
                if($j==0 || $j==4)
                {
                    echo "<td> * </td>" ;
                }
                else
                {
                    echo "<td></td>";
                }
            }
        }
        echo"</tr>";
        
    }
    echo"</table>";
?>