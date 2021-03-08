<?php
date_default_timezone_set('UTC');

$timeStamp=date("y-m-d H:i:s");
$var_lang=$_POST["lang"];
$var_lat=$_POST["lat"];
$var_macAddr=$_POST["macAddr"];
$var_accuracy=$_POST["accuracy"];



 

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




$conn->close();

?>
