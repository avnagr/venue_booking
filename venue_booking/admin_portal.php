<?php
include('framework_admin.html');
include('connection.php');
SESSION_START();

?>

<html>
<head>
<link rel="stylesheet" href="css/profile.css">
</head>
<body>

  <link rel="stylesheet" href="css/admin.css">
  
<div class="w3ls-banner">
<?php



$admin_email=$_SESSION['email_id'];


 echo'<h3> <br><center><font color="white">welcome Avnish Agrahari ! &nbsp please Verify these Hall owner and there wedding hall details..... </br></font></h3></center>';
 
 
 
 $query = $conn->query("select * from wedding_hall where status='4' ") ;  
        $total= mysqli_num_rows($query); 
		?>
		
  <table class="rwd-table">
  <tr>
    <th><h3>Owner Name</h3></th>
	<th><h3>Mobile Number</h3></th>
	
	<th><h3>Owner's Address</h3></th>
	<th><h3>Wedding Hall Name</h3></th>
    <th><h3>Wedding Hall Address</h3></th>
	<th><h3>Verification Request</h3></th> 
  </tr>
  

 
 
 <?php

 $query = $conn->query("select * from wedding_hall where status='4' order by date desc ") ;  
        $total= mysqli_num_rows($query); 
		while( $user_res= $query->fetch_array(MYSQLI_BOTH))
	
{   
  

       $hall_id= $user_res['hall_id'];
	   $date = date("Y-m-d");
	   
	  // echo $user_res['hall_name'];
	  // echo $user_res['hall_street_address'];
	  // echo $user_res['hall_city'];
	   $owner_info=$conn->query("select * from hall_owner where hall_id='$hall_id' ");
       $owner_res=$owner_info->fetch_array(MYSQLI_BOTH);
	    $owner_id= $owner_res['owner_id'];
	  // echo $owner_res['user_name'];
	   // echo $owner_res['mobile_no'];
	   
	    echo'<tr>';
    echo'<td data-th="Movie Title"><a href="view_owner_profile.php?owner_id='.$owner_id. ' ">'.$owner_res['user_name'].'</td>';
	echo'<td data-th="Movie Title">'.$owner_res['mobile_no'].'</td>';
	//echo'<td data-th="Movie Title">'. $payment['bank_name'].'</td>';
	//echo'<td data-th="Movie Title">'.$owner_res['email'].'</td>';
	echo'<td data-th="Movie Title">'.$owner_res['street_address'].'  , '. $owner_res['city'].'</td>';
	echo'<td data-th="Movie Title"><a href="view_hall.php?owner_id='.$hall_id. ' ">'.$user_res['hall_name'].'</td>';
	echo'<td data-th="Movie Title">'.$user_res['hall_street_address'].'  , '. $user_res['hall_city'].'</td>';
	//echo'<td> <a href="booking.php?email_id='.$bid. ' ">Cancel Booking</a></td>';
	echo'<td><a href="admin_portal.php?hall_id='.$hall_id. ' "><input type="submit"  value="Accept Request" name="accept">';
	echo'&nbsp;<a href="admin_portal.php?cancel='.$hall_id. ' "><input type="submit"  value="Reject Request"name="cancel"></td>';
					
					
					
	if(isset($_GET['hall_id'] ))
{
 $accept= $_GET['hall_id'];
 $sql=$conn->query("update wedding_hall set status='1',date='$date' where hall_id='$accept' "); 
}					

if(isset($_GET['cancel'] ))
{
 $cancel= $_GET['cancel'];
 $sql=$conn->query("update wedding_hall set status='2' where hall_id='$cancel' "); 
}	

					
				echo'</form>';
  echo'</tr>';
  
  echo'<tr>';
	   
	  

	
	
	
}
		
		
		

?>


</div>

</body>
</html>


