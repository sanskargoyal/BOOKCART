<?php 
include('../../connection/config.php');
session_start();
if(!isset($_SESSION['is_admin_login'])){
	if (isset($_REQUEST['email'])) {
		$email = mysqli_real_escape_string($conn, trim($_REQUEST['email']));
		$password = mysqli_real_escape_string($conn, trim($_REQUEST['password']));
		$sql = "SELECT * FROM user_table WHERE email = '".$email."' AND password = '".$password."' limit 1";
		$row = mysqli_fetch_array($conn, $sql);
		$role = $row['role'];
		if($role == 'admin'){
			$result = $conn->query($sql);
			if($result->num_rows == 1){
				$_SESSION['is_admin_login'] = true;
				$_SESSION['email'] = $email;
				echo "<script>location.href='../index.php';</script>";
				exit;
			}
			else{
				$msg = '<div class="alert alert-warning mt-2" role="alert">login failed</div>';
			}
		}else{
			echo '<script>alert("Please Login as User")</script>';
			echo "<script>location.href='../login.php';</script>";
		}
		
	}
}
else{
	echo "<script>location.href='../index.php';</script>";  
}


?>