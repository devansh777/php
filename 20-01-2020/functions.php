<?php
    function displayName()
    {
        echo "My name is devansh.";
    }


    // displayName();



    function calculateSum($number1, $number2)
    {
        return $number1+$number2;
    }

    $number1 = 24;
    $number2 = 35;
   // $answer = calculateSum($number1, $number2);
   // echo "<br> Sum is : $answer";

    function recursion($count)
    {
        if($count < 20)
        {
            echo "<br>".$count;
            recursion($count + 1);
        }
    }
    //recursion(2);


    function addReferance(&$str,&$str1)
    {
        $str=$str." This is extra Add";
        $str1=$str1."add second value";
        
    }

    $string="this is first Content";
    $string1 = "this is my first value.";
    addReferance($string,$string1);

    echo $string;
    echo "<br><br>";
    echo $string1;


?>