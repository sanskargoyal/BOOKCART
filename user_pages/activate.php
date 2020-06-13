<?php 
session_start();
include '../connection/config.php';
if(isset($_GET['user'])){
	$user_id = $_GET['user'];
	$sql = "UPDATE user_table SET status='Active' WHERE user_id = '$user_id'";
	$result = mysqli_query($conn, $sql);
	if($result){
		echo '<script>alert("Account Activate Successfully.")</script>';
		echo '<script>location.href="../index.php"</script>';

	}else{
		echo '<script>alert("You are logged out.")</script>';
		echo '<script>location.href="../index.php"</script>';
	}

}else{
	echo '<script>alert("Account Not Activate.")</script>';
		echo '<script>location.href="../login/register.php"</script>';
}
?>