<?php
    include 'process1.php';
    $name = $_SERVER["SCRIPT_NAME"];
    echo $name."<br>";
    echo "HOST NAME : ".$_SERVER["HTTP_HOST"]."<br>";
    echo "Client IP : ".$_SERVER["HTTP_CLIENT_IP"]."<br>";
    echo "Client IP :".$_SERVER['HTTP_X_FORWORDED_FOR']."<br>";
    echo "Client IP :".$_SERVER['REMOTE_ADDR']."<br>";

?>