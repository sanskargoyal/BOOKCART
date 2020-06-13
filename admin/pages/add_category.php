<?php 
date_default_timezone_set('Asia/Kolkata'); 
include('../../connection/config.php');
include('../include/unique.php');


if(isset($_REQUEST['submit'])){
	$category_id = 'C'.get_rand_numbers(3).'-'.get_rand_numbers(3).'-'.get_rand_numbers(3).'';



	$category = ucwords(mysqli_real_escape_string($conn, $_POST['category']));

	$status = mysqli_real_escape_string($conn, $_POST['status']);
	$sql = "SELECT * FROM book_category where category = '$category'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result)){
			$cat = $row['category'];
			if($cat == $category){
				$msg = '<p class="alert alert-danger" role="alert">Duplicate Category</p>';
				echo '<script>location.href="../category.php"</script>';
			}
			else{
			}
		}
	}else{

		$sql = "INSERT INTO book_category(category_id, category, status) VALUES('$category_id', '$category', '$status')";
		$result = mysqli_query($conn, $sql);
		if($result == TRUE){
			echo '<script>alert("Category Add Successfully.")</script>';
			echo '<script>location.href="../category.php"</script>';
		}
		else{
			echo '<script>alert("Unable to Add Category.")</script>';
			echo '<script>location.href="../category.php"</script>';
		}
	}
}
$conn->close();
?>