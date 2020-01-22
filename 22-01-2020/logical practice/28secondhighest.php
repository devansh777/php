<?php
$aray=[220,43,2,33,76,45,87,23];
$higHest=$aray[0];
$secondHighest=0;
for($i=0;$i<count($aray);$i++)
{
    if($aray[$i]<$higHest && $aray[$i]>$secondHighest)
    {
        $secondHighest=$aray[$i];
    }
    if($aray[$i]>$higHest)
    {
        $secondHighest=$higHest;
        $higHest=$aray[$i];
    }
}
echo "Second highest value is :".$secondHighest;


?>