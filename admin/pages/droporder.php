<?php
include '../../connection/config.php';
$order_id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM orders_table WHERE order_id='$order_id'";

if ($conn->query($sql) === TRUE) {
	echo '<script>alert("Order Deleted Successfully.")</script>';
    header("location:../order.php");
} else {
	echo '<script>alert("Unable to Delete Order.")</script>';
    header("location:../order.php?");
}

$conn->close();
?>
