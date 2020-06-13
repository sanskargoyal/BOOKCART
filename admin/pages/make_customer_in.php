<?php 
include ('../../connection/config.php');
$customer_id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "UPDATE user_table SET status = 'Inactive' WHERE user_id = '$customer_id'";
if(mysqli_query($conn, $sql) == TRUE)
{

	echo '<script>location.href="../customer.php"</script>';
}else{

	echo '<script>location.href="../customer.php"</script>';
}
$conn->close();
?>