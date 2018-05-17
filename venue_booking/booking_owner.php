<?php
include('connection.php');
include('framework_hall_owner.html');
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="css/book.css">
<link rel="stylesheet" href="css/profile.css">
</head>
<body>
<div class="w3ls-banner">
<?php

$user_from=$_SESSION['email'];
$fudet_query = $conn->query("select hall_id from hall_owner where email='$user_from' ") ;  
              $fudet_res = $fudet_query->fetch_array(MYSQLI_BOTH);
			  $hall_id=  $fudet_res['hall_id'];
												
$query = $conn->query("select * from booking where hall_id= '$hall_id' order by date asc ");

$total= mysqli_num_rows($query); 

if($total==0)
{
	echo "NO booking yet";
	$date = date("Y-m-d");
	echo $date;
}
else
{	
?>
<br>
<table class="rwd-table">
  <tr>
    <th>Booking Date</th>
    <th>Transaction ID</th>
	<th>Bank Name</th>
	
	<th>Paid Money</th>
    <th>User Name</th>
	<th>Email ID</th>
    <th> Address</th>
	
	<th> Mobile Number</th>
	<th>Booking Status</th>
	 
  </tr>
 
 <br>

<?php
while( $final = $query->fetch_array(MYSQLI_BOTH))
{     
      $bid= $final['booking_id'];
	  if( $final['status']==0)
		  $status= 'BOOKED';
	  if($final['status']==1)
		  $status='CANCELED';
	  
	  //echo $bid;
       $pay=$conn->query("select * from payment where booking_id= '$bid'");
       $payment=$pay->fetch_array(MYSQLI_BOTH);
	   
       //echo $payment['user_id'];
	   //echo $payment['transaction_id'];
	   //echo $payment['bank_name'];
	    $user_id= $payment['user_id'];
       $user_info=$conn->query("select * from user where userid='$user_id' ");
       $user_res=$user_info->fetch_array(MYSQLI_BOTH);


     //echo "hello";
	//echo $user_res['user_name'];
	//echo $final['date'];
	echo'<br>';

echo'<tr>';
    echo'<td data-th="Movie Title">'. $final['date'].'</td>';
	echo'<td data-th="Movie Title">'.$payment['transaction_id'].'</td>';
	echo'<td data-th="Movie Title">'. $payment['bank_name'].'</td>';
	echo'<td data-th="Movie Title">'. $payment['paid_money'].'</td>';
	echo'<td data-th="Movie Title">'.$user_res['user_name'].'</td>';
	echo'<td data-th="Movie Title">'.$user_res['email'].'</td>';
	echo'<td data-th="Movie Title">'.$user_res['street_address'].'  , '. $user_res['city'].'</td>';
	echo'<td data-th="Movie Title">'.$user_res['mobile_no'].'</td>';
	//echo'<td> <a href="booking.php?email_id='.$bid. ' ">Cancel Booking</a></td>';
	echo'<td data-th="Movie Title">'.$status.'</td>';
	 echo'</tr>';
 
					
//echo $rp_num;
}
}

?>

</div>
</body>
</html>