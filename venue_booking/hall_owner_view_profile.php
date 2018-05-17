<?php
include('connection.php');
include('framework_hall_owner.html');
session_start();
?>


<?php
$user_from= $_SESSION['email'];
$user_query = $conn->query("select * from hall_owner where email = '$user_from'");
        //$user_query_res=mysqli_num_rows($user_query);
		$user_query_res = $user_query->fetch_array(MYSQLI_BOTH);
		
       // $user_query_res=mysqli_num_rows($user_query);
    $user_name=$user_query_res['user_name'];	
	$hall_name= $user_query_res['hall_name'];
	
	$gender=$user_query_res['gender'];	
    $mobile_no=$user_query_res['mobile_no'];	
    $dob=$user_query_res['dob'];
    $street_address=$user_query_res['street_address'];
    $city=$user_query_res['city'];
    $state=$user_query_res['state'];
    $zip_code=$user_query_res['zip_code'];
	$dob=$user_query_res['dob'];
	$email=$user_query_res['email'];
	$hall_id=$user_query_res['hall_id'];
	
	
	
	
	$user_query = $conn->query("select * from wedding_hall where hall_id= '$hall_id'");
        //$user_query_res=mysqli_num_rows($user_query);
		$user_query= $user_query->fetch_array(MYSQLI_BOTH);
		
		$hall_name=$user_query['hall_name'];
		$hsa=$user_query['hall_street_address'];
		$hc=$user_query['hall_city'];
		$status=$user_query['status'];
		
		
?>
		
<?php		

echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo'<title>venue_booking</title>';
echo'<link rel="stylesheet" href="css/profile.css">';
	
echo'</head>';
echo'<body>';
echo'<div class="w3ls-banner">';



###################################PHP CODE #######################################


echo'<br>';
echo'<br>';

echo'<div class="container1">';
echo'<center>';
$file_name = $user_query_res['media_url'];
 echo "<img src='images/profile_pic/".$file_name."' width='180px' height='200px' >";	
echo'</center>';
echo'<div class="heading">';
echo'<p><h2>Hall owner profile details</h2></p>';
			echo'</div>';
			echo '<h4>';
			echo'<div class="agile-form">';
				echo'<form action="hall_owner_view_profile.php" method="POST"  enctype="multipart/form-data">';
					echo'<ul class="field-list">';
						echo'<li>';
							echo'<label class="form-label">'; 
								echo'<b>Full Name</b>'; 
								echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
							
							 echo $user_name ;
							
							
								
							
							echo'</div>';
						echo'</li>';
						echo'<li> ';
							echo'<label class="form-label">';
							   echo'<b>EmailID</b>';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
								echo $user_query_res["email"];
							echo'</div>';
						echo'</li>';
						
						echo'<li>';
						     echo'<label class="form-label">'; 
							 echo '<b>Date of Birth</b>';
							   echo '<span class="form-required"> * </span>';
							echo '</label>';
							echo'<div class="form-input dob" >';
								echo'<span class="form-sub-label"><font color="white">';
								echo $dob;	
							echo'</div>';
						echo'</li>';
						echo'<li>';
							echo'<label class="form-label">';
							   echo'<b>Gender</b>';
							  echo' <span class="form-required"><font color="white">* </span>';
							echo'</label>';
							echo'<div class="form-input">';
						
							echo $user_query_res["gender"];
							echo'</div>';
							
						echo'</li>';
		
						
						echo'<li> ';
							echo'<label class="form-label">';
							   echo'<b>Mobile Number</b>';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
								echo $user_query_res["mobile_no"];
							echo'</div>';
						echo'</li>';
						
						echo'<li> ';
							echo'<label class="form-label">';
							   echo'<b>Address</b>';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input add">';
								echo'<span class="form-sub-label">';
								
								 echo $user_query_res['street_address'];
								   
								?>
								
									</span>
							
								
								<span class="form-sub-label">
									 <?php echo $user_query_res["city"] ?> 
								
								</span>
								<br>
								<span class="form-sub-label">
									 <?php echo $user_query_res["state"] ?> 
									
								</span>
								<span class="form-sub-label">
									 <?php echo $user_query_res["zip_code"] ?> 
								
								</span>
							
							</div>
						</li>
						
						
						
						<?php
					     
						
						echo'<li>';
						     echo'<label class="form-label">'; 
							 echo '<b>Hall Name</b>';
							   echo '<span class="form-required"> * </span>';
							echo '</label>';
							echo'<div class="form-input dob" >';
								echo'<span class="form-sub-label"><font color="white">';
								echo $hall_name;	
							echo'</div>';
						echo'</li>';
					echo'<li>';
						     echo'<label class="form-label">'; 
							 echo '<b>Hall Address</b>';
							   echo '<span class="form-required"> * </span>';
							echo '</label>';
							echo'<div class="form-input dob" >';
								echo'<span class="form-sub-label"><font color="white">';
								echo $hsa.', '.$hc;	
							echo'</div>';
						echo'</li>';
					echo'</ul>';
					
		            if($status==0)
				     echo "<center><h3>Please Fill all details, then we will verify details</center></h3>";
                    if($status==3)
					{						
					//echo'<input type="submit" value="GO BACK" name="" a href="hall_owner_profile.php"><br><br>';
					echo'<br><input type="submit"  value="Send request for verification" 
					name="submit" <br><br>';
					if(isset($_POST['submit']))
	                {
                      $update_info=$conn->query(" update wedding_hall set status='4' where hall_id='$hall_id' ");
					  if($update_info)
						  echo "<center><h3>Your request has been send to admin</center></h3>";


	                }
					}
			echo'</div>';
		echo'</div>';
		echo'</form>';
	echo'</div>';

	
echo'</body>';

echo'</html>';

		?>			