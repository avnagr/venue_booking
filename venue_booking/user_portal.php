<?php
include('connection.php');
include('framework_user.html');
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="css/profile_rev.css">
</head>
<body>
<div class="w3ls-banner"><br><br>
<center><h2><font color="white">hello
<?php

$user_email=$_SESSION['email'];
$user_id=$_SESSION['userid'];
 $date = date("Y-m-d");

$fudet_query = $conn->query("select user_name from user where email='$user_email' ") ;  
              $fudet_res = $fudet_query->fetch_array(MYSQLI_BOTH);
												echo $fudet_res['user_name'].'&nbsp; and welcome to our website..
</font></h2></center><br>';


$query=$conn->query("select * from booking where user_id='$user_id ' and date<'$date' and status='0' and review_status='0' ");
 if($query->num_rows != 0)
{
while($result=$query->fetch_array(MYSQLI_BOTH))
{    $hall_ids=$result['hall_id'];
    $hall_name = $conn->query("select hall_name,hall_city,hall_image,landmark from wedding_hall where hall_id= 
	  '$hall_ids' ") ;  
              $hall_res = $hall_name->fetch_array(MYSQLI_BOTH);
											

  echo '<div class="review">';
  echo '<div class="wed_name"><h3><center>Review for : '.$hall_res['hall_name'].' '.$hall_res['landmark']
  .' , '.$hall_res['hall_city'].'</center></h3></div>';
     echo "<img src='images/post_media/".$hall_res['hall_image']."' width='460px' height='260px' border='2px' 'solid' '#ddd' >";	
				echo'<form action="user_portal.php" method="post" enctype="multipart/form-data">';
					echo'<div class="rev-box">';
					echo'<font color="black"><textarea rows="8" cols="20" name="review"   value=""></textarea></font>';
					echo'<br><input type="submit" value="Submit" name="submit">';
					echo'</form></div>';
  echo '<div class="slid"><marquee behavior="scroll" direction="left"><h3>Please Review our wedding Hall for better service.
  Your Feedback is very useful for us....</marquee></h4></div>';
     
 
 echo '</form></div>';
 if(isset($_POST['submit']))
	{
		$review= $_POST['review'];
		$query=$conn->query("insert into review(user_id,hall_id,review)values('$user_id'
		,'$hall_ids','$review') ");
		
		$query1=$conn->query("update booking set review_status='1' where user_id='$user_id ' and hall_id='$hall_ids'");
		
	if($query && $query1)
      echo "<center><h4>congratulation.... Thanks for the reviw<br><br><br><br><br><br><br><br></center>";
	 else
	echo"sorry! not done!";	 

	}
		
		
 echo '<br><br>';

 
}
}
?>


</div>
</body>
</html>