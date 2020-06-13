<?php 
include ('../../connection/config.php');
$review_id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "UPDATE review_table SET status = 'Active' WHERE review_id = '$review_id'";
if(mysqli_query($conn, $sql) == TRUE)
{

	echo '<script>location.href="../review.php"</script>';
}else{

	echo '<script>location.href="../review.php"</script>';
}
$conn->close();
?>