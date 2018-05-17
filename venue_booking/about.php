<?php
include("connection.php");
?>
<!--PHP CODE FOR MOST Booked WEDDING HALL AND RECENTLY ADDED WEDDING HALL-->
<?php
$query=$conn->query("select hall_id from wedding_hall order by date desc limit 2; ");
$total= mysqli_num_rows($query);
 $uid = array();
 $i=0;
 if($query->num_rows > 0)
 {
while($row = $query->fetch_array(MYSQLI_BOTH))
{
	$uid[$i]= $row['hall_id'];
	$i=$i+1;
	if($i==2)
		break;
}
 }

 $query1=$conn->query("select hall_name,hall_image,hall_city,date from wedding_hall where hall_id='$uid[0]' ; ");
  $query2=$conn->query("select hall_name,hall_image,hall_city,date from wedding_hall where hall_id='$uid[1]' ; ");
 $res1= $query1->fetch_array(MYSQLI_BOTH);
  $res2= $query2->fetch_array(MYSQLI_BOTH);

?>

<!--PHP CODE FOR MOST Booked WEDDING HALL AND RECENTLY ADDED WEDDING HALL-->
<?php
$query=$conn->query("select count(hall_id) as total,hall_id from booking group by hall_id  desc limit 2 ");
$total_book= mysqli_num_rows($query);
 $hid = array();
 $count=array();
 $i=0;
 if($query->num_rows > 0)
 {
while($row1 = $query->fetch_array(MYSQLI_BOTH))
{
	$hid[$i]= $row1['hall_id'];
	$count[$i]=$row1['total'];
	$i=$i+1;
	if($i==2)
		break;
}
 }
 
 $update1=$conn->query("select hall_name,hall_image,hall_city from wedding_hall where hall_id='$hid[0]' ; ");
  $update2=$conn->query("select hall_name,hall_image,hall_city from wedding_hall where hall_id='$hid[1]' ; ");
 $result1= $update1->fetch_array(MYSQLI_BOTH);
  $result2= $update2->fetch_array(MYSQLI_BOTH);

?>




<!DOCTYPE html>
<html lang="en">
<head>
<title>Venue Booking</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Wedding Venue Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- font -->
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>
<body>
	<!-- banner -->
	<div class="banner jarallax">
		<div class="agileinfo-dot">
			<div class="header">
				<div class="container">
					<div class="header-top-grids">
						<div class="agileits-logo">
							<h1><a href="index.php">VB</a></h1>
						</div>
						<div class="top-nav">
							<nav class="navbar navbar-default">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>

								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
									<nav>
										<ul class="nav navbar-nav">
											<li class="active"><a href="index.php">Home</a></li>
											<li><a href="about.php">About</a></li>
											<li><a href="mail.php">Mail Us</a></li>
											<li class=""><a href="#" class="dropdown-toggle hvr-bounce-to-bottom" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login<span class="caret"></span></a>
												<ul class="dropdown-menu">
													<li><a class="hvr-bounce-to-bottom" href="user_login.php">User</li>
													<li><a class="hvr-bounce-to-bottom" href="hall_owner_login.php">Hall owner</a></li>  
                                                    <li><a class="hvr-bounce-to-bottom" href="admin_login.php">Admin</a></li>  													
												</ul>
											<li class=""><a href="#" class="dropdown-toggle hvr-bounce-to-bottom" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register<span class="caret"></span></a>
												<ul class="dropdown-menu">
													<li><a class="hvr-bounce-to-bottom" href="user_login.php">Customer</a></li>
													<li><a class="hvr-bounce-to-bottom" href="hsll_owner.php">Hall owner</a></li>          
												</ul>
										</ul>
									</nav>
								</div>
								<!-- /.navbar-collapse -->
							</nav>
						</div>
						<div class="agileinfo-social-grids">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="wthree-heading">
				<h2>About Us</h2>
			</div>
		</div>
	</div>
	<!-- //banner -->
	<!-- about -->
	<!-- about-top -->
	<div class="about-top">
		<div class="container">
			<div class="wthree-services-bottom-grids">
				<div class="col-md-6 wthree-services-left">
					<img src="images/5.jpg" alt="">
				</div>
				<div class="col-md-6 wthree-services-right">
					<div class="wthree-services-right-top">
						<h4>"Venue Booking" - Seize Your Moment!</h4>
						<p>Venue Booking is a wedding hall booking website where you can search wedding hall based on your conditions and book online so you need not to go and visit the place..</p>
					</div>
					<div class="wthree-services-right-bottom">
						<div class="services-right-bottom-bottom">
							<div class="services-bottom-icon">
								<i class="fa fa-asterisk" aria-hidden="true"></i>
							</div>
							<div class="services-bottom-info">
								<h5>Time saving</h5>
								<p>User oriented website, search and Book wedding Hall without wasting time to visit the places. </p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="services-right-bottom-bottom">
							<div class="services-bottom-icon">
								<i class="fa fa-asterisk" aria-hidden="true"></i>
							</div>
							<div class="services-bottom-info">
								<h5>Reliable</h5>
								<p>All the hall infomation is reliable and verified by admin.</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //about-top -->
	<!-- advantages -->
	<div class="advantages jarallax">
		<div class="agile-dot">
			<div class="container">
				<div class="advantages-main">
					<div class="advantages-top">
						<h3>Our Users</h3>
					</div>
				   <div class="advantage-bottom">
					 <div class="col-md-4 advantage-grid">
						<div class="advantage-block">
							<h3>01</h3>
							<h4>Customer</h4>
							<p>customers who search and book wedding halls based on their budget...</p>
						</div>
					 </div>
					 <div class="col-md-4 advantage-grid">
						<div class="advantage-block">
							<h3>02</h3>
							<h4>Hall owner</h4>
							<p>Hall owner who will manage wedding hall description ...</p>
						</div>
					 </div>
					 <div class="col-md-4 advantage-grid">
						<div class="advantage-block">
							<h3>03</h3>
							<h4>Admin</h4>
							<p>Admin who will verify hall owner hall information ...</p>
						</div>
					 </div>
					<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
					
	<!-- footer -->
	<footer>
		<div class="container">
			<div class="agile-footer-grids">
				<div class="col-md-4 agile-footer-grid">
					<h4>About</h4>
					<div class="agile-footer-info">
						<p>Venue Booking is a wedding hall booking website where you can search wedding hall based on your conditions and book online so you need not to go and visit the place..</p>
						<h5>Subscribe Here</h5>
						<form action="#" method="post">
							<input type="email" name="Email" placeholder="Email" required="">
							<input type="submit" value="Subscribe">
						</form>
					</div>
				</div>
				<div class="col-md-4 agile-footer-grid">
					<h4>Recently Added Weddig Hall . . .</h4>
					<div class="agile-post-grids">
						<div class="agile-post-grid">
							<div class="col-md-5 agile-post-left">
								<a href="single.html">
									<img src="images/<?php echo $res1['hall_image']; ?>"   alt="">
								</a>
							</div>
							<div class="col-md-7 agile-post-right">
								<a href="single.html"><?php echo '&nbsp;'.$res1['hall_name'].','.$res1['hall_city']; ?></a>
								<p>&nbsp; &nbsp;<i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo '&nbsp; &nbsp;'.$res1['date'] ?></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="agile-post-grid">
							<div class="col-md-5 agile-post-left">
								<a href="single.html">
									<img src="images/<?php echo $res2['hall_image']; ?>" alt="">
								</a>
							</div>
							<div class="col-md-7 agile-post-right">
								<a href="single.html"><?php echo '&nbsp; &nbsp;'.$res2['hall_name'].','.$res2['hall_city']; ?></a>
								<p>&nbsp; &nbsp;<i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo '&nbsp; &nbsp;'.$res2['date'] ?></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="col-md-4 agile-footer-grid">
					<h4>Most Booked Wedding hall . . . .</h4>
					<div class="popular-grids">
						<div class="popular-grid">
							<a href="single.html"><img src="images/<?php echo $result1['hall_image']; ?> "  alt=""></a>
						</div>
						<div class="popular-grid">
								<a href="single.html"><?php echo $result1['hall_name'].','.$result1['hall_city']; ?></a>
								<font color="white"><p><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo '&nbsp;'.$count[0] ?> Times Booked</p>
						</div>
						
						
						<div class="clearfix"> </div>
					</div>
					<div class="popular-grids">
						
						<div class="popular-grid">
						
							<a href="single.html"><img src="images/<?php echo $result2['hall_image']; ?>" alt=""></a>
						</div>
						<div class="popular-grid">
							<a href="single.html"><?php echo $result2['hall_name'].','.$result2['hall_city']; ?></a>
								<p><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo '&nbsp;'.$count[1] ?> Times Booked</p>
						</div>
					
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="agileits-w3layouts">
		<div class="container">
			<p>© M150503ca_Avnish Agrahari</p>
		</div>
	</div>
	<!-- //copyright -->


</body>	
</html>