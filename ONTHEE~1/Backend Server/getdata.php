<?php
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
include("db.php");
$time_start = microtime_float();
//update the current table
$cd=date("y-m-d H:i:s");
$newdate=strtotime($cd)-5;
$updatedTime=date('y-m-d H:i:s',$newdate);
// 
$sqlDelete="delete from current where timestamp<='$updatedTime'";
$conn->query($sqlDelete);



$result = $conn->query( "SELECT * FROM current  ");
  
 $data = array(); 
//Fetch into associative array
 $num=$result->num_rows;  
 while ( $row = $result->fetch_assoc())  {
 	$dbdata = array();
 //	echo $row["name"]."<br/>";
  $dbdata['LAT']=$row['lat'];
  $dbdata['LANG']=$row['lang'];
  array_push($data,$dbdata);
    }

 
//Print array in JSON
  echo json_encode($data);

$time_end = microtime_float();
$time = $time_end - $time_start;
//postprocessing
  $sqltime="insert into virtualPostprocessing (timestamp,duration,points) values('$cd','$time','$num')";
   $conn->query($sqltime);
mysqli_close($conn);
?>