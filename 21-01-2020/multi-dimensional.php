<?php 
    $myarray= array("healthy" =>
                        array('salad','vegetable','pasta'),
                    "unhealthy" => 
                        array('pizza','ice creams')
                    );
    foreach ($myarray as $key => $value) 
    {
        echo $key;
        foreach ($value as $val) 
        {
            echo "<br>&nbsp&nbsp&nbsp".$val;       
        }
        echo"<br>";       
    }
    echo"<br><br><br>"; 
    $juices["apple"]["green"]["abcd"] = "good";
    $juices["green"][0]="myvalue";
    print_r($juices);
?>