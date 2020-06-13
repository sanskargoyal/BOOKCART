<?php 
include('../../connection/config.php');
$order_id = mysqli_real_escape_string($conn, $_GET['order_id']);
$id = mysqli_real_escape_string($conn, $_GET['user_id']);
$sql = "DELETE FROM orders_table WHERE order_id = '$order_id'";
if(mysqli_query($conn, $sql)){
	echo '<script>location.href="../myorders.php?user_id='.$id.'"</script>';
}else{
	echo '<script>location.href="../myorders.php?user_id='.$id.'"</script>';
}

?>