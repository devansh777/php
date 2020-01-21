<?php
    $string="this is an example of find a position of string. and it is video example";
    $find="is";
    $offset=0;
    $findlength=strlen($find);
    while($strposition=strpos($string,$find,$offset))
    {
        echo '<strong>'.$find."</strong> found at ".$strposition."<br>";
        $offset=$strposition+$findlength;
    }

    $string_new=substr_replace($string,"distance",29,8);
    echo $string_new;

    $new_string=str_replace("is"," - ",$string);
    echo "<br>".$new_string;
?>