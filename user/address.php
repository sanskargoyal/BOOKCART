<?php
define('TITLE', 'Manage Address'); 
// define('PAGE', 'Book');
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
				<h1>Manage Address page</h1>
			</div>
		</div>
	</div>
</section>
<div class="container mt-5 mb-5">
	<h1 class="text-center">Manage Address</h1>
	<div class="row mt-4 justify-content-center">

		<div class="col-md-10">
			<div class="card shadow-lg p-4">
				<a href="#address" class="text-dark" data-toggle="collapse"><i class="fa fa-plus d-inline mr-2	"></i>Add Address</a>
			</div>
			<div id="address" class="collapse mt-4">
				<div class="card shadow-lg p-4">
					<form action="pages/add-address.php?user_id=<?php echo $myid ?>" method="POST">
						<div class="row">
							<div class="col-sm-10 col-md-6">
								<div class="form-group">
									<input type="text" name="fname" placeholder="Your First Name" class="form-control shadow-sm" required value="<?php echo $fname ?>">
								</div>
							</div>
							<div class="col-sm-10 col-md-6">
								<div class="form-group">
									<input type="text" name="lname" placeholder="Your Last Name" class="form-control shadow-sm" required value="<?php echo $lname ?>">
								</div>
							</div>
							<div class="col-sm-10 col-md-6">
								<div class="form-group">
									<input type="email" name="email" placeholder="Your Email" class="form-control shadow-sm" required value="<?php echo $email ?>" readonly>
								</div>
							</div>
							<div class="col-sm-10 col-md-6">
								<div class="form-group">
									<input type="text" name="mobile" placeholder="Your Mobile" class="form-control shadow-sm" required value="<?php echo $phone ?>">
								</div>
							</div>
							<div class="col-sm-10 col-md-12">
								<textarea class="form-control shadow-sm" rows="4" placeholder="Your Address" resize="none" required name="address"><?php echo $address ?></textarea>
							</div>
							<div class="col-sm-10 col-md-6 mt-3">
								<div class="form-group">
									<input type="text" name="city" placeholder="Your City" class="form-control shadow-sm" required value="<?php echo $city ?>">
								</div>
							</div>

							<div class="col-sm-10 col-md-6 mt-3">
								<div class="form-group">
									<input type="text" name="state" placeholder="Your State" class="form-control shadow-sm" required value="<?php echo $state ?>">
								</div>
							</div>
							<div class="col-sm-10 col-md-6">
								<div class="form-group">
									<select class="form-control shadow-sm" name="addtype" required>
										<option value="" selected disabled="">-Select Address Type-</option>
										<option value="Home">Home</option>
										<option value="Work">Work</option>
									</select>
								</div>
							</div>
							<div class="col-sm-10 col-md-6">
								<div class="form-group">
									<input type="text" name="locality" placeholder="Your Locality" class="form-control shadow-sm" required value="<?php echo $locality ?>">
								</div>
							</div>
							<button type="submit" name="submit" class="btn text-light ml-3 shadow-sm" style="background-color: #ff6c00">Submit</button>
							<button class="shadow-sm btn btn-dark text-light ml-2">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-10 mt-4">
			<div class="card shadow-sm p-4">
				<?php 
				include('../connection/config.php');

				$sql = "SELECT * FROM user_table WHERE user_id = '$myid'";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_array($result)){
						$fname = $row['fname'];
						$lname = $row['lname'];
						$email = $row['email'];
						$phone = $row['phone'];
						$address = $row['address'];
						$city = $row['city'];
						$state = $row['state'];
						$locality = $row['locality'];
						$addtype = $row['addtype'];

					}
				}else{

				}
				?>
				<span class="badge"><?php echo $addtype ?></span>
				<h5><?php echo $fname ?> <?php echo $lname ?> </h5>
				<p><?php echo $address ?></p>
				<p><?php echo $locality ?>, <?php echo $city ?>, <?php echo $state ?></p>
				<p><b><?php echo $phone ?></b>, <?php echo $email ?></p>
				<div class="card-body"><a href="#address" class="btn btn-sm btn-danger text-light float-right">Edit</a></div>
			</div>
		</div>

	</div>
</div>

<!-- Start footer Area -->
<?php include('winclude/footer.php'); ?>