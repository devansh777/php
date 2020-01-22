<?php
    $string2="JOHN";
    $string1="SMITH";
    $string3="";

    if(strlen($string2)<strlen($string1))
    {
        
        for ($i=0; $i<strlen($string2); $i++) 
        { 
           
            $string3=$string3.$string2[$i].$string1[$i];
        }
        for($i=strlen($string2);$i<strlen($string1);$i++)
        {
            $string3=$string3.$string1[$i];
        }
    }
    
    echo $string3;



?>