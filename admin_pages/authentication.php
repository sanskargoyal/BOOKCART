<?php
include '../connection/config.php';
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password'];

$sql = "SELECT * FROM user_table WHERE email = '$email' AND password = '$password'";
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
	echo $accstat;
	if ($accstat == "0") {
		echo '<script>alert("Your Acount is disabele.")</script>';
	 header("location:../index.php");	
	}else{
		$location = strtolower($row['role']);
	header("location:../$location/");	
		// echo '<script>location.href="../admin/index.php"</script>';
	}

    }
} else {
	echo '<script>alert("Invalid email and Password.")</script>';
    header("location:../adminlogin/index.php");
}
$conn->close();

?>