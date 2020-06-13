 <?php 
date_default_timezone_set('Asia/Kolkata'); 
include('../../connection/config.php');
include('../include/uniques.php');

if(isset($_REQUEST['submitr'])){
	$book_id = mysqli_real_escape_string($conn, $_GET['book_id']);
	$review_id = 'R-'.get_rand_numbers(6).'';
	$name = ucwords(mysqli_real_escape_string($conn, $_POST['name']));
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$number = mysqli_real_escape_string($conn, $_POST['number']);
	$message = ucwords(mysqli_real_escape_string($conn, $_POST['message']));
	$post_date = date('d-m-Y');

	$sql = "INSERT INTO review_table(review_id, book_id, name, email, phone, review, post_date) VALUES('$review_id', '$book_id', '$name', '$email', '$number', '$message', '$post_date')";
	if(mysqli_query($conn, $sql)==TRUE){
		echo '<script>alert("Your Review Successfully Posted.")</script>';
		echo '<script>location.href="../book.php?book_id='.$book_id.'"</script>';
	}else{
		echo '<script>alert("Your Review is not Posted.")</script>';
		echo '<script>location.href="../book.php?book_id='.$book_id.'"</script>';
	}
}

?>