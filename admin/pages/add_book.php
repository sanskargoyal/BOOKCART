 <?php 
date_default_timezone_set('Asia/Kolkata'); 
include('../../connection/config.php');
include('../include/unique.php');


if(isset($_REQUEST['submit'])){
	$book_id = 'B'.get_rand_numbers(3).'-'.get_rand_numbers(3).'-'.get_rand_numbers(3).'';

	$image1 = mysqli_real_escape_string( $conn, $_FILES['image']['name']);
	$image1_tmp = @$_FILES['image']['tmp_name'];

	$title = ucwords(mysqli_real_escape_string($conn, $_POST['title']));

	$author = ucwords(mysqli_real_escape_string($conn, $_POST['author']));

	$category_id = mysqli_real_escape_string($conn, $_POST['category_id']); 

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

	$sql = "INSERT INTO book_table(book_id, book_category_id, title, author, edition, language, binding, price, description, publisher, genre, pages, availability, status, image) VALUES('$book_id', '$category_id', '$title', '$author', '$edition', '$language', '$binding', '$price', '$description', '$publisher', '$genre', '$pages', '$availability', '$status', '$image1')";
	$result = mysqli_query($conn, $sql);
	if($result == TRUE){
		echo '<script>alert("Book Add Successfully.")</script>';
		echo '<script>location.href="../books.php"</script>';
	}
	else{
		echo '<script>alert("Unable to Add Book.")</script>';
		echo '<script>location.href="../books.php"</script>';
	}
}
$conn->close();
?>