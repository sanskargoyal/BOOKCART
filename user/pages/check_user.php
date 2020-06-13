<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
	$myfname = $_SESSION['first_name'];
	$mylname = $_SESSION['last_name'];
	$mygender = $_SESSION['gender'];
	$mydob = $_SESSION['dob'];
	$myaddress = $_SESSION['address'];
	$myemail = $_SESSION['email'];
	$myphone = $_SESSION['phone'];
	$myrole = $_SESSION['role'];
		$myid = $_SESSION['myid'];
	if ($myrole == "user") {
		
	}else{
		echo '<script>alert("You must User.")</script>';
	header("location:../");	
	}
}else{
	echo '<script>alert("You must Login First.")</script>';
	header("location:../");
}

?>