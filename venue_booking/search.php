<?php
include('connection.php');
include('framework_user.html');
session_start();
$user_id=$_SESSION['userid'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta tags -->
	<title>venue_booking</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="css/search.css">
	  <link rel="stylesheet" href="css/text.css">
	<!-- stylesheets -->
	</head>
<body background color="white">
	<link rel="stylesheet" href="css/jquery.css" />
		      <script src="js/jquery.js"></script>
			
			   <script>
				 $(function() {
				 $( "#datepicker,#datepicker1" ).datepicker();
				 });
			</script>
			
			<form class="searchform cf" form action="search.php" method="POST">
  <input type="text" placeholder="location(City)" name="loc"  required />
  			<input type="text" id="datepicker" name="date"  placeholder="Date" value=" "  required />
       <input type="text" placeholder="Budget"  name="budget" required />
  <input type="text" placeholder="No of Seats"  name="nos" required />
  
  <button type="submit" name="submit">Search Hall</button>
  
</form>


<?php
if(isset($_POST['submit']))
{
$loc=$_POST['loc'];
$date=$_POST['date'];
$budget=$_POST['budget'];
$nos=$_POST['nos'];	
echo'<font color="white">';


if($date<=date("Y-m-d"))
{
	echo "Please enter currect date";
}	
else
{
	echo'<br><br> <br><br>  <br><br><br><br><br><br>';
	$query= $conn->query("select * from wedding_hall where hall_city='$loc' and hall_rent < '$budget' and
    no_of_seat > '$nos' and status='1' and hall_id not in (select hall_id from booking where date='$date' ) ");
	$total_count= mysqli_num_rows($query);
	
		echo'<h1><center><font color="white">Search Results: <strong class="text-danger">'.$total_count.'&nbsp;results were found for the search for Wedding Hall</strong> </h1></center><br>';
									
	echo'<br>';echo'<br>';
	
	while($hall_detail = $query->fetch_array(MYSQLI_BOTH))
	{
		
		?>
	 
<div class="result_final">
 <div class="hall_name">
 
     
			<?php echo'<center><h3>&nbsp;<font color="white"><a target= "_blank" href="wedding_hall.php?hall_id='.$hall_detail['hall_id']. "&date=".$date.' "> ' .$hall_detail['hall_name'].' '.$hall_detail['hall_street_address'].', '.$hall_detail['hall_city'].'</a></h3></center>' ?>
			</div>
			
   <div class="wed">
				<img src="images/<?php echo $hall_detail['hall_image']?>" width="420px" height="255px" alt="">
			</div>
			
			
		<div class="rent"><h3><?php echo '<img src="images/location.png" height="60px" width="40px"> ' .$hall_detail['landmark'].'&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;<img src="images/seat.png" height="50px" width="50px"> &nbsp;' .$hall_detail['no_of_seat'] . ' Seats &nbsp;&nbsp;&nbsp;<img src="images/room.png" height="50px" width="50px"> &nbsp;'.$hall_detail['no_of_rooms'] . ' Rooms &nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;<img src="images/rate.png" height="50px" width="50px"> '.$hall_detail['hall_rent'].' Rs/-' ?></h3></div>
		</div>
	
	<br> <br>	<br><br>
		
	<?php	
		
	}
	
	
   
	  
	}
	
	
}
	
	

?>

</body>







</html>