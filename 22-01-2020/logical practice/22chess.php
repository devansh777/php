<?php

echo"<table border='1'>";
    for($i=0;$i<8;$i++)
    {   
        echo"<tr>";
        for($j=0;$j<7;$j++)
        {
            if($i%2==0)
            {
                if($j%2==0)
                {
                    echo"<td height='20px' width='20px'></td>";
                   
                }
                else
                {
                    echo"<td style='background-color: black'; height='20px' width='20px'></td>";
                }
               
            }
            else
            {
                if($j%2==0)
                {
                    echo"<td style='background-color: black; height='20px' width='20px''></td>";
                }
                else
                {
                    echo"<td height='20px' width='20px'></td>";
                }
                
            }
        }
        echo"</tr>";
    }
echo"</table>";




?>