<?php
define('TITLE', 'BookCart'); 
define('PAGE', 'Home');
?>

<!-- Start Head Area -->
<?php include('winclude/head.php'); ?>

<!-- Start Header Area -->
<?php include('winclude/header.php'); ?>

<!-- Start Banner Area -->
<?php include('winclude/main-banner.php'); ?>
<!-- start features Area -->
<section class="features-area section_gap">
	<div class="container">
		<div class="row features-inner">
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="script/img/features/f-icon1.png" alt="">
					</div>
					<h6>Free Delivery</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="script/img/features/f-icon2.png" alt="">
					</div>
					<h6>Rent Policy</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="script/img/features/f-icon3.png" alt="">
					</div>
					<h6>24/7 Support</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="script/img/features/f-icon4.png" alt="">
					</div>
					<h6>Secure Payment</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end features Area -->

<!-- Start category Area -->
<section class="category-area">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-12">
				<div class="row">
					<div class="col-lg-8 col-md-8">
						<div class="single-deal">
							<div class="overlay"></div>
							<img class="img-fluid w-100" src="../img/novels.jpg" alt="novels">
							<a href="img/category/c1.jpg" class="img-pop-up" target="_blank">
								<div class="deal-details">
									<h6 class="deal-title">Novels</h6>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="single-deal">
							<div class="overlay"></div>
							<img class="img-fluid w-100" src="../img/kid.jpg" alt="kids" style="height:180px ">
							<a href="img/category/c2.jpg" class="img-pop-up" target="_blank">
								<div class="deal-details">
									<h6 class="deal-title">Book For Kids</h6>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="single-deal">
							<div class="overlay"></div>
							<img class="img-fluid w-100" src="../img/college.jpg" alt="" style="height: 180px">
							<a href="img/category/c3.jpg" class="img-pop-up" target="_blank">
								<div class="deal-details">
									<h6 class="deal-title">Books For College</h6>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-8 col-md-8">
						<div class="single-deal">
							<div class="overlay"></div>
							<img class="img-fluid w-100" src="../img/all.jpg" alt="college">
							<a href="bookscategory.php">
								<div class="deal-details">
									<h6 class="deal-title">All</h6>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="single-deal">
					<div class="overlay"></div>
					<img class="img-fluid w-100" src="../img/books.jpg" alt="" style="height: 400px;">
					<a href="img/category/c5.jpg" class="img-pop-up" target="_blank">
						<div class="deal-details">
							<h6 class="deal-title">Books On Rent</h6>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End category Area -->

<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-6 text-center">
			<div class="section-title">
				<h1>Latest Books</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
					dolore
				magna aliqua.</p>
			</div>
		</div>
	</div>
	<div class="row">

		<?php 
		include '../connection/config.php';
		$sql = "SELECT * FROM book_table LIMIT 10";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_array($result)){
				?>

				<div class="col-md-3">
					<div class="card shadow-lg">
						<img src="../admin/pages/product_images/<?php echo $row['image'] ?>">
					</div>
					<a href="book.php?book_id=<?php echo $row['book_id'] ?>"><h5 class="text-center m-3"><?php echo $row['title'] ?></h5></a>
					<small class="text-center ml-5"><?php echo $row['language'] ?>,<?php echo $row['binding'] ?>,<?php echo $row['author'] ?></small>
					<p class="text-center" style="font-size: 15px">Rs. <?php echo $row['price'] ?> &nbsp;&nbsp;&nbsp; <strike>Rs. 1000</strike></p>
				</div>
				<?php
			}
		}else{
			echo '<div><p>No Books Found.</p></div>';
		}
		$conn->close();
		?>

	</div>
	<a href="bookscategory.php" class="float-right text-dark" style="font-size: 20px;">More<i class="fa fa-chevron-right ml-2"></i></a>
</div>

<!-- 	 -->

<!-- Start brand Area -->
<section style="margin-top: 15%" class="mb-5">
	<div class="container">
		<div class="row">
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="../img/brand1.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="../img/brand2.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="../img/brand3.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="../img/brand4.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="../img/brand5.png" alt="">
			</a>
		</div>
	</div>
</section>
<!-- End brand Area -->
<!-- Start related-product Area -->
<section class="related-product-area section_gap_bottom mt-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 text-center">
				<div class="section-title">
					<h1>Simlar Product</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
					magna aliqua.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-9">
				<div class="row">
					<?php 
					include('../connection/config.php');
					$sql = "SELECT * FROM book_table LIMIT 9";
					$result = mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)>0){
						while($row= mysqli_fetch_array($result)){
					?>

					<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
						<div class="single-related-product d-flex">
							<a href="#"><img src="../admin/pages/product_images/<?php echo $row['image'] ?>" style="height: 100px; width: 80px" alt=""></a>
							<div class="desc">
								<a href="#" class="title"><?php echo $row['title'] ?></a>
								<div class="price">
									<h6>Rs. <?php echo $row['price'] ?></h6>
									<!-- <h6 class="l-through">Rs. 500</h6> -->
								</div>
							</div>
						</div>
					</div>
					<?php 
						}
					}else{
						echo '<div>No Books Found.</div>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End related-product Area -->







<!-- Start footer Area -->
<?php include('winclude/footer.php'); ?>