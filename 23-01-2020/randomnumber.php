<?php 
if(isset($_POST['dice']))
{
    $number = rand(1,6);
    echo "you rolled ".$number;
}


?>

<form action="#" method="POST">
<input type="submit" value="Roll Dice" name="dice">



</form>