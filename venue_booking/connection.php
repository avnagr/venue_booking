<?php
$servername = "localhost";
$user = "root";
$password = "";
$database = "venue_booking";
$conn = mysqli_connect($servername,$user,$password,$database);
if($conn)
 {
	//echo "successfully connected";
 }
 else
 {
	 echo "not connected";
 }
?>