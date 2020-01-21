<?php
    $array = [
        [1, 2],
        [3, 4],
    ];
    
    foreach ($array as list($a,$b)) {
        // Note that there is no $b here.
        echo "a :$a\t b: $b<br>";
    }
    echo"============================<br>";
   /*  $a = array('abe','ben','cam');

    foreach ($a as $k=>&$n)
    {$n = strtoupper($n);}
    print_r($a); */


/* 
$arr = array();
$arr[0] = "zero";            // will stay an int
$arr["1"] = "one";            // will be cast to an int !
$arr["two"] = "2";            // will stay a string
$arr["3.5"] = "threeandahalf";    // will stay a string

foreach($arr as $key => $value) {
    var_dump($key);
    echo "==";
    var_dump($value);
    echo"<br>";
}*/

/* $d3 = array('a'=>array('b'=>'c'));
foreach($d3['a'] as &$v4){}
foreach($d3 as $v4){}
var_dump($d3);
 */

$a[0] = array('a1','a2');
$a[1] = array('b1','b2','b3');
$a[2] = array('c1','c2');

function getAllCombinations($a,$i,$s)
    {
    foreach ($a[$i] as $v)
        {
        if (!isset($a[$i+1]))
            {
            echo $s.$v."\n";
            } else {
            getAllCombinations($a,$i+1,$s.$v);
            }
        }
    return $s;
    }

echo getAllCombinations($a,0,'');

?> 