<?php 
include '../connection/config.php';
if(isset($_REQUEST['reset'])){
	$user_id = $_GET['user'];
	$npass = mysqli_real_escape_string($conn, $_POST['npass']);
	$cpass = mysqli_real_escape_string($conn, $_POST['cpass']);

	if($npass === $cpass){
		$sql = "UPDATE user_table set password = '$npass' WHERE user_id='$user_id'";
		$result = mysqli_query($conn,$sql);
		if($result){
			echo '<script>alert("Your password update successfully, Please Login.")</script>';
			echo '<script>location.href="../index.php"</script>';
		}else{
			echo '<script>alert("Unable to update your password.")</script>';
			echo '<script>location.href="../forgot_pw.php"</script>';
		}
	}
}

?>