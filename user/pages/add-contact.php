 <?php 
date_default_timezone_set('Asia/Kolkata'); 
include('../../connection/config.php');
include('../include/uniques.php');

if(isset($_REQUEST['submit'])){
	$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
	$contact_id = 'CON-'.get_rand_numbers(6).'';
	$name = ucwords(mysqli_real_escape_string($conn, $_POST['name']));
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$subject = mysqli_real_escape_string($conn, $_POST['subject']);
	$message = ucwords(mysqli_real_escape_string($conn, $_POST['message']));

	$sql = "INSERT INTO contact_table(contact_id, user_id, name, email, subject, message, cdate) VALUES('$contact_id', '$user_id', '$name', '$email', '$subject', '$message', NOW())";
	if(mysqli_query($conn, $sql)==TRUE){
		echo '<script>alert("Your Query Successfully Submit.")</script>';
		echo '<script>location.href="../contact.php"</script>';
	}else{
		echo '<script>alert("Your Query is not Submit.")</script>';
		echo '<script>location.href="../contact.php"</script>';
	}
}

?>