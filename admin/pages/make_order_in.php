<?php 
include ('../../connection/config.php');
$order_id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "UPDATE orders_table SET status = 'Inactive' WHERE order_id = '$order_id'";
if(mysqli_query($conn, $sql) == TRUE)
{

	echo '<script>location.href="../order.php"</script>';
}else{

	echo '<script>location.href="../order.php"</script>';
}
$conn->close();
?>