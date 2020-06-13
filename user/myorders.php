<?php
define('TITLE', 'My Orders'); 
// define('PAGE', 'Cart');
?>
<!-- Start Head Area -->
<?php include('winclude/head.php'); ?>

<!-- Start Header Area -->
<?php include('winclude/header.php'); ?>

<!-- Start Banner -->
<?php include('winclude/banner.php'); ?>

<!--================Single Product Area =================-->
<section class="banner organic-breadcrumb" style="background-image: url(../img/all.jpg)">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>My Orders</h1>
			</div>
		</div>
	</div>
</section>
<div class="container mt-5 mb-5">
	<h1 class="text-center">My Orders</h1>
	<div class="row mt-4 justify-content-center">
		<?php 
		$user_id = $_GET['user_id'];
		$sql = "SELECT * FROM orders_table WHERE user_id = '$user_id'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_array($result)){
				$book_id = $row['book_id'];
				$getbook = "SELECT * FROM book_table WHERE book_id = '$book_id'";
				$resultbook = mysqli_query($conn, $getbook);
				$rowbook = mysqli_fetch_array($resultbook);
		?>
		
		<div class="col-md-10 mt-4">

			<div class="card shadow-sm p-4">
				<div class="row justify-content-center	">
					<div class="col-sm-4 col-md-2 col-lg-2">
						<img src="../admin/pages/product_images/<?php echo $rowbook['image'] ?>" style="height: 150px; width: 100px;">
					</div>
					<div class="col-sm-4 col-md-5 col-lg-5">
						<table>
							<tr>
								<th>Title</th><td><?php echo $rowbook['title'] ?></td>
							</tr>
							<tr>
								<th colspan="1">Author</th><td colspan="2" class="ml-2"><?php echo $rowbook['author'] ?></td>
							</tr>
							<tr>
								<th colspan="1">Language</th><td colspan="2" class="ml-2"><?php echo $rowbook['language'] ?></td>
							</tr>
							<tr>
								<th colspan="1">Binding</th><td colspan="2" class="ml-2"><?php echo $rowbook['binding'] ?></td>
							</tr>
						</table>
					</div>
					<div class="col-sm-4 col-md-5 col-lg-5">
						<table>
							<tr>
								<th>Order ID</th><td><?php echo $row['order_id'] ?></td>
							</tr>
							<tr></tr>
							<tr>
								<th colspan="1">Payment</th><td colspan="2" class="ml-2"><?php echo $row['payment'] ?></td>
							</tr>
							<tr>
								<th colspan="1">Date</th><td colspan="2" class="ml-2"><?php echo $row['order_date'] ?></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="card-body">
					<a href="pages/delete-order.php?order_id=<?php echo $row['order_id'] ?>&user_id=<?php echo $user_id ?>" class="btn btn-sm btn-danger text-white float-right">Delete</a>
				</div>
			</div>
		</div>
		<?php
			}
		}else{
			echo '<div><p>You have not any order yet.</p></div>';
		}

		?>
	</div>
</div>

<!-- Start footer Area -->
<?php include('winclude/footer.php'); ?>