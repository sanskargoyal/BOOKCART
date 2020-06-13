<?php 
include '../connection/config.php';
$email = mysqli_real_escape_string($conn, $_POST['email']);
$sql = "SELECT * FROM user_table WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
	$fname = $row['fname'];
	$lname = $row['lname'];
	$user_id = $row['user_id'];


	$subject = "Password Reset.";
	$body =	"Hi, $fname $lname. Click here too reset your password http://localhost/bookcart/user_pages/reset_password.php?user=$user_id" ;
	$sender_email = "From:sanskarg025@gmail.com";
	if(mail($email, $subject, $body, $sender_email)){
		echo '<script>alert("check your mail to reset your password")</script>';
		echo '<script>location.href="../index.php"</script>';
	}else{
		echo 'Email sending failed...';
	}

}
else{
	echo '<script>alert("No Email Found, Please Enter Valid Email.")</script>';
	echo '<script>location.href="../forgot_pw.php"</script>';
}

?>