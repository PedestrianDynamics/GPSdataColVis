<?php

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
$time_start = microtime_float();


$time_start = microtime_float();
$timeStamp=date("y-m-d H:i:s");
$var_lang=$_POST["lang"];
$var_lat=$_POST["lat"];
$var_macAddr=$_POST["macAddr"];
$var_accuracy=$_POST["accuracy"];
date_default_timezone_set('UTC');

//$var_macAddr="9r";
//$var_accuracy="1";
 

include("db.php");
//delete the previous position of the current android device
$sqlDelete="delete from current where androidId='$var_macAddr'";
$conn->query($sqlDelete);

 

///////////////////////////////////////////////////////

$sql="insert into traces (lang,lat,timestamp,androidId,accuracy) values('$var_lang','$var_lat','$timeStamp','$var_macAddr','$var_accuracy')";

$sql2="insert into current (lang,lat,timestamp,androidId,accuracy) values('$var_lang','$var_lat','$timeStamp','$var_macAddr','$var_accuracy')";

if($var_accuracy<=10)
  $conn->query($sql2);
  
if ($conn->query($sql) === TRUE  ) {
    echo "New coordinate is stored for research purposes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$time_end = microtime_float();
$time = $time_end - $time_start;

$sqlTime="insert into performance(duration,type) values('$time','pre')";
$conn->query($sqlTime);
$conn->close();

?>