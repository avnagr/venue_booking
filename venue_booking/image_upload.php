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
		
		
	echo'<br>';
	
	echo'<div class="container2">';
echo'<div class="heading">';
 echo'<h3> <br><center><font color="">'.$fudet_res['user_name'].'Please upload more images of your wedding hall .....</br><br></font></center>';
       echo'</div>';
 	echo'<div class="agile-form">';
				echo'<form action="image_upload.php" method="post" enctype="multipart/form-data">';
					echo'<ul class="field-list">';
		
			   
								?>
					      
                                <li>
				         <label class="form-label">
						 Wedding Hall image
						 <span class="form-required"> * </span>
							</label>
							<div class="form-input">
							<input type="file"  name="IMG-1"  value="">
							</div>
						 </li>
						
						<li> 
						<label class="form-label">
						 Image Discription
							 <span class="form-required"> * </span>
						     </label>
							<div class="form-input">
							<input type="text" name="id1" placeholder="" required value= "" >
							</div>
							</li>
							
						    <li>
				         <label class="form-label">
						 Wedding Hall image
						 <span class="form-required"> * </span>
							</label>
							<div class="form-input">
							<input type="file"  name="IMG-2"  value="">
							</div>
						 </li>
						
						<li> 
						<label class="form-label">
						 Image Discription
							 <span class="form-required"> * </span>
						     </label>
							<div class="form-input">
							<input type="text" name="id2" placeholder="" required value= "" >
							</div>
							</li>		
							 <li>
				         <label class="form-label">
						 Wedding Hall image
						 <span class="form-required"> * </span>
							</label>
							<div class="form-input">
							<input type="file"  name="IMG-3"  value="">
							</div>
						 </li>
						
						<li> 
						<label class="form-label">
						 Image Discription
							 <span class="form-required"> * </span>
						     </label>
							<div class="form-input">
							<input type="text" name="id3" placeholder="" required value= "" >
							</div>
							</li>		
							 <li>
				         <label class="form-label">
						 Wedding Hall image
						 <span class="form-required"> * </span>
							</label>
							<div class="form-input">
							<input type="file"  name="IMG-4"  value="">
							</div>
						 </li>
						
						<li> 
						<label class="form-label">
						 Image Discription
							 <span class="form-required"> * </span>
						     </label>
							<div class="form-input">
							<input type="text" name="id4" placeholder="" required value= "" >
							</div>
							</li>		
						  
						  
						 
						</ul>
						<input type="submit" value="Submit" name="Submit">
						</form>
		</div>
 
 <?php
 
 if(isset($_POST['Submit']))
{	

$id1=$_POST['id1'];  
$id2=$_POST['id2'];
$id3=$_POST['id3'];
$id4=$_POST['id4'];


	



	
/* #######################PHP CODE FOR FILE UPLOADING ################# */

		$file_name = $_FILES['IMG-1']['name'];
		$file_type = $_FILES['IMG-1']['type'];
		$file_size = $_FILES['IMG-1']['size'];
		$file_tem_loc =$_FILES['IMG-1']['tmp_name'];
		$file_store="images/post_media/".$file_name;
		move_uploaded_file($file_tem_loc,$file_store);
		
	
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
		
		
		$file_name4 = $_FILES['IMG-4']['name'];
		$file_type = $_FILES['IMG-4']['type'];
		$file_size = $_FILES['IMG-4']['size'];
		$file_tem_loc =$_FILES['IMG-4']['tmp_name'];
		$file_store="images/post_media/".$file_name4;
		move_uploaded_file($file_tem_loc,$file_store);
		
		
		/*$file_name5 = $_FILES['IMG-5']['name'];
		$file_type = $_FILES['IMG-5']['type'];
		$file_size = $_FILES['IMG-5']['size'];
		$file_tem_loc =$_FILES['IMG-5']['tmp_name'];
		$file_store="images/post_media/".$file_name5;
		move_uploaded_file($file_tem_loc,$file_store); */
		
		
		$query = $conn->query("select * from hall_images where hall_id='$hall_id' ") ;  
        $total= mysqli_num_rows($query); 
		
		if($total>3)
		{   
	        
			$update = $conn->query("delete from hall_images where hall_id = '$hall_id' ");
      
		if($update)
			 echo "yes!";
		 else 
			 echo "no";  

		}
			
			
		
		
		
		
       $POST1=$conn->query("insert into hall_images(hall_id,media_url,image_description)values('$hall_id','$file_name','$id1') ");
         $POST2=$conn->query("insert into hall_images(hall_id,media_url,image_description)values('$hall_id','$file_name2','$id2') ");
		  $POST3=$conn->query("insert into hall_images(hall_id,media_url,image_description)values('$hall_id','$file_name3','$id3') ");
		   $POST4=$conn->query("insert into hall_images(hall_id,media_url,image_description)values('$hall_id','$file_name4','$id4') ");
		   
		   $update_status=$conn->query("update wedding_hall set status='3' where hall_id='$hall_id' ");
		 
		if($POST1 && $POST2 && $POST3 && $POST4 && $update_status)
			 ECHO "Image uploaded sucessfully...";
		 else 
			 echo "image not done..."; 
		}		 

						

?>

	
</div>
</body>
</html>