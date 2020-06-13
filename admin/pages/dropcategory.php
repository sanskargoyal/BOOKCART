<?php
include '../../connection/config.php';
$category_id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM book_category WHERE category_id='$category_id'";

if ($conn->query($sql) === TRUE) {
	echo '<script>alert("Category Deleted Successfully.")</script>';
    header("location:../category.php");
} else {
	echo '<script>alert("Unable to Delete Category.")</script>';
    header("location:../category.php?");
}

$conn->close();
?>
