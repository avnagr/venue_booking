<?php
include('connection.php');
include('framework_user.html');
session_start();

$user_from= $_SESSION['email'];
$user_query = $conn->query("select * from user where email = '$user_from'");
        //$user_query_res=mysqli_num_rows($user_query);
		$user_query_res = $user_query->fetch_array(MYSQLI_BOTH);
		//$reg_user_query = $conn->query("select * from register where email = '$email' ");
       // $user_query_res=mysqli_num_rows($user_query);
$user_name=$user_query_res['user_name'];	
	
	$gender=$user_query_res['gender'];	
$mobile_no=$user_query_res['mobile_no'];	
$dob=$user_query_res['dob'];
$profession=$user_query_res['profession'];
$street_address=$user_query_res['street_address'];
$city=$user_query_res['city'];
$state=$user_query_res['state'];
$zip_code=$user_query_res['zip_code'];			

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
echo'<div class="container1">';
echo'<div class="heading">';
echo'<center>';
$file_name = $user_query_res['profile_url'];
 echo "<img src='images/post_media/".$file_name."' width='180px' height='200px' >";	
echo'</center>';
echo '<p><h3>'.$user_name.'&nbsp profile  </h3></p>';
			echo'</div>';
			
				
					echo'<ul class="field-list">';
						echo'<li>';
							echo'<label class="form-label">'; 
								echo'Full Name'; 
								echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
                             echo  $user_query_res["user_name"];
								
								
							echo'</div>';
						echo'</li>';
						 ?>
						
						<link rel="stylesheet" href="css/jquery.css" />
						 <script src="js/jquery.js"></script>
			   <script>
				 $(function() {
				 $( "#datepicker,#datepicker1" ).datepicker();
				 });
			</script>
			
			<li>  
						     <label class="form-label">
							 Date of Birth
							   <span class="form-required"> * </span>
							</label>
							<div class="form-input dob" >
													<?php echo $user_query_res['dob'] ?>  
														</div>
														</li>
						
						
						<?php
						
						
						echo'<li>';
							echo'<label class="form-label">';
							   echo'Gender';
							  echo' <span class="form-required">* </span>';
							echo'</label>';
							echo'<div class="form-input">';

								echo $user_query_res["gender"];
								
									
								
							echo'</div>';
							
						echo'</li>';
						echo'<li>';
							echo'<label class="form-label">'; 
								echo'Profession';
								echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
							echo $user_query_res["profession"];
							echo'</div>';
						echo'</li>';
						
						echo'<li> ';
							echo'<label class="form-label">';
							   echo'Mobile Number';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
								echo $user_query_res["mobile_no"];
							echo'</div>';
						echo'</li>';
						
						echo'<li> ';
							echo'<label class="form-label">';
							   echo' Street Address';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input add">';
								echo'<span class="form-sub-label">';
							    echo $user_query_res["street_address"];
								echo'</span>';
									echo'</li> ';
							
							
 							echo'<li> ';
							echo'<label class="form-label">';
							   echo'  City';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input add">';
							echo'<span class="form-sub-label">';
						        echo $user_query_res["city"];
							echo'</span>';
								
								echo'</li> ';
								
								
								
 							echo'<li> ';
							echo'<label class="form-label">';
							   echo'  State';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input add">';
							echo'<span class="form-sub-label">';
								echo'<span class="form-sub-label">';
								
								echo $user_query_res["state"];
								
								echo'</span></div>';
								echo'</li>';
					
								 echo '</li>';
									echo'<li> ';
							echo'<label class="form-label">';
							   echo'  zip code';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input add">';
								echo'<span class="form-sub-label">';
									echo $user_query_res["zip_code"];
								echo'</span>';
							
							echo'</div>';
						echo'</li>';
					
						
					
					echo'</ul>';
				
				echo'</form>';	
			echo'</div>';
		echo'</div>';
		
	echo'</div>';
	
echo'</body>';

echo'</html>';



?>

<!-- #################################### PHP CODE ######################### -->

