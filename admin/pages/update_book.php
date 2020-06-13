<?php 
include('../../connection/config.php');
$book_id = $_POST['book_id'];
?>
<?php 

$title = ucwords(mysqli_real_escape_string($conn, $_POST['title']));

$image1 = mysqli_real_escape_string( $conn, $_FILES['image']['name']);
$image1_tmp = @$_FILES['image']['tmp_name'];

$author = ucwords(mysqli_real_escape_string($conn, $_POST['author']));

$edition = mysqli_real_escape_string($conn, $_POST['edition']);
	
$price = mysqli_real_escape_string($conn, $_POST['price']);

$language = ucwords(mysqli_real_escape_string($conn, $_POST['language']));

$binding = ucwords(mysqli_real_escape_string($conn, $_POST['binding']));

$publisher = ucwords(mysqli_real_escape_string($conn, $_POST['publisher']));

$genre = ucwords(mysqli_real_escape_string($conn, $_POST['genre']));

$pages = mysqli_real_escape_string($conn, $_POST['pages']);

$availability = mysqli_real_escape_string($conn, $_POST['availability']);

$description = ucwords(mysqli_real_escape_string($conn, $_POST['description']));

$status = mysqli_real_escape_string($conn, $_POST['status']);

	move_uploaded_file($image1_tmp, "product_images/".basename($image1));

$sql = "UPDATE book_table SET title = '$title', author = '$author', edition = '$edition', price = '$price', language = '$language', binding = '$binding', publisher = '$publisher', genre = '$genre', pages = '$pages', availability = '$availability', description = '$description', status = '$status', image = '$image1' WHERE book_id='$book_id'";

if ($conn->query($sql) === TRUE) {
  header("location:../books.php?book_id=$book_id");
} else {
  header("location:../edit-book.php?book_id=$book_id");
}
?>