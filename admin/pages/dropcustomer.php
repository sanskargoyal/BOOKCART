<?php
include '../../connection/config.php';
$customer_id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM user_table WHERE user_id='$customer_id'";

if ($conn->query($sql) === TRUE) {
	echo '<script>alert("Customer Deleted Successfully.")</script>';
    header("location:../customer.php");
} else {
	echo '<script>alert("Unable to Delete Customer.")</script>';
    header("location:../customer.php?");
}

$conn->close();
?>
