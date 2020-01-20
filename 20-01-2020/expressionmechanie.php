<?php
    $string = "Devansh naman dev bhavarth vardhit shrenik";
    $match = ['devansh','naman','vardhit']
    if(preg_match($match,$string))
    {
        echo "match the case";
    }
    else{
        echo"case is not match";
    }

?>