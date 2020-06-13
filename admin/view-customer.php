<?php define('TITLE', 'View Customer');
define('PAGE', 'Customer') ?>
<?php 
include('../connection/config.php');
?>
<?php 
if(isset($_GET['custid'])){
	$customer_id = mysqli_real_escape_string($conn, $_GET['custid']);
	$sql = "SELECT * FROM user_table WHERE user_id = '$customer_id'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result)){
			$avatar = $row['avatar'];
			$customer_id = $row['user_id'];
			$fname = $row['fname'];
			$lname = $row['lname'];
			
			$email = $row['email'];
			$phone = $row['phone'];
			$address = $row['address'];
			$city = $row['city'];
			$state = $row['state'];
			$locality = $row['locality'];
			$addtype = $row['addtype'];
			$status = $row['status'];

		}
	}
	else{
		echo '<script>location.href="customer.php"</script>';
	}
}else{
	echo '<script>location.href="customer.php"</script>';
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
		<h1 class="h3 mb-0 text-gray-800">View Customer - <?php echo $fname ?> <?php echo $lname ?></h1>
	</div>
	<div class="row">
		<div class="col-md-5">
			<div class="card card-white shadow-lg">
				<div class="col-md-6 justify-content-center py-3 px-4">
					<?php 
					if($avatar){
						echo '<img class="img-responsive" src="pages/profile_images/'.$avatar.'" style="height: 170px; width: 170px">';
					}else{
						echo '<img class="img-responsive" src="pages/profile_images/person.png" style="height: 170px; width: 170px">';

					}	
					?>

					
					
					
				</div>
				<table class="table">
					<tbody>
						<tr>
							<th class="p-4" scope="row">1</th>
							<td class="p-4">Registration Number</td>
							<td class="p-4"><b><?php echo "$customer_id"; ?></b></td>

						</tr>
						<tr>
							<th class="p-4" scope="row">2</th>
							<td class="p-4">First Name</td>
							<td class="p-4"><b><?php echo "$fname"; ?></b></td>

						</tr>
						<tr>
							<th class="p-4" scope="row">3</th>
							<td class="p-4">Last Name</td>
							<td class="p-4"><b><?php echo "$lname"; ?></b></td>

						</tr>
						<tr>
							<th class="p-4" scope="row">4</th>
							<td class="p-4">Address</td>
							<td class="p-4"><b><?php echo "$address"; ?></b></td>

						</tr>
						<tr>
							<th class="p-4" scope="row">5</th>
							<td class="p-4">City</td>
							<td class="p-4"><b><?php echo "$city"; ?></b></td>

						</tr>
						<tr>
							<th class="p-4" scope="row">6</th>
							<td class="p-4">State</td>
							<td class="p-4"><b><?php echo "$state"; ?></b></td>

						</tr>
						<tr>
							<th class="p-4" scope="row">7</th>
							<td class="p-4">Address Type</td>
							<td class="p-4"><b><?php echo "$addtype"; ?></b></td>

						</tr>
						<tr>
							<th class="p-4" scope="row">8</th>
							<td class="p-4">Locality</td>
							<td class="p-4"><b><?php echo "$locality"; ?></b></td>

						</tr>

						<tr>
							<th class="p-4" scope="row">9</th>
							<td class="p-4">Email Address</td>
							<td class="p-4"><b><?php echo "$email"; ?></b></td>

						</tr>
						<tr>
							<th class="p-4" scope="row">10	</th>
							<td class="p-4">Phone Number</td>
							<td class="p-4"><b><?php echo "$phone"; ?></b></td>

						</tr>
					</tbody>
				</table>
			</div>
		</div>
		

		<div class="col-md-7">
			<div class="card card-white shadow-lg">
				<h4 class="p-4"><?php echo $fname ?> has booked following orders so far : </h4>
				<div class="table-responsive p-4">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Order ID</th>
								<th>Payment Method</th>
								<th>Date</th>
								<th>Status<th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Order ID</th>
								<th>Payment Method</th>
								<th>Date</th>
								<th>Status<th>
									</tr>
								</tfoot>
								<tbody>
									<?php 
									$sql = "SELECT * FROM orders_table WHERE user_id = '$customer_id'";
									$result = mysqli_query($conn, $sql);
									if(mysqli_num_rows($result)>0){
										while($row = mysqli_fetch_array($result)){
											?>
											<tr>
												<td><?php echo $row['order_id'] ?></td>
												<td><?php echo $row['payment'] ?></td>
												<td><?php echo $row['order_date'] ?></td>
												<td><?php echo $row['status'] ?></td>
											</tr>
											<?php

										}
									}else{
										
									}

									?>
								</tbody>
							</table>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->

		<!-- Footer Start -->
		<?php require 'winclude/footer.php' ?>