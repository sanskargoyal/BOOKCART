<?php
include '../../connection/config.php';
$comment_id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM comments_table WHERE comment_id='$comment_id'";

if ($conn->query($sql) === TRUE) {
	echo '<script>alert("Comment Deleted Successfully.")</script>';
    header("location:../comments.php");
} else {
	echo '<script>alert("Unable to Delete Comment.")</script>';
    header("location:../comments.php?");
}

$conn->close();
?>
