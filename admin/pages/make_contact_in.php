<?php 
include ('../../connection/config.php');
$contact_id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "UPDATE contact_table SET status = 'Inactive' WHERE contact_id = '$contact_id'";
if(mysqli_query($conn, $sql) == TRUE)
{

	echo '<script>location.href="../message.php"</script>';
}else{

	echo '<script>location.href="../message.php"</script>';
}
$conn->close();
?>