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

<?php 
include('../connection/config.php');
$id = $_GET['book_id'];
$sql = "SELECT * FROM book_table WHERE book_id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$category_id = $row['book_category_id'];


// $cat = "SELECT * FROM book_category WHERE category_id = '$category_id'";
// $cat_res = mysqli_query($conn, $cat);
// $cat_row = mysqli_fetch_array($cat_res);
// $category = $cat_row['category'];

?>

<div class="product_image_area mt-5">
	<div class="container mt-5">
		<div class="row s_product_inner">
			<div class="col-lg-6">
				<div class="single-prd-item">
					<img class="img-fluid" src="../admin/pages/product_images/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>" style="height: 500px; width: 350px;">
				</div>
					<!-- <div class="s_Product_carousel">
						
						<div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div>
					</div> -->
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?php echo $row['title'] ?></h3>
						<h2>Rs. <?php echo $row['price'] ?></h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Author</span> : <?php echo $row['author'] ?></a></li>
							<!-- <li><a href="#"><span>Availibility</span> : In Stock</a></li> -->
						</ul>
						<div class="product_count mt-5">
							<?php
							$id = $_GET['book_id'];
							?>
							<form action="pages/add-cart.php?book_id=<?php echo "$id" ?>&user_id=<?php echo $myid ?>" method="POST">
							<div class="form-group">
								<label for="qty">Quantity:</label>
							<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							class="increase items-count" type="button"><i class="fa fa-chevron-up mt-1"></i></button>
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
								class="reduced items-count" type="button"><i class="fa fa-chevron-down mb-4"></i></button>
							</div>
							</div>
							<div class="form-group">
								<button class="primary-btn" type="submit" name="add" style="border: none; outline: none">Add to Cart</button>
							</div>
							
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--================End Single Product Area =================-->

		<!--================Product Description Area =================-->
		<section class="product_description_area">
			<div class="container">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
						aria-selected="false">Specification</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
						aria-selected="false">Comments</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
						aria-selected="false">Reviews</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
						<p><?php echo $row['description'] ?></p>
					</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="table-responsive">
							<table class="table">
								<tbody>
									<tr>
										<td>
											<h5>Title</h5>
										</td>
										<td>
											<h5><?php echo $row['title'] ?></h5>
										</td>
									</tr>
									<tr>
										<td>
											<h5>Author</h5>
										</td>
										<td>
											<h5><?php echo $row['author'] ?></h5>
										</td>
									</tr>
									<tr>
										<td>
											<h5>Edition</h5>
										</td>
										<td>
											<h5><?php echo $row['edition'] ?></h5>
										</td>
									</tr>
									<tr>
										<td>
											<h5>Language</h5>
										</td>
										<td>
											<h5><?php echo $row['language'] ?></h5>
										</td>
									</tr>
									<tr>
										<td>
											<h5>Binding</h5>
										</td>
										<td>
											<h5><?php echo $row['binding'] ?></h5>
										</td>
									</tr>
									<tr>
										<td>
											<h5>Publisher</h5>
										</td>
										<td>
											<h5><?php echo $row['publisher'] ?></h5>
										</td>
									</tr>
									<tr>
										<td>
											<h5>Genre</h5>
										</td>
										<td>
											<h5><?php echo $row['genre'] ?></h5>
										</td>
									</tr>
									<tr>
										<td>
											<h5>Pages</h5>
										</td>
										<td>
											<h5><?php echo $row['pages'] ?></h5>
										</td>
									</tr>
								</tbody>
							</table>
							<?php $conn->close(); ?>
						</div>
					</div>
					<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
						<div class="row">
							<div class="col-lg-6">
								<div class="comment_list">
									<?php 
									include('../connection/config.php');
									$id = $_GET['book_id'];
									$sql = "SELECT * FROM comments_table WHERE book_id = '$id' LIMIT 3";
									$result = mysqli_query($conn, $sql);
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result)){
											?>

											<div class="review_item">
												<div class="media">
													<div class="d-flex">
														<img class="img-profile rounded-circle" style="border-radius: 50%; height: 50px;" src="../img/person.png" alt="">
													</div>
													<div class="media-body">
														<h4><?php echo $row['name'] ?></h4>
														<h5><?php echo $row['post_date'] ?></h5>
													</div>
												</div>
												<p><?php echo $row['message'] ?></p>
											</div>
											<?php
										}
									}
									else{
										echo '<div><p>No Comments Found.</p></div>';
									}
									?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="review_box">
									<h4>Post a comment</h4>
									<?php 
									$id = $_GET['book_id'];
									$conn->close();
									?>
									<form class="row contact_form" action="pages/add-comment.php?book_id=<?php echo "$id" ?>" method="post" id="contactForm" novalidate="novalidate">
										<div class="col-md-12">
											<div class="form-group">
												<input type="text" class="form-control" id="name" name="name" placeholder="Your Full name">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<input type="text" class="form-control" id="number" name="number" placeholder="Phone Number">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
											</div>
										</div>
										<div class="col-md-12 text-right">
											<button type="submit" value="submit" class="btn primary-btn" name="submit">Submit Now</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
						<div class="row">
							<div class="col-lg-6">
								<div class="row total_rate">
									<div class="col-6">
										<div class="box_total">
											<h5>Overall</h5>
											<h4>4.0</h4>
											<h6>(03 Reviews)</h6>
										</div>
									</div>
									<div class="col-6">
										<div class="rating_list">
											<h3>Based on 3 Reviews</h3>
											<ul class="list">
												<li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
													<li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
														class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
														<li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
															class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
															<li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
																class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
																<li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
																	class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
																</ul>
															</div>
														</div>
													</div>
													<?php 
													include('../connection/config.php');
													$id = $_GET['book_id'];
													$sql = "SELECT * FROM review_table WHERE book_id = '$id' LIMIT 3";
													$result = mysqli_query($conn, $sql);
													if(mysqli_num_rows($result)>0){
														while($row = mysqli_fetch_array($result)){
															?>
															<div class="review_list mt-2">
																<div class="review_item">
																	<div class="media">
																		<div class="d-flex">
																			<img class="img-profile rounded-circle" style="border-radius: 50%; height: 50px;" src="../img/person.png" alt="">
																		</div>
																		<div class="media-body">
																			<h4><?php echo $row['name'] ?></h4>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																		</div>
																	</div>
																	<p><?php echo $row['review'] ?></p>
																</div>
															</div>
															<?php 
														}}else{
															echo '<div><p>No Review Found</p></div>';
														}
														$conn->close();

														?>
													</div>
													<div class="col-lg-6">
														<div class="review_box">
															<h4>Add a Review</h4>
															<?php 
															$id = $_GET['book_id'];
															?>
															<form class="row contact_form" action="pages/add-review.php?book_id=<?php echo "$id" ?>" method="post" id="contactForm" novalidate="novalidate">
																<p>Your Rating:</p>
																<ul class="list">
																	<li><a href="#"><i class="fa fa-star"></i></a></li>
																	<li><a href="#"><i class="fa fa-star"></i></a></li>
																	<li><a href="#"><i class="fa fa-star"></i></a></li>
																	<li><a href="#"><i class="fa fa-star"></i></a></li>
																	<li><a href="#"><i class="fa fa-star"></i></a></li>
																</ul>

																<div class="col-md-12 mt-3">
																	<div class="form-group">
																		<input type="text" class="form-control" id="name" name="name" placeholder="Your Full name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Full name'">
																	</div>
																</div>
																<div class="col-md-12">
																	<div class="form-group">
																		<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
																	</div>
																</div>
																<div class="col-md-12">
																	<div class="form-group">
																		<input type="text" class="form-control" id="number" name="number" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'">
																	</div>
																</div>
																<div class="col-md-12">
																	<div class="form-group">
																		<textarea class="form-control" name="message" id="message" rows="1" placeholder="Review" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Review'"></textarea></textarea>
																	</div>
																</div>
																<div class="col-md-12 text-right">
																	<button type="submit" value="submit" class="primary-btn" name="submitr">Submit Now</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</section>
								<!--================End Product Description Area =================-->
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