<?php
$string = "My name is Devansh shah. & i am a MCA student ! and i m @ Cybercom  now . ";
echo str_word_count($string);
$wordCount = str_word_count($string,2,'.@');
print_r($wordCount);

$stringShuffel = str_shuffle($string);
echo '<br><br>';
$half = substr($stringShuffel, 0, strlen($stringShuffel)/5);
echo($half);
echo '<br><br>';
$reverse = strrev($string);
echo $reverse;
echo"<br><br>";


$name="  devansh     ";
/* var_dump(trim($name));
echo trim($name); */
var_dump($name);
echo "<br>";
var_dump(trim($name));

$string1 = "devansh";
$string2 = "dev";

similar_text($string1,$string2,$result);
echo "<br>".$result."<br>";

$length = strlen($string1);
echo $length;
?>