<?php
    $n=1;
    for($i=0;$i<5;$i++)
    {
       if($i==0 || $i==4)
        {
            for($j=0;$j<5;$j++)
            {
                echo" * ";
            }
        }
        else
        {
            for($j=0;$j<5;$j++)
            {
                if($j==0 || $j==4)
                {
                    echo " * " ;
                }
                else
                {
                    echo "&nbsp&nbsp";
                }
            }
        }
        echo"<br><br>";
        
    }


?>