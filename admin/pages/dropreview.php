<?php
include '../../connection/config.php';
$review_id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM review_table WHERE review_id='$review_id'";

if ($conn->query($sql) === TRUE) {
	echo '<script>alert("Review Deleted Successfully.")</script>';
    header("location:../review.php");
} else {
	echo '<script>alert("Unable to Delete Review.")</script>';
    header("location:../review.php?");
}

$conn->close();
?>
