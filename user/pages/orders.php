<?php  
include('../../connection/config.php');
include('../include/uniques.php');
$id = mysqli_real_escape_string($conn, $_GET['user_id']);
// $order_id = 'ORDER-'.get_rand_numbers(3).'-'.get_rand_numbers(3).'';
$payment = mysqli_real_escape_string($conn, $_POST['payment']);
// $order_date =  date('d-m-Y');
$atotal = $_POST['total'];
$sql = "SELECT * FROM cart_table WHERE user_id = '$id'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
	$cart_id = $row['cart_id'];
	$book_id = $row['book_id'];
	$qty = $row['qty'];
	$total = $row['total'];
	$order_id = 'ORDER-'.get_rand_numbers(3).'-'.get_rand_numbers(3).'';
	$insertorder = "INSERT INTO orders_table(order_id, cart_id, user_id, book_id, payment, total, order_date) VALUES('$order_id', '$cart_id', '$id', '$book_id', '$payment', '$total', NOW())";
	if(mysqli_query($conn, $insertorder) == TRUE){

		$deletecart = "DELETE FROM cart_table WHERE user_id = '$id'";
		if(mysqli_query($conn, $deletecart)){
			echo '<script>alert("Your Order Successfully Placed.")</script>';
			echo '<script>location.href="../index.php"</script>';
		}else{
			echo '<script>location.href="../checkout.php"</script>';
		}

	}else{
		echo '<script>alert("Unable to Place Your Order.")</script>';
		echo '<script>location.href="../index.php"</script>';
	}
}
?>



<!--  -->