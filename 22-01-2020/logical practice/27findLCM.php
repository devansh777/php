<?php
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