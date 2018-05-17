<?php
include('connection.php');
?>
<html>
<head>

</head>
<body >	  


	  <form  action="new.php" method="post" enctype="multipart/form-data">
	     <center>  
	   
			<input type="file" div id="file"  name="IMG" />
				<input type="file" div id="file"  name="IMG-2" />
				<input type="file" div id="file"  name="IMG-3" />
				
            <input type="submit" name="submit" div id="up" value="submit" class="sub_btn">
			</center>
			</form>
			
<?php
echo 'hello';
if(isset($_POST['submit']))
{
	
	$file_name = $_FILES['IMG']['name'];
		$file_type = $_FILES['IMG']['type'];
		$file_size = $_FILES['IMG']['size'];
		$file_tem_loc =$_FILES['IMG']['tmp_name'];
  		$file_store="images/post_media/".$file_name;
		move_uploaded_file($file_tem_loc,$file_store);
		
		
		
		$file_name1 = $_FILES['IMG-2']['name'];
		$file_type = $_FILES['IMG-2']['type'];
		$file_size = $_FILES['IMG-2']['size'];
		$file_tem_loc =$_FILES['IMG-2']['tmp_name'];
  		$file_store="images/post_media/".$file_name1;
		move_uploaded_file($file_tem_loc,$file_store);
		
		$file_name2 = $_FILES['IMG-3']['name'];
		$file_type = $_FILES['IMG-3']['type'];
		$file_size = $_FILES['IMG-3']['size'];
		$file_tem_loc =$_FILES['IMG-3']['tmp_name'];
  		$file_store="images/post_media/".$file_name2;
		move_uploaded_file($file_tem_loc,$file_store);
		
		echo "yes";
		$new=$conn->query("insert into hall_images(hall_id,media_url)values('VB122HI','$file_name') ");
$new1=$conn->query("insert into hall_images(hall_id,media_url)values('VB122HI','$file_name1') ");
$new2=$conn->query("insert into hall_images(hall_id,media_url)values('VB122HI','$file_name2') ");


if($new && $new1 && $new)
	echo'yea done!';
else
	echo 'not done!';


}	
?>			
</body>
</html>