<?php define('TITLE', 'Edit Customer');
 ?>
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
			$fname = $row['fname'];
			$lname = $row['lname'];
			$email = $row['email'];
			$phone = $row['phone'];
			
			$address = $row['address'];
      $city = $row['city'];
      $state = $row['state'];
      $addtype = $row['addtype'];
      $locality = $row['locality'];
			

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
    <h1 class="h3 mb-0 text-gray-800">Edit Customer - <?php echo $fname ?> <?php echo $lname ?></h1>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-white shadow-lg">
        <div class="row">
          <div class="col-md-12">
            <form action="pages/update_customer.php" method="POST" class="p-4" enctype="multipart/form-data">
               <div class="form-group">
            <label>Profile Picture</label>
            <input type="file" name="profile" class="form-control shadow-sm" autocomplete="off" required placeholder="Profile Picture" value="<?php echo $avatar ?> ">
          </div>
          <div class="form-group">
            <label>First Name</label>
            <input type="text" name="fname" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter First Name" value="<?php echo $fname ?> ">
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lname" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Last Name" value="<?php echo $lname ?> ">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Email" value="<?php echo $email ?> ">
          </div>

          <div class="form-group">
            <label>Mobile</label>
            <input type="text" name="mobile" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Mobile" value="<?php echo $phone ?> ">
          </div>
          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control shadow-sm" autocomplete="off" required name="address" style="resize: none" rows="4" placeholder="Enter Your Address"> <?php echo $address ?></textarea>
          </div>

          <div class="form-group">
            <label>City</label>
            <input type="text" name="city" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter City" value="<?php echo $city ?>">
          </div>
          <div class="form-group">
            <label>State</label>
            <input type="text" name="state" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter State" value="<?php echo $state ?>">
          </div>
          <div class="form-group">
            <label>Address Type</label>
            <select class="form-control shadow-sm" required name="addtype">
              <option value="" selected disabled>-Select Address Type-</option>
              <option value="Home">Home</option>
              <option value="Work">Work</option>
            </select>
          </div><div class="form-group">
            <label>Locality</label>
            <input type="text" name="locality" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Locality" value="<?php echo $locality ?>">
          </div>
          <input type="hidden" name="customer_id" value="<?php echo "$customer_id"; ?>">
          <button type="submit" name="submit" class="btn btn-primary text-white">Update</button>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<!-- Footer Start -->
<?php require 'winclude/footer.php' ?>