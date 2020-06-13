<?php
$customer_id = $_POST['customer_id'];
include '../../connection/config.php';
$image1 = mysqli_real_escape_string( $conn, $_FILES['profile']['name']);
$image1_tmp = @$_FILES['profile']['tmp_name'];
$fname = ucwords(mysqli_real_escape_string($conn, $_POST['fname']));
$lname = ucwords(mysqli_real_escape_string($conn, $_POST['lname']));
$email = mysqli_real_escape_string($conn, $_POST['email']);
$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
$address = ucwords(mysqli_real_escape_string($conn, $_POST['address']));
$city = ucwords(mysqli_real_escape_string($conn, $_POST['city']));
$state = ucwords(mysqli_real_escape_string($conn, $_POST['state']));
$addtype = ucwords(mysqli_real_escape_string($conn, $_POST['addtype']));
$locality = ucwords(mysqli_real_escape_string($conn, $_POST['locality']));

	move_uploaded_file($image1_tmp, "profile_images/".basename($image1));
$sql = "SELECT * FROM user_table WHERE email = '$email' AND user_id !='$customer_id' OR phone = '$mobile' AND user_id !='$customer_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $sem = $row['email'];
	$sph = $row['phone'];
	if ($sem == $email) {
	 header("location:../edit-customer.php?customer_id=$customer_id");	
	}else{
	
	if ($sph == $phone) {
	 header("location:../edit-customer.php?customer_id=$customer_id");	
	}else{
		
	}
	
	}
	
    }
} else {

$sql = "UPDATE user_table SET avatar = '$image1', fname = '$fname', lname = '$lname', city = '$city', state = '$state', address = '$address', email = '$email', phone = '$mobile', addtype = '$addtype', locality = '$locality' WHERE user_id='$customer_id'";

if ($conn->query($sql) === TRUE) {
  header("location:../edit-customer.php?customer_id=$customer_id");
} else {
  header("location:../edit-customer.php?customer_id=$customer_id");
}


}

$conn->close();
?>