<?php
include '../../connection/config.php';
$contact_id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM contact_table WHERE contact_id='$contact_id'";

if ($conn->query($sql) === TRUE) {
	echo '<script>alert("Contact Deleted Successfully.")</script>';
    header("location:../message.php");
} else {
	echo '<script>alert("Unable to Delete Contact.")</script>';
    header("location:../message.php?");
}

$conn->close();
?>
