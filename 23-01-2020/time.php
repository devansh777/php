<?php
$time = time();
$actualTime = date('H:i:s',$time);
$actualDay = date('d M Y @ H:i:s',$time);
$modifyTime = date('d M Y @ H:i:s',$time-60);
$modifyWeek = date('d M Y @ H:i:s',strtotime('-1 week'));
echo "current time is ",$actualTime;
echo "<br>current date/time is ",$actualDay;
echo "<br>Modify time is ",$modifyTime;
echo "<br>Modify week is ",$modifyWeek;
?>