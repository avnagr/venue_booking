<?php
include('connection.php');
include('framework_user.html');
session_start();
?>

<?php
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

if(isset($_POST['create_profile']))
{	
$user_name=$_POST['user_name'];	
	$gender=$_POST['gender'];	
$mobile_no=$_POST['mobile_no'];	
$dob=$_POST['dob'];
$profession=$_POST['profession'];
$street_address=$_POST['street_address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip_code=$_POST['zip_code'];			
		
		
		
		
		###################PHP CODE FOR UPLOAD IMAGE ###############################
		$file_name = $_FILES['IMG-1']['name'];
		$file_type = $_FILES['IMG-1']['type'];
		$file_size = $_FILES['IMG-1']['size'];
		$file_tem_loc =$_FILES['IMG-1']['tmp_name'];
		$file_store="images/post_media/".$file_name;
		move_uploaded_file($file_tem_loc,$file_store);	
		
		
$update= $conn->query("update user set user_name = '$user_name',gender='$gender',street_address='$street_address', city='$city', state='$state', zip_code='$zip_code',dob='$dob',
 profession='$profession',mobile_no= '$mobile_no',profile_url='$file_name' where email='$user_from' "); 



if($update)
	{
   echo "<center><font color='black'>Records updated successfully in Database.....</font></center>";
	}
	 else
	{
      echo "</br>ERROR: Could not able to execute";
	}

	
}	

echo'<br>';
echo'<div class="container1">';
echo'<div class="heading">';
echo'<p><h3>Please fill out the application form carefully</h3></p>';
			echo'</div>';
			echo'<div class="agile-form">';
				echo'<form action="user_profile.php" method="POST"  enctype="multipart/form-data">';
					echo'<ul class="field-list">';
						echo'<li>';
							echo'<label class="form-label">'; 
								echo'Full Name'; 
								echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
							?>
								<input type="text" name="user_name" placeholder="Full Name" "required" value= "<?php 
								echo $user_query_res["user_name"] ?>" >
								
								<?php
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
														<input class="date" id="datepicker" name='dob' type="text" value="<?php echo $user_query_res['dob'] ?>  "  required=>
														</div>
														</li>
						
						
						<?php
						
						
						echo'<li>';
							echo'<label class="form-label">';
							   echo'Gender';
							  echo' <span class="form-required">* </span>';
							echo'</label>';
							echo'<div class="form-input"><font color="black">';

								echo'<select class="form-dropdown" name="gender" "required"   value=' .$user_query_res["gender"].'>';
									//echo'<input type="dropdown" value='.$user_query_res["gender"].'>';
									echo'<option value="">&nbsp;</option>';
									
									echo'<option value="Male"> Male </option>';
									echo'<option value="Female"> Female </option>';
									
								echo'</select>';
							echo'</div>';
							echo'</font>';
						echo'</li>';
						echo'<li>';
							echo'<label class="form-label">'; 
								echo'Profession';
								echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">'; 
							?>
								<input type="text" name="profession"  required  value= " <?php echo $user_query_res["profession"]?>"  />
								<?php
							echo'</div>';
						echo'</li>';
						
						echo'<li> ';
							echo'<label class="form-label">';
							   echo'Mobile Number';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
								echo'<input type="text" name="mobile_no" placeholder="Mobile number" required   value='.$user_query_res["mobile_no"].'>';
							echo'</div>';
						echo'</li>';
						  echo'<li><br>';
				         echo'<label class="form-label">';
						 echo'Profile image';
						 echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
							echo'<input type="file"  name="IMG-1" value="">';
							echo'</div>';
						 echo'</li>';
						echo'<li> ';
							echo'<label class="form-label">';
							   echo'Address';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input add">';
								echo'<span class="form-sub-label">';
								?>
								<input type="text" name="street_address" placeholder=" " required    value= "<?php echo $user_query_res["street_address"]?>">
								
									<?php
									echo'<label class="form-sub-label1"> Street Address </label>';
								echo'</span>';
							    
								echo'<span class="form-sub-label">';
							
								
									echo '<input type="text" name="city" placeholder=" " required  value= '.$user_query_res["city"].'   >';
									echo '<label class="form-sub-label1"> City </label>';
								echo '</span>';
								
								echo'<br>';
								echo'<span class="form-sub-label">';
								 ?>
									<input type="text" name="state" placeholder=" " required  value=
									"<?php echo $user_query_res["state"] ?> " > 
									<?php
									echo'<label class="form-sub-label1"> State / Province </label>';
								echo'</span>';
								echo'&nbsp';
								echo'<span class="form-sub-label">';
									echo'<input type="text" name="zip_code" placeholder=" " required  value='.$user_query_res["zip_code"].'>';
									echo'<label class="form-sub-label1"> Postal / Zip Code </label>';
								echo'</span>';
							
							echo'</div>';
						echo'</li>';
					
						
					
					echo'</ul><br>';
					?>
					<input type="submit" value="create profile" name="create_profile"><br><br>
					
					<?php
				echo'</form>';	
			echo'</div>';
		echo'</div>';
		
	echo'</div>';
	
echo'</body>';

echo'</html>';



?>

<!-- #################################### PHP CODE ######################### -->

