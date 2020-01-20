<?php
    $userIp = $_SERVER['REMOTE_ADDR'];


    function displayIp()
    {
        global $userIp;
        echo "My Ip Address is : $userIp";
    }
    //displayIp();



    

?>