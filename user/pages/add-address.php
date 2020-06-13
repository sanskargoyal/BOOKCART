<?php 
date_default_timezone_set('Asia/Kolkata'); 
include('../../connection/config.php');
include('../include/unique.php');


if(isset($_REQUEST['submit'])){
	$user_id = $_GET['user_id'];
	$fname = ucwords(mysqli_real_escape_string($conn, $_POST['fname']));
	$lname = ucwords(mysqli_real_escape_string($conn, $_POST['lname']));
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
	$address = ucwords(mysqli_real_escape_string($conn, $_POST['address']));
	$city = ucwords(mysqli_real_escape_string($conn, $_POST['city']));
	$state = ucwords(mysqli_real_escape_string($conn, $_POST['state']));
	$addtype = ucwords(mysqli_real_escape_string($conn, $_POST['addtype']));
	$locality = ucwords(mysqli_real_escape_string($conn, $_POST['locality']));
	$role = 'customer';
	$sql = "UPDATE user_table SET fname = '$fname', lname = '$lname', address = '$address', email = '$email', phone = '$mobile', status = '$status', city = '$city', state = '$state', addtype = '$addtype', locality = '$locality' WHERE user_id='$user_id'";

	if ($conn->query($sql) === TRUE) {
  header("location:../address.php?user_id=$user_id");
} else {
  header("location:../address.php?user_id=$user_id");
}
}
$conn->close();
?>