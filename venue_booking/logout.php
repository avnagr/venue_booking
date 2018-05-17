<?php
include('connection.php');

//unset($_SESSION['token']);
//unset($_SESSION['userData']);

//Destroy entire session
session_destroy();

//Redirect to homepage
header("Location:index.php");
?>