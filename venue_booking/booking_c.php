<?php
include('connection.php');
include('framework_user.html');
SESSION_START();
?>
<html>
<head>
<link rel="stylesheet" href="css/search.css">
<link rel="stylesheet" href="css/admin.css">

</head>
<body>
<div class="w3ls-banner">
<?php
echo'<font color="white">';
$user_from=$_SESSION['email'];
$user_ids=$_SESSION['userid'];
												
$query = $conn->query("select * from booking where user_id = '$user_ids' order by date asc ");
$total= mysqli_num_rows($query); 

if($total==0)
{
	echo "NO booking yet";
}
else
{	
	




	
	  echo'</form>';
while( $results = $query->fetch_array(MYSQLI_BOTH))
	
{   
  
  


  echo $results['date'];
      $bid= $results['booking_id'];
	 // echo $bid;
       $pay=$conn->query("select * from payment where booking_id= '$bid'");
       $payment=$pay->fetch_array(MYSQLI_BOTH);
       //echo $payment['hall_id'];
	   //echo $payment['transaction_id'];
	   echo $payment['bank_name'];
	    $hall_id= $payment['hall_id'];
       $user_info=$conn->query("select * from wedding_hall where hall_id='$hall_id' ");
       $user_res=$user_info->fetch_array(MYSQLI_BOTH);
	  // echo $user_res['hall_name'];
	   echo $user_res['hall_street_address'];
	   echo $user_res['hall_city'];
	   $owner_info=$conn->query("select * from hall_owner where hall_id='$hall_id' ");
       $owner_res=$owner_info->fetch_array(MYSQLI_BOTH);
	   echo $owner_res['user_name'];
	    echo $owner_res['mobile_no'];
?>		
		   
<div class="contain">	
</div>
	
<?php	
	echo'<br>';
	
	
	
}
	
	
	
}
//echo $rp_num;


?>

</div>
</body>
</html>