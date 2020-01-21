<?php
    $numbers = [10,20,[45,35,25],40,50];
    //print_r($numbers);

    $numbars2 = array(false => "c");
    //var_dump($numbars2); 

    $myarray = array("food" =>
                        array("roti","subji",
                        array("panjabi" => "panjabi dal","gujarati" => "gujarati dal","Rajesthani" => "dal fry"),
                        "rise"),
                    "icecrem"=> array("venila","Chocolate"),
                );
    //print_r($myarray['food'][2]["gujarati"]);
    
    $array3=array('1' => 2, 'def' => 4,'ghi' => 8);
    $array3[] = 78;
    /* print_r($array3);
    unset($array3);
    print_r($array3); */

    $array4=array(1,3,2,4,6,5);
  //  $array4=array_values($array4);
  $array4 = 7;
   // print_r($array4);   


   $b = array(1 => "one",2 => "two",3 => "three");  
   unset($b[2]);
   $a=array_values($b);
   // print_r($a);

   foreach($b as $key=>$value)
   {
       // echo "<br>".$key."=>".$value."<br>";
   }
   $bar="5";
   $foo[$bar]="abcd";
  // echo $foo[bar];

  $switch = array(10,'2' => "abcd", 6 => "ramesh", 7, 8 => "Zero", 0 => "devansh", '7' => 'Anand');
  print_r($switch);
  
?>