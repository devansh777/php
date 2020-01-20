<?php

	$chk = 2;
switch ($chk) 
{
	case 1:
		echo "One <br>";
		break;
	case 2:
		echo "Two <br>";
		break;
	default:
		echo "not match <br>";
		break;
}   

$day = "sunday";
switch($day)
{
	case "sunday":
	case "saturday":
		echo"Weekend Days";
		break;
	default:
		echo"Working days";
		break;

}


?>