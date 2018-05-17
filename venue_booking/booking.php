<?php
include('connection.php');
include('framework_user.html');
SESSION_START();
?>
<html>
<head>


  <link rel="stylesheet" href="css/book.css">
   <link rel="stylesheet" href="css/profile.css">
     <script  src="js/book.js"></script>

</head>
<body>
<div class="w3ls-banner">
<?php
echo'<font color="white">';
$user_from=$_SESSION['email'];
$user_ids=$_SESSION['userid'];
												
$query = $conn->query("select * from booking where user_id = '$user_ids' and status= '0' order by date desc  ");
$total= mysqli_num_rows($query); 

if($total==0)
{
	echo "NO booking yet";
}
else
{
echo'<br>';	
 $date = date("Y-m-d");
?>	
<table class="rwd-table">
  <tr>
    <th>Booking Date&nbsp;</th>
    <th>Transaction ID</th>
	
	<th>Total Payment</th>
    <th>Wedding Hall Name</th>
    <th> Wedding Hall Address</th>
	<th>Hall Owner Name</th>
	<th>Owner's Mobile Number</th>
	<th>&nbsp;Cancel Booking&nbsp;</th> 
  </tr>
  
  <tr>

<?php

while( $results = $query->fetch_array(MYSQLI_BOTH))
	
{   
  
  


 // echo $results['date'];
      $bid= $results['booking_id'];
	 // echo $bid;
       $pay=$conn->query("select * from payment where booking_id= '$bid' ");
       $payment=$pay->fetch_array(MYSQLI_BOTH);
       //echo $payment['hall_id'];
	 //  echo $payment['transaction_id'];
	  // echo $payment['bank_name'];
	    $hall_id= $payment['hall_id'];
       $user_info=$conn->query("select * from wedding_hall where hall_id='$hall_id' ");
       $user_res=$user_info->fetch_array(MYSQLI_BOTH);
	  // echo $user_res['hall_name'];
	  // echo $user_res['hall_street_address'];
	  // echo $user_res['hall_city'];
	   $owner_info=$conn->query("select * from hall_owner where hall_id='$hall_id' ");
       $owner_res=$owner_info->fetch_array(MYSQLI_BOTH);
	  // echo $owner_res['user_name'];
	   // echo $owner_res['mobile_no'];
	   
	    echo'<tr>';
    echo'<td data-th="Movie Title">'.$results["date"].'</td>';
	echo'<td data-th="Movie Title">'.$payment['transaction_id'].'</td>';
	//echo'<td data-th="Movie Title">'. $payment['bank_name'].'</td>';
	echo'<td data-th="Movie Title">'.$user_res['hall_rent'].' Rs/-</td>';
	echo'<td data-th="Movie Title">'.$user_res['hall_name'].'</td>';
	echo'<td data-th="Movie Title">'.$user_res['hall_street_address'].'  , '. $user_res['hall_city'].'</td>';
	echo'<td data-th="Movie Title">'.$owner_res['user_name'].'</td>';
	echo'<td data-th="Movie Title">'.$owner_res['mobile_no'].'</td>';
	//echo'<td> <a href="booking.php?email_id='.$bid. ' ">Cancel Booking</a></td>';
	if($results['date']<$date)
		echo'<td>--------</td>';
	else
	  echo'<td><a href="booking.php?booking_id='.$bid. ' "><input type="submit"  value="cancel Booking" name="cancel">';
					
					
				echo'</form>';
  echo'</tr>';
  
  echo'<tr>';
	   
	  
	echo'<br>';
	
	
	
}

############# cancel Booking #########
if(isset($_GET['booking_id']))
{
	
	
 $c_booking= $_GET['booking_id'];
 echo $c_booking;
 $sql=$conn->query("update booking set status= '1' where booking_id='$c_booking' ");
 if($sql)
	 echo "<center><h3>Your Booking has been canceled....</center></h3>";
  else
	  echo "not done";
  
 
}	
	
	
}
//echo $rp_num;


?>
<table>
</div>
</body>
</html>