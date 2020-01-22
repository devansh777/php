<?php
$aray=[64,34,25,12,22,11,90];

$j=0;
while($j<count($aray))
{
    $i=0;
    while($i<count($aray)-1){
        if($aray[$i]>$aray[$i+1])
        {
            $temp=$aray[$i];
            $aray[$i]=$aray[$i+1];
            $aray[$i+1]=$temp;
        
        }
        $i=$i+1;
    }
    $j++;
}

print_r($aray);


?>