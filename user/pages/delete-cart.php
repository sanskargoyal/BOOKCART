<?php 
include('../../connection/config.php');
$cart_id = mysqli_real_escape_string($conn, $_GET['cart_id']);
$sql = "DELETE FROM cart_table WHERE cart_id = '$cart_id'";
if(mysqli_query($conn, $sql) == TRUE){
	echo '<script>location.href="../index.php"</script>';
}else{
	echo '<script>location.href="../checkout.php"</script>';
}

?>