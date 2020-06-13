<?php 
include('../../connection/config.php');
$sql = "SELECT * FROM book_category";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$name = $row['category'];
?>