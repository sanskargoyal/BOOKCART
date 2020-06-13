<?php define('TITLE', 'View Book');
 ?>
<?php 
include('../connection/config.php');
?>
<?php 
if(isset($_GET['book_id'])){
	$book_id = mysqli_real_escape_string($conn, $_GET['book_id']);
	$sql = "SELECT * FROM book_table WHERE book_id = '$book_id'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result)){
			$image = $row['image'];
			$title = $row['title'];
			$author = $row['author'];
			$edition = $row['edition'];
			$language = $row['language'];
			$binding = $row['binding'];
			$price = $row['price'];
			$description = $row['description'];
			$publisher = $row['publisher'];
			$genre = $row['genre'];
			$pages = $row['pages'];
			$availability = $row['availability'];
		}
	}else{
		echo '<script>location.href="books.php"</script>';
	}
}else{
	echo '<script>location.href="books.php"</script>';
}


?>
<!-- Header Start -->
<?php require 'winclude/head.php'; ?>

<!-- Sidebar Start -->
<?php require 'winclude/sidebar.php'; ?>

<!-- Navbar Start -->
<?php require 'winclude/navbar.php'; ?>


<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<?php 
		if(isset($msg)){
			echo $msg;
		}
		?>
		<h1 class="h3 mb-0 text-gray-800">View Book - <?php echo $title ?></h1>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-7">
			<div class="card card-white shadow-lg">
				<div class="col-md-6 justify-content-center py-3 px-4">
					<img class="img-responsive" src="pages/product_images/<?php echo $image ?>" style="height: 170px; width: 170px">
				</div>
				<table class="table">
					<tbody>
						<tr>
							<th class="p-4" scope="row">1</th>
							<td class="p-4">Book ID</td>
							<td class="p-4"><b><?php echo "$book_id"; ?></b></td>

						</tr>
						<tr>
							<th class="p-4" scope="row">2</th>
							<td class="p-4">Book Title</td>
							<td class="p-4"><b><?php echo "$title"; ?></b></td>

						</tr>
						<tr>
							<th class="p-4" scope="row">3</th>
							<td class="p-4">Book Author</td>
							<td class="p-4"><b><?php echo "$author"; ?></b></td>

						</tr>
						<tr>
							<th class="p-4" scope="row">4</th>
							<td class="p-4">Book Edititon</td>
							<td class="p-4"><b><?php echo "$edition"; ?></b></td>

						</tr>
						<tr>
							<th class="p-4" scope="row">5</th>
							<td class="p-4">Book Language</td>
							<td class="p-4"><b><?php echo "$language"; ?></b></td>

						</tr>

						<tr>
							<th class="p-4" scope="row">7</th>
							<td class="p-4">Book Binding</td>
							<td class="p-4"><b><?php echo "$binding"; ?></b></td>

						</tr>
						<tr>
							<th class="p-4" scope="row">8</th>
							<td class="p-4">Book Price</td>
							<td class="p-4"><b><?php echo "$price"; ?></b></td>

						</tr>
						<tr>
							<th class="p-4" scope="row">8</th>
							<td class="p-4">Book Publisher</td>
							<td class="p-4"><b><?php echo "$publisher"; ?></b></td>

						</tr>
						<tr>
							<th class="p-4" scope="row">8</th>
							<td class="p-4">Book Genre</td>
							<td class="p-4"><b><?php echo "$genre"; ?></b></td>

						</tr>
						<tr>
							<th class="p-4" scope="row">8</th>
							<td class="p-4">Book Pages</td>
							<td class="p-4"><b><?php echo "$pages"; ?></b></td>

						</tr>
						<tr>
							<th class="p-4" scope="row">8</th>
							<td class="p-4">Book Description</td>
							<td class="p-4"><b><?php echo "$description"; ?></b></td>

						</tr>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
</div>
<!-- /.container-fluid -->

<!-- Footer Start -->
<?php require 'winclude/footer.php' ?>