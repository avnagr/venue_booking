<?php
include('connection.php');
include('framework_hall_owner.html');
session_start();
?>

<html>
<head>
<link rel="stylesheet" href="css/profile.css">

</head>
<body >
<div class="w3ls-banner">
<?php

$user_from=$_SESSION['email'];
$user_query = $conn->query("select verification_status from hall_owner where email = '$user_from'");
$user = $user_query->fetch_array(MYSQLI_BOTH);
$rp_num= $user['verification_status'];

$fudet_query = $conn->query("select user_name from hall_owner where email='$user_from' ") ;  
              $fudet_res = $fudet_query->fetch_array(MYSQLI_BOTH);
			  


	
	
	 $user_query = $conn->query("select hall_id from hall_owner where email = '$user_from'");
        //$user_query_res=mysqli_num_rows($user_query);
		$user_query_res = $user_query->fetch_array(MYSQLI_BOTH);
    $hall_id=$user_query_res['hall_id'];
	//echo $hall_id;
	
   
	############################php code for showing for editing#####################
	 $query = $conn->query("select * from wedding_hall where hall_id = '$hall_id' ");
		$info = $query->fetch_array(MYSQLI_BOTH);
		
		
	echo'<br>';
	
	echo'<div class="container2">';
echo'<div class="heading">';
 echo'<h3> <br><center><font color="">&nbsp Congratulations! &nbsp !'.$fudet_res['user_name'].'  now you can set your hall details...</br></font></center>';
       echo'</div>';
 	echo'<div class="agile-form">';
				echo'<form action="hall_details.php" method="post" enctype="multipart/form-data">';
					echo'<ul class="field-list">';
		
			     echo'<li>';
				echo'<label class="form-label1">';
								echo'Hall description';
								echo'<span class="form-required"> * <font color="black"></span>';
							echo'</label>';
							echo'<div class="form-input2">';
							?>
								<font color="black"><textarea rows="3" cols="15" name="hall_description"   value="<?php echo $info['hall_discription'] ?>"></textarea></font>
								<?php
								echo '</font>';
								?>
						<li>
							<label class="form-label">
							 wedding Hall name
							   <span class="form-required"> * <font color="black"></span>
							</label>
							<div class="form-input">
						
						
								<input type="text" name="hall_name"  "required" value= "<?php echo $info['hall_name']  ?> " >
								
								</font>
							</div>
						</li>
						
						<li>
						<label class="form-label">
							   Wedding Hall address
							  <span class="form-required"> *</span>
							</label>
						
							<div class="form-input add">
								<span class="form-sub-label"><font color="black">
									<input type="text" name="hall_street_address"  required  value= 
									"<?php echo $info['hall_street_address']  ?> " ></font>
									<label class="form-sub-label1"> Hall street Address </label>
								</span>
							
								
								<span class="form-sub-label"><font color="black">
									<input type="text" name="hall_city"  required  value= 
									"<?php echo $info['hall_city']  ?> " ></font>
									<label class="form-sub-label1"> City </label>
								</span>
							
							
								
								
							</div>
							
                          
							<?php
							echo'<li>';
							echo'<label class="form-label">';
							   echo'Landmark';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">'; 
							?>
							<input type="text" name="landmark" value="<?php echo $info['landmark']?>" required >
								<?php
							echo'</div>';
						echo'</li>';
							echo'</div>';
						 echo'</li>';
						echo'<li>';
							echo'<label class="form-label">';
							 echo ' Hall rent information';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input add">';
								echo'<span class="form-sub-label">';
								echo'<font color="black">';
							echo'<input type="number" name="RPD"  "required"  value= '.$info['hall_rent'].' >';
							echo'</font>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;';
                             echo'<label class="form-sub-label1"> Rent Per Day </label>';
							   echo'</span>';
							echo'<span class="form-sub-label">';
								echo'<font color="black">';
									echo'<input type="number" name="nor" placeholder="" "required"  value= '.$info['no_of_rooms'].' >';
									echo'</font>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';

									echo'<label class="form-sub-label1"> Number of Rooms </label>';
								echo'</span>';
								
								echo'<span class="form-sub-label">';
								echo'<font color="black">';
									echo'<input type="number" name="nos" placeholder=" " required  value= 
									'.$info['no_of_seat'].' >'; 
									echo'</font>';
									echo'<label class="form-sub-label1"> Number of Seats </label>';
								echo'</span>';
							
							
							echo'</div>';
						echo'</li>';
						echo'<br>';
						echo'<li> <br>';
							echo'<label class="form-label">';
							   echo'Caterer';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
							?>
							<input type="text" name="caterer" 
							value=" <?php echo $info['caterer'] ?>" required >
									<?php
							echo'</div>';
						echo'</li>';
						echo'<li> <br>';
							echo'<label class="form-label">';
							   echo'Decoration';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
							?>
								 <input type="text" name="decoration" value= 
									"<?php echo $info['decoration'] ?>" required >
									<?php
							echo'</div>';
						echo'</li>';
						echo'<li> <br>';
							echo'<label class="form-label">';
							   echo'A/C service';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
							?>
								<input type="text" name="service" value= 
								" <?php echo $info['ac_service'] ?> " required >
									<?php
							echo'</div>';
						echo'</li>';
						echo'<li> <br>';
							echo'<label class="form-label">';
							   echo'Menu Type';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
						  ?>		
						  <input type="text" name="menu_type" value= 
									"<?php echo $info['menu_type'] ?>" required >
									<?php
							echo'</div>';
						echo'</li><br>';
						echo'<li>';
							echo'<label class="form-label">';
							   echo'Google Map location';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
							?>
								 <input type="text" name="google_map" value= 
								"" required >
									<?php
							echo'</div>';
						echo'</li>';
						 echo'<li><br>';
				         echo'<label class="form-label">';
						 echo'Wedding Hall image';
						 echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
							echo'<input type="file"  name="IMG-1"  value= 
									'.$info['hall_image'].'> ';
							echo'</div>';
						 echo'</li>';
						
						echo'</ul>';
						echo'<br><input type="submit" value="Submit" name="Submit">';
						echo'</form>';
			echo '</div>';
 
 
 
 if(isset($_POST['Submit']))
{	

$hd=$_POST['hall_description'];
$service= $_POST['service'];
$caterer = $_POST['caterer'];
$landmark = $_POST['landmark'];
$decoration=$_POST['decoration'];
$menu_type=$_POST['menu_type'];
$RPD = $_POST['RPD'];	
$nos= $_POST['nos'];	
$nor= $_POST['nor'];
$hsa=$_POST['hall_street_address'];
$hall_city= $_POST['hall_city'];
$hall_name=$_POST['hall_name'];
$google_map=$_POST['google_map'];
//$id1=$_POST['id1'];  
  // $id2=$_POST['id2'];
   //$id3=$_POST['id3'];

 $date = date("Y-m-d");



	
/* #######################PHP CODE FOR FILE UPLOADING ################# */

		$file_name = $_FILES['IMG-1']['name'];
		$file_type = $_FILES['IMG-1']['type'];
		$file_size = $_FILES['IMG-1']['size'];
		$file_tem_loc =$_FILES['IMG-1']['tmp_name'];
		$file_store="images/post_media/".$file_name;
		move_uploaded_file($file_tem_loc,$file_store);
	
	



				
		
	
		
		
		
		
  /* ########### Query for inserting data in Table ############### */
  

  
 $update=$conn->query( "update wedding_hall set hall_rent= '$RPD', no_of_seat='$nos', no_of_rooms= '$nor',hall_discription='$hd', hall_street_address='$hsa',hall_city='$hall_city',landmark='$landmark',menu_type='$menu_type',decoration='$decoration',hall_name='$hall_name'
 ,caterer='$caterer',ac_service='$service',hall_image='$file_name',date='$date',google_map='$google_map' where hall_id='$hall_id' ");

// $post=$conn->query("insert into hall_images(hall_id,media_url,image_description)values('$hall_id','$file_name','$id1') ");
	if($update)
	{
   echo '<center><font color="black"><a href="images_upload.php?hall_id='.$hall_id. ' ">Records updated successfully in Database... </font></center>';
    echo'<a href="image_upload.php?hall_id='.$hall_id. ' "><input type="submit"  value="Upload more images" name="upload">';
	echo '<br>';
	}
	 else
	{
      echo "</br>ERROR: Could not able to execute";
	}
 
 
 
}

						
						
						
						




?>

	
</div>
</body>
</html>