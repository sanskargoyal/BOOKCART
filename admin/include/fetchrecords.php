<?php 
include '../connection/config.php';
$customer = 0;
$book = 0;
$category = 0;
$orders = 0;

$sql = "SELECT * FROM user_table WHERE role='user'";
$res = mysqli_query($conn, $sql);
while(mysqli_fetch_array($res)){
	$customer++;
}
$sql = "SELECT * FROM book_table WHERE status = 'ACTIVE'";
$res = mysqli_query($conn, $sql);
while(mysqli_fetch_array($res)){
	$book++;
}
$sql = "SELECT * FROM book_category WHERE status = 'ACTIVE'";
$res = mysqli_query($conn, $sql);
while(mysqli_fetch_array($res)){
	$category++;
}
$sql = "SELECT * FROM orders_table";
$res = mysqli_query($conn, $sql);
while(mysqli_fetch_array($res)){
	$orders++;
}
?>