<?php 
date_default_timezone_set('Asia/Kolkata'); 
include('../connection/config.php');
include('../user/include/uniques.php');


if(isset($_REQUEST['submit'])){
	$customer_id = 'C'.get_rand_numbers(3).'-'.get_rand_numbers(3).'-'.get_rand_numbers(3).'';
	$fname = ucwords(mysqli_real_escape_string($conn, $_POST['fname']));
	$lname = ucwords(mysqli_real_escape_string($conn, $_POST['lname']));
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$sql = "SELECT * FROM user_table where email = '$email' OR phone = '$mobile'";
	$role = 'user';
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result)){
			$cem = $row['email'];
			$cph = $row['phone'];
			if($cem == $email){
				$msg = '<p class="alert alert-danger" role="alert">Duplicate Email</p>';
				echo '<script>location.href="../user/"</script>';
			}
			else{
				if($cph == $mobile){
					$msg = '<p class="alert alert-danger" role="alert">Duplicate Phone Number</p>';
					echo '<script>location.href="../user/"</script>';
				}else{

				}
			}
		}
	}else{
		$sql = "INSERT INTO user_table(user_id, fname, lname, email, password, phone, role) VALUES('$customer_id', '$fname', '$lname', '$email','$password', '$mobile', '$role')";
		if(mysqli_query($conn, $sql) == TRUE){
			$subject = "Email Activation.";
			$body =	"Hi, $fname $lname. Click here too activate your account http://localhost/bookcart/user_pages/activate.php?user=$customer_id" ;
			$sender_email = "From:sanskarg025@gmail.com";
			if(mail($email, $subject, $body, $sender_email)){
				// $_SESSION['msg'] = "check your mail to activate your account $email";
				echo '<script>alert("check your mail to activate your account")</script>';
				echo '<script>location.href="../index.php"</script>';
			}else{
				echo 'Email sending failed...'
			}
			// $msg = '<p class="alert alert-success" role="alert">Customer Registered Successfully</p>';
			
		}
		else{
			echo '<script>alert("Unable to Register Customer")</script>';
			// echo '<script>location.href="../customer.php"</script>';
		}
	}
}
$conn->close();
?>