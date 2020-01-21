<?php 
    function has_space($str)
    {
        if(preg_match('/ /',$str))
        {
            echo"metch";
        }
        else{
            echo"no match";
        }
    }
$input="myname isdevanshandthisismyfunction";
has_space($input);


?>