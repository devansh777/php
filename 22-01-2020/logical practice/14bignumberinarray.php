<?php
$arry=[105,12,43,66,32,11,99,23,47];
$big=0;
for ($i=0; $i < count($arry) ; $i++) 
{ 
    if($arry[$i]>$big)
    {
        $big=$arry[$i];
    }
}
echo "highest number of array is ".$big;



?>