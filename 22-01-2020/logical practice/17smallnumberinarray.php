<?php
$arry=[105,12,43,1,66,32,11,99,23,47];
$small=$arry[0];
for ($i=0; $i < count($arry) ; $i++) 
{ 
    if($arry[$i]<$small)
    {
        $small=$arry[$i];
    }
}
echo "smallest number of array is ".$small;