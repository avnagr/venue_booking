<?php
include('framework_hall_owner.html');
include('connection.php');
SESSION_START();

?>
<html>
<head>
<link rel="stylesheet" href="css/profile.css">
</head>
<body>
<div class="w3ls-banner">
<?php

//$fudet_query = $conn->query("select user_name from user where email='arsh@gmail.com' ") ;  
             // $fudet_res = $fudet_query->fetch_array(MYSQLI_BOTH);
												//echo $fudet_res['user_name'];

$USER_EMAIL=$_SESSION['email'];

$user_query = $conn->query("select verification_status from hall_owner where email = '$USER_EMAIL'");
$user = $user_query->fetch_array(MYSQLI_BOTH);
$rp_num= $user['verification_status'];
echo $rp_num;

if($rp_num==0)
{
 echo'<h3> <br><center><font color="black">welcome! &nbsp please set your profile by clicing on profile option,make sure all information is correct, Our admin will check and verify sortly.</br></font></center>';
}
if($rp_num==1)
{
 echo'<h3> <br><center><font color="black">&nbsp you set your profile, please wait our admin will verify all your informastion sortly.</br></font></center>';
}
if($rp_num==2)
{
 echo'<h3> <br><center><font color="black">&nbsp bingo your information has been verified now you can set your hall information</br></font></center>';
}
?>


</div>

</body>
</html>


