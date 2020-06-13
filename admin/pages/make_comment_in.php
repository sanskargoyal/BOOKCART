<?php 
include ('../../connection/config.php');
$comment_id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "UPDATE comments_table SET status = 'Inactive' WHERE comment_id = '$comment_id'";
if(mysqli_query($conn, $sql) == TRUE)
{

	echo '<script>location.href="../comments.php"</script>';
}else{

	echo '<script>location.href="../comments.php"</script>';
}
$conn->close();
?>