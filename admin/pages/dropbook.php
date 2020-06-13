<?php
include '../../connection/config.php';
$book_id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM book_table WHERE book_id='$book_id'";

if ($conn->query($sql) === TRUE) {
	echo '<script>alert("Book Deleted Successfully.")</script>';
    header("location:../books.php");
} else {
	echo '<script>alert("Unable to Delete Book.")</script>';
    header("location:../books.php?");
}

$conn->close();
?>
