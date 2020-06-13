<?php 
date_default_timezone_set('Asia/Kolkata'); 
include('../../connection/config.php');
include('../include/unique.php');


if(isset($_REQUEST['submit'])){
	$customer_id = 'C'.get_rand_numbers(3).'-'.get_rand_numbers(3).'-'.get_rand_numbers(3).'';
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

	$sql = "SELECT * FROM user_table where email = '$email' OR phone = '$mobile'";
	$role = 'customer';
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result)){
			$cem = $row['email'];
			$cph = $row['phone'];
			if($cem == $email){
				$msg = '<p class="alert alert-danger" role="alert">Duplicate Email</p>';
				echo '<script>location.href="../customer.php"</script>';
			}
			else{
				if($cph == $mobile){
					$msg = '<p class="alert alert-danger" role="alert">Duplicate Phone Number</p>';
					echo '<script>location.href="../customer.php"</script>';
				}else{

				}
			}
		}
	}else{
		$sql = "INSERT INTO user_table(user_id, fname, lname, email, phone, address, city, state, addtype, locality, role, avatar) VALUES('$customer_id', '$fname', '$lname', '$email', '$mobile', '$address', '$city', '$state', '$addtype', '$locality', 'user', '$image1')";
		if(mysqli_query($conn, $sql) == TRUE){
			$msg = '<p class="alert alert-success" role="alert">Customer Registered Successfully</p>';
			echo '<script>location.href="../customer.php"</script>';
		}
		else{
			$msg = '<p class="alert alert-danger" role="alert">Unable to Register Customer</p>';
			echo '<script>location.href="../customer.php"</script>';
		}
	}
}
$conn->close();
?>