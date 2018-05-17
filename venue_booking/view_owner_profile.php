<?php
include('connection.php');
include('framework_admin.html');
session_start();
?>


<?php
$owner_id=$_GET['owner_id'];
$user_query = $conn->query("select * from hall_owner where owner_id = '$owner_id'");
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
					
		
	
					
			
					
			echo'</div>';
		echo'</div>';
		
	echo'</div>';
	
echo'</body>';

echo'</html>';

		?>			