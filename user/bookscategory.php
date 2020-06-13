<?php
define('TITLE', 'Books'); 
define('PAGE', 'Book');
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
				<h1>Shop Category page</h1>
				<nav class="d-flex align-items-center">
					<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
					<a href="category.html">Book Category</a>
				</nav>
			</div>
		</div>
	</div>
</section>
<div class="container mt-5">
	<div class="row">
		<div class="col-xl-3 col-lg-4 col-md-5">
			<div class="sidebar-categories shadow-lg">
				<div class="head shadow-sm"><a data-toggle="collapse" aria-expanded="false" class="text-light" href="#categories" aria-controls="category">Browse Categories</a></div>
				<ul class="main-categories" id="categories" data-toggle="collapse" aria-expanded="false" aria-controls="category">
					<li class="main-nav-list child"><a href="bookscategory.php">All</a></li>
					<?php 
					include('../connection/config.php');
					$sql = "SELECT * FROM book_category";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_array($result)){
						?>
						<li class="main-nav-list child"><a href="bookscategory.php?cat_id=<?php echo $row['category_id'] ?>"><?php echo $row['category'] ?></a></li>
					<?php } ?>
					<li class="main-nav-list child">
						<a href="">Price
							<div class="price-range-area ">
								<div id="price-range"></div>
								<div class="value-wrapper d-flex justify-content-center">
									<div class="price">Price:</div>
									<span>$</span>
									<div id="lower-value"></div>
									<div class="to">to</div>
									<span>$</span>
									<div id="upper-value"></div>
								</div>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-xl-9 col-lg-8 col-md-7">
			<!-- Start Best Seller -->
			<div class="row">

				<?php 
				include '../connection/config.php';
				// $cat_id = mysqli_real_escape_string($conn, $_GET['cat_id']);
				if(@$cat_id = mysqli_real_escape_string($conn, $_GET['cat_id'])){

				$sql = "SELECT * FROM book_table WHERE book_category_id = '$cat_id'";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_array($result)){
						?>

						<div class="col-md-4">
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
			}else{
				$sql = "SELECT * FROM book_table";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_array($result)){
						?>

						<div class="col-md-4">
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
			}
			?>
			
			</div>
		</div>
	</div>
</div>

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