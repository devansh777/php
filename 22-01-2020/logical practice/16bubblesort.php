<?php
$aray=[34,1,-3,45,56,67,75,4,5,3,76,1];

$j=0;<?php
    $number1=30;
    $number2=45;
    $gcd;
    
    for ($i = 1; $i <= $number1 && $i <= $number2;$i++) {
        if ($number1 % $i == 0 && $number2 % $i == 0)
            $gcd = $i;
    }
    $lcm = ($number1 * $number2) / $gcd;
    echo "LCM :".$lcm;
?>
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