<?php
$count = 1;
    echo ".... While Loop ...<br>";
    while($count < 10)
    {
        echo $count."<br>";
        $count += 1;
    }
    echo ".... Do Loop ...<br>";
    $count = 1;
    do
    {
        echo $count."<br>";
        $count += 1;
    }while($count < 10);
    echo ".... For Loop ...<br>";
    for($count = 1;$count < 10 ; $count++)
    {
        echo $count."<br>";
    }
?>