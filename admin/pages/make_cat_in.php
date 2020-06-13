<?php 
include ('../../connection/config.php');
$cat_id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "UPDATE book_category SET status = 'Inactive' WHERE category_id = '$cat_id'";
if(mysqli_query($conn, $sql) == TRUE)
{

	echo '<script>location.href="../category.php"</script>';
}else{

	echo '<script>location.href="../category.php"</script>';
}
$conn->close();
?>