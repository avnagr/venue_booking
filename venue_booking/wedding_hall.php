<?php
include('connection.php');
include('framework_user.html');
$hall_id= $_GET['hall_id'];
$wed_date= $_GET['date'];
session_start();
$user_id=$_SESSION['userid'];
$_SESSION['hall_id']=$hall_id;
$_SESSION['date']=$wed_date;



?>

<?php
$info=$conn->query("select * from wedding_hall where hall_id='$hall_id'  ");
 $hall_details=$info->fetch_array(MYSQLI_BOTH);

/*echo $result['hall_street_address'];
echo $result['hall_city'];
echo $result['landmark'];
echo $result['menu_type'];
echo $result['decoration'];
echo $result['caterer'];
echo $result['ac_service'];
echo $result['hall_rent'];
echo $result['no_of_seat'];
echo $result['no_of_rooms'];
echo $result['hall_discription'];
echo $result['hall_image'];  */

$hall_rent=$hall_details['hall_rent'];
$_SESSION['hall_rent']= $hall_rent;

$query=$conn->query("select * from hall_images where hall_id='$hall_id'  ");
 $total_book= mysqli_num_rows($query);
 $img = array();
 $desc=array();
 $i=0;
 if($query->num_rows > 0)
 {
while($row1 = $query->fetch_array(MYSQLI_BOTH))
{
	$img[$i]= $row1['media_url'];
	$desc[$i]=$row1['image_description'];
	$i=$i+1;
	if($i==4)
		break;
}
 }
 

 
##################owner info ##################
$rest=$conn->query("select * from hall_owner where hall_id='$hall_id'  ");
 $owner=$rest->fetch_array(MYSQLI_BOTH); 
 
 
 
 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta tags -->
	<title>venue_booking</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="css/slide.css" type="text/css" media="all" />
 
</head>
<body>
   
  <div class="w3ls1"><br>
	<div class="container3">
	
     <center><h1><font color="white">Welcome to <?php echo $hall_details['hall_name'].'!' ?></font></h1></center>
	<br>
<!--div class="hav">
<nav>
										<ul class="nav navbar-nav">
										
											<li class="active"><a href="hall_details">Hall  Details</a></li>
											<li><a href="#hall_information">Hall  Information</a></li>
											<li><a href="#other_services">Other  Services</a></li>
											<li><a href="#owner_Details">Owner  Details</a></li>
											
											
												</ul>
										
									</nav></div!-->
									
									<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'description')">Hall Details</button>
  <button class="tablinks" onclick="openCity(event, 'services')">Other Services</button>
  <button class="tablinks" onclick="openCity(event, 'owner_info')">Owner Information</button>
  <button class="tablinks" onclick="openCity(event, 'review')">Customer Review</button>
</div>
<div class="w3-content w3-display-container">
<div class="w3-display-container mySlides">
  <img src="images/post_media/<?php echo $img[0] ?>" style="width:100%" height="520px">
  <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-black">
     <?php echo $desc[0] ?>
  </div>
</div>

<div class="w3-display-container mySlides">
  <img src="images/post_media/<?php echo $img[1] ?>" style="width:100%" height="520px" width="630px">
  <div class="w3-display-bottomright w3-large w3-container w3-padding-16 w3-black">
     <?php echo $desc[1] ?>
  </div>
</div>

<div class="w3-display-container mySlides">
  <img src="images/post_media/<?php echo $img[2] ?>" style="width:100%" height="520px" width="630px">
  <div class="w3-display-topleft w3-large w3-container w3-padding-16 w3-black">
    <?php echo $desc[2] ?>
  </div>
</div>

<div class="w3-display-container mySlides">
  <img src="images/post_media/<?php echo $img[3] ?>" style="width:100%" height="520px" width="630px">
  <div class="w3-display-topright w3-large w3-container w3-padding-16 w3-black">
 <?php echo $desc[3] ?>
  </div>
</div>


<button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
<button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>





</div>
	  
<script>



var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1}
    x[slideIndex-1].style.display = "block";
    setTimeout(carousel, 3000); // Change image every 2 seconds
}
</script>

			
				
			

</div>
<div class="hall_desc"><h3><marquee behavior="scroll" direction="left"><?php echo $hall_details['hall_discription'] ?>...</h3></marquee></div>
<br><br>


<link rel="stylesheet" href="css/tab.css" type="text/css" media="all" />
 <script src="js/tab.js"></script>


<!-- Tab content -->
<div id="review" class="tabcontent">
  
  <?php 
 ##############CODE FOR SHOWING REVIEW ################
 $rev=$conn->query("select * from review where hall_id='$hall_id'");

 while($review=$rev->fetch_array(MYSQLI_BOTH))
 {
	 $rev_name=$review['user_id'];
 $reviewer=$conn->query(" select user_name from user where userid='$rev_name' ");
  $reviewer_name=$reviewer->fetch_array(MYSQLI_BOTH);
  echo '<h2><img src ="images/room.png" height="50px" length="50px"><b> &nbsp;'.$reviewer_name['user_name'].', Says :</h2></b>';
  echo '<h4>'.$review['review'].'</h4><br>';
 }
  ?>
</div>

<div id="description" class="tabcontent">
  <h3>Description:</h3>
  
  <p><?php echo '<br><h3><img src="images/location.png" height="60px" width="40px"> '.$hall_details['landmark'].'&nbsp;'.$hall_details['hall_street_address'].', '.$hall_details['hall_city'].'
		&nbsp;&nbsp;<img src="images/seat.png" height="50px" width="50px"> &nbsp;' .$hall_details['no_of_seat'] . ' Seats &nbsp;&nbsp;&nbsp;<img src="images/room.png" height="50px" width="50px"> &nbsp;'.$hall_details['no_of_rooms'] . ' Rooms &nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;<img src="images/rate.png" height="50px" width="50px"> '.$hall_details['hall_rent'].' Rs/-</p></h3>'; ?>
</div>

<div id="services" class="tabcontent">
  <h3>Other Services</h3>
  <p><?php echo '<br><h4><img src="images/room.png" height="40px" width="40px">AC : '.$hall_details['ac_service'].'&nbsp;
		&nbsp;&nbsp;<img src="images/room.png" height="40px" width="40px"  > Decoration: ' .$hall_details['decoration'] . '&nbsp;&nbsp;&nbsp;<img src="images/room.png" height="40px" width="40px"> Caterer: ' .$hall_details['caterer'] . '&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;<img src="images/room.png" height="40px" width="40px"> Menu Type : '.$hall_details['menu_type'].'</p></h4>'; ?></p>
</div>

<div id="owner_info" class="tabcontent">
  <h3>Owner Information:</h3>
  <?php echo '<br><h3><img src="images/person.png" height="40px" width="40px">'.$owner['user_name'].'&nbsp;
		&nbsp;&nbsp;&nbsp;<img src="images/mobile.png" height="40px" width="40px"  > &nbsp;' .$owner['mobile_no'] . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/email.png" height="40px" width="40px"> &nbsp;'.$owner['email'] . '&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;<img src="images/location.png" height="60px" width="40px">  '.$owner['street_address'].','.$owner['city'].'</p></h3>'; ?></p>
  
</div>
<br><br>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.button {
  border-radius: 4px;
  background-color:  #24cf5f;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 350px;
  transition: all 0.5s;
  cursor: pointer;
  margin-left: 650px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
<br><br>
<button class="button" onclick="location.href ='payment.php';" id="new"><span><a href="pay.php">Book Wedding Hall</a></span></button>
<script type="text/javascript">
    document.getElementById("new").onclick = function () {
        location.href = <?php echo "payment.php?hall_id='.$hall_id. " ?>";
    };
</script>



<div class="w3-display"><br>
<h3><font color="white" border="black"><center>Find Us Here(Google Map Location)</h3><br>
<?php  echo $hall_details['google_map'] ; ?>



</div>
</div>


	</body>
	</html>