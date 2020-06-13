<?php 
include ('../../connection/config.php');
$book_id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "UPDATE book_table SET status = 'Inactive' WHERE book_id = '$book_id'";
if(mysqli_query($conn, $sql) == TRUE)
{

	echo '<script>location.href="../books.php"</script>';
}else{

	echo '<script>location.href="../books.php"</script>';
}
$conn->close();
?>