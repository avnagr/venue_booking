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
			  

if($rp_num==0)
{
 echo'<h3> <br><center><font color="black">welcome! &nbsp'.$fudet_res['user_name'].' &nbsp please set your profile by clicing on profile option,make sure all information is correct, Our admin will check and verify sortly.</br></font></center>';
}
if($rp_num==1)
{
 echo'<h3> <br><center><font color="black">&nbspPlease wait &nbsp'.$fudet_res['user_name'].' for admin verification of all information after that only you can set your hall information</br></font></center>';
}
if($rp_num==2)
{
	
	
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
								echo'<font color="black"><textarea rows="3" cols="15" name="hall_description" ></textarea></font>';
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
								echo'<input type="text" name="landmark" value='.$info['landmark'].' required >';
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
								echo'<input type="text" name="caterer" value= 
									'.$info['caterer'].' required >';
							echo'</div>';
						echo'</li>';
						echo'<li> <br>';
							echo'<label class="form-label">';
							   echo'Decoration';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
								echo'<input type="text" name="decoration" value= 
									'.$info['decoration'].' required >';
							echo'</div>';
						echo'</li>';
						echo'<li> <br>';
							echo'<label class="form-label">';
							   echo'A/C service';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
								echo'<input type="text" name="service" value= 
									'.$info['ac_service'].' required >';
							echo'</div>';
						echo'</li>';
						echo'<li> <br>';
							echo'<label class="form-label">';
							   echo'Menu Type';
							   echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
								echo'<input type="text" name="menu_type" value= 
									'.$info['menu_type'].' required >';
							echo'</div>';
						echo'</li><br>';
						 echo'<li>';
				         echo'<label class="form-label">';
						 echo'Wedding Hall image';
						 echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
							echo'<input type="file"  name="IMG-1"  value= 
									'.$info['hall_image'].'> ';
							echo'</div>';
						 echo'</li>';
						/*
						echo'<li> ';
						echo'<label class="form-label">';
						
							   echo'Image Discription';
							  echo' <span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
							echo'<input type="text" name="id1" placeholder="" required value= "" >';
							echo'</div>';
							echo'</li>';
							
							echo'<li>';
				         echo'<label class="form-label">';
						 echo'Hall image';
						 echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input"><br>';
							echo'<input type="file"  name="IMG-2">';
							echo'</div>';
						 echo'</li>';
						  echo'<li> ';
						echo'<label class="form-label">';
							   echo'Image Discription';
							  echo' <span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
							echo'<input type="text" name="id2" placeholder="" required value= "" >';
							echo'</div>';
							echo'</li>';
						 
						 						 echo'<li>';
				         echo'<label class="form-label">';
						 echo'Hall image';
						 echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input"><br>';
							echo'<input type="file" name="IMG-3">';
							echo'</div>';
						 echo'</li>';
						  echo'<li> ';
						echo'<label class="form-label">';
							   echo'Image Discription';
							  echo' <span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
							echo'<input type="text" name="id3" placeholder="" required value= "" >';
							echo'</div>';
							echo'</li>';
						  						 echo'<li>';
				       /*  echo'<label class="form-label">';
						 echo'Hall image';
						 echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
							echo'<input type="file" name="IMG-4">';
							echo'</div>';
						 echo'</li>';
						  echo'<li> ';
						echo'<label class="form-label">';
							   echo'Image Discription';
							  echo' <span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
							echo'<input type="text" name="id4" placeholder="" required value= "" >';
							echo'</div>';
							echo'</li>';
							
				         echo'<label class="form-label">';
						 echo'Hall image';
						 echo'<span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
							echo'<input type="file" name="IMG-5">';
							echo'</div>';
						 echo'</li>';
						  echo'<li> ';
						echo'<label class="form-label">';
							   echo'Image Discription';
							  echo' <span class="form-required"> * </span>';
							echo'</label>';
							echo'<div class="form-input">';
							echo'<input type="text" name="id5" placeholder="" required value= "" >';
							echo'</div>';
							echo'</li>'; */
						echo'</ul>';
						echo'<input type="submit" value="Submit" name="Submit">';
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

//$id1=$_POST['id1'];  
  // $id2=$_POST['id2'];
   //$id3=$_POST['id3'];

	



	
/* #######################PHP CODE FOR FILE UPLOADING ################# */

		$file_name = $_FILES['IMG-1']['name'];
		$file_type = $_FILES['IMG-1']['type'];
		$file_size = $_FILES['IMG-1']['size'];
		$file_tem_loc =$_FILES['IMG-1']['tmp_name'];
		$file_store="images/post_media/".$file_name;
		move_uploaded_file($file_tem_loc,$file_store);
		/*
	
		$file_name2 = $_FILES['IMG-2']['name'];
		$file_type = $_FILES['IMG-2']['type'];
		$file_size = $_FILES['IMG-2']['size'];
		$file_tem_loc =$_FILES['IMG-2']['tmp_name'];
		$file_store="images/post_media/".$file_name2;
		move_uploaded_file($file_tem_loc,$file_store);
		
  		$file_name3 = $_FILES['IMG-3']['name'];
		$file_type = $_FILES['IMG-3']['type'];
		$file_size = $_FILES['IMG-3']['size'];
		$file_tem_loc =$_FILES['IMG-3']['tmp_name'];
		$file_store="images/post_media/".$file_name3;
		move_uploaded_file($file_tem_loc,$file_store);
		
		
	/*	$file_name4 = $_FILES['IMG-4']['name'];
		$file_type = $_FILES['IMG-4']['type'];
		$file_size = $_FILES['IMG-4']['size'];
		$file_tem_loc =$_FILES['IMG-4']['tmp_name'];
		$file_store="images/post_media/".$file_name4;
		move_uploaded_file($file_tem_loc,$file_store);
		
		
		$file_name5 = $_FILES['IMG-5']['name'];
		$file_type = $_FILES['IMG-5']['type'];
		$file_size = $_FILES['IMG-5']['size'];
		$file_tem_loc =$_FILES['IMG-5']['tmp_name'];
		$file_store="images/post_media/".$file_name5;
		move_uploaded_file($file_tem_loc,$file_store); */
		
		
		
      /* $POST1=$conn->query("insert into hall_images(hall_id,media_url,image_description)values('$hall_id','$file_name1','$id1') ");
         $POST2=$conn->query("insert into hall_images(hall_id,media_url,image_description)values('$hall_id','$file_name2','$id2') ");
		  $POST3=$conn->query("insert into hall_images(hall_id,media_url,image_description)values('$hall_id','$file_name3','$id3') ");
		 /*  $POST4=$conn->query("insert into hall_images(hall_id,media_url,image_description)values('$hall_id','$file_name4','$id4') ");
		  $POST5=$conn->query("insert into hall_images(hall_id,media_url,image_description)values('$hall_id','$file_name5','$id5') "); */
		 
		/* if($POST1 && $POST2 && $POST3)
			 ECHO "yes image dome";
		 else 
			 echo "image not dome";  


				
		
	
		
		
		
		
  /* ########### Query for inserting data in Table ############### */
  
 $update=$conn->query( "update wedding_hall set hall_rent= '$RPD', no_of_seat='$nos', no_of_rooms= '$nor',hall_discription='$hd', hall_street_address='$hsa',hall_city='$hall_city',landmark='$landmark',menu_type='$menu_type',decoration='$decoration',hall_name='$hall_name'
 ,caterer='$caterer',ac_service='$service',hall_image='$file_name' where hall_id='$hall_id' ");

// $post=$conn->query("insert into hall_images(hall_id,media_url,image_description)values('$hall_id','$file_name','$id1') ");
	if($update)
	{
   echo '<center><font color="black"><a href="images_upload.php?hall_id='.$hall_id. ' ">Records updated successfully in Database... </font></center>';
    echo'<a href="image_upload.php?hall_id='.$hall_id. ' "><input type="submit"  value="Upload more images" name="upload">';
	}
	 else
	{
      echo "</br>ERROR: Could not able to execute";
	}
 
 
 
}

						
						
						
						


}

?>

	
</div>
</body>
</html>