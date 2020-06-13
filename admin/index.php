<?php define('TITLE', 'Dashboard');
define('PAGE', 'Dashboard') ?>
<!-- Header Start -->
<?php require 'winclude/head.php'; ?>

<!-- Sidebar Start -->
<?php require 'winclude/sidebar.php'; ?>

<!-- Navbar Start -->
<?php require 'winclude/navbar.php'; ?>

<?php include 'include/fetchrecords.php' ?>

<!-- Begin Page Content -->
<div class="container">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">ADMIN | Dashboard</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2" style="background-image: linear-gradient(to right, #313131,#6DADDB)">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Customer</div>
              <div class="h5 mb-0 font-weight-bold text-light"><?php echo $customer ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2"style="background-image: linear-gradient(to right, #009FFD,#2A2A72)">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Books </div>
              <div class="h5 mb-0 font-weight-bold text-light"><?php echo $book ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-book-open fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2" style="background-image: linear-gradient(to right,#28313B,#485461)">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Category</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-light"><?php echo $category ?></div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2"  style="background-image: linear-gradient(to right,#09203F,#537895
      )">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Orders</div>
            <div class="h5 mb-0 font-weight-bold text-light"><?php echo $orders ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-3">
  <div class="col-md-12">
    <div class="card shadow">
      <div class="card-header text-dark">Quick Action</div>
      <div class="card-body">
        <div class="row justify-content-center text-center">
          <div class="col-sm-12 col-lg-3">
            <a href="customer.php" class="text-dark" style="text-decoration: none"><i class="fa fa-users mr-2" style="color: red"></i>Add Customer</a>
          </div>
          <div class="col-sm-12 col-lg-3">
            <a href="books.php" class="text-dark" style="text-decoration: none"><i class="fa fa-book-open mr-2" style="color: red"></i> Add Books</a>
          </div>
          <div class="col-sm-12 col-lg-3">
            <a href="category.php" class="text-dark" style="text-decoration: none"><i class="fa fa-tags mr-2" style="color: red"></i> Add Category</a>
          </div>
          <div class="col-sm-12 col-lg-3">
            <a href="order.php" class="text-dark" style="text-decoration: none"><i class="fa fa-shopping-bag mr-2" style="color: red"></i> View Orders</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-5 mb-5">
  <div class="col-md-6">
    <div class="card shadow">
      <div class="card-header">Message</div>
      <div class="card-body">
        <?php 
        $sql = "SELECT * FROM contact_table LIMIT 10";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_array($result)){
            
            $email = $row['email'];
            $get = "SELECT * FROM user_table WHERE email = '$email'";
            $run = mysqli_query($conn, $get);
            $rowuser = mysqli_fetch_assoc($run);
            $avatar = $rowuser['avatar'];
        ?>

        <div class="row border-bottom mt-3">
          <div class="col-md-3">
            <?php 
            if($avatar){
              echo '<img class="img-profile rounded-circle" src="pages/profile_images/'.$avatar.'" style="border-radius: 50%; height: 50px;">';
            }else{
              echo '<img class="img-profile rounded-circle" src="../img/person.png" style="border-radius: 50%; height: 50px;">';
            }
            ?>
            
          </div>
          <div class="col-md-9">
            <p><b><?php echo $row['name'] ?></b><br>
              <?php echo $row['message'] ?></p>
             <p class="float-right" style="margin-top: -20px;"> <?php echo $row['cdate'] ?>
            </p>
            
          </div>
        </div>
        <?php
          }
        }else{
          echo '<p>No Message Found.</p>';
        }
        ?>
        <a href="message.php" class="btn btn-primary text-light form-control shadow mt-3">View All</a>
      </div>
    </div>
  </div>
    <div class="col-md-6">
    <div class="card shadow">
      <div class="card-header">Comments</div>
      <div class="card-body">
        <?php 
        $sql = "SELECT * FROM comments_table LIMIT 10";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_array($result)){
            
            $email = $row['email'];
            $get = "SELECT * FROM user_table WHERE email = '$email'";
            $run = mysqli_query($conn, $get);
            $rowuser = mysqli_fetch_assoc($run);
            $avatar = @$rowuser['avatar'];
        ?>

        <div class="row border-bottom mt-3">
          <div class="col-md-3">
            <?php 
            if($avatar){
              echo '<img class="img-profile rounded-circle" src="pages/profile_images/'.$avatar.'" style="border-radius: 50%; height: 50px;">';
            }else{
              echo '<img class="img-profile rounded-circle" src="../img/person.png" style="border-radius: 50%; height: 50px;">';
            }
            ?>
            
          </div>
          <div class="col-md-9">
            <p><b><?php echo $row['name'] ?></b><br>
              <?php echo $row['message'] ?></p>
             <p class="float-right" style="margin-top: -20px;"> <?php echo $row['post_date'] ?>
            </p>
            
          </div>
        </div>
        <?php
          }
        }else{
          echo '<p>No Message Found.</p>';
        }
        ?>
        <a href="comments.php" class="btn btn-primary text-light form-control shadow mt-3">View All</a>
      </div>

    </div>
  </div>
</div>




</div>




<!-- Footer Start -->
<?php require 'winclude/footer.php' ?>