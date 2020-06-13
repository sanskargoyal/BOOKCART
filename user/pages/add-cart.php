 <?php 
date_default_timezone_set('Asia/Kolkata'); 
include('../../connection/config.php');
include('../include/uniques.php');
if(isset($_REQUEST['add'])){
	$myid = $_GET['user_id'];
	$book_id = mysqli_real_escape_string($conn, $_GET['book_id']);
	$sql = "SELECT * FROM book_table WHERE book_id = '$book_id'";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result)){
		$price = $row['price'];
	}
	$cart_id = 'CART-'.get_rand_numbers(3).'-'.get_rand_numbers(3).'';
	$qty = mysqli_real_escape_string($conn, $_POST['qty']);
	$date = date('d-m-Y');
	$total = $qty*$price;
	$sql = "INSERT INTO cart_table(cart_id, book_id, qty, total, user_id, cartdate) VALUES('$cart_id', '$book_id', '$qty', '$total', '$myid', '$date')";
	if(mysqli_query($conn, $sql)==TRUE){
		// echo '<script>alert("Your Comment Successfully Posted.")</script>';
		echo '<script>location.href="../book.php?book_id='.$book_id.'"</script>';
	}else{
		// echo '<script>alert("Your Comment is not Posted.")</script>';
		echo '<script>location.href="../book.php?book_id='.$book_id.'"</script>';
	}
}

?>