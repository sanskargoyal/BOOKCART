<?php
include '../database/config.php';
$myusername = mysqli_real_escape_string($conn, $_POST['name']);
$mypassword = $_POST['login'];

$sql = "SELECT * FROM user_table WHERE name = '$myusername' AND password = '$mypassword' OR email = '$myusername' AND password = '$mypassword'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    session_start();
	$_SESSION['login'] = true;
	$_SESSION['first_name'] = $row['fname'];
	$_SESSION['last_name'] = $row['lname'];
	$_SESSION['gender'] = $row['gender'];
	$_SESSION['dob'] = $row['dob'];
	$_SESSION['address'] = $row['address'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['phone'] = $row['phone'];
	$_SESSION['role'] = $row['role'];
	// $_SESSION['avatar'] = $row['avatar'];
	$_SESSION['myid'] = $row['user_id'];
	$accstat = $row['status'];
	if ($accstat == "0") {
	 header("location:../user/login");	
	}else{
		$location = strtolower($row['role']);
	header("location:../$location/");	
	}

    }
} else {
    header("location:../user/login");
}
$conn->close();

?>