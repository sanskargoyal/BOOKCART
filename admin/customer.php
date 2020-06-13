<!-- Page Title -->
<?php define('TITLE', 'Customer');
define('PAGE', 'Customer') ?>

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
    <h1 class="h3 mb-0 text-gray-800">Manage Customer</h1>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-white shadow-lg">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">Customer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab">Add Customer</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-3">
          <div class="tab-pane container active" id="tab1">
            <div class="table-responsive">
             <?php
             include '../connection/config.php';
             $sql = "SELECT * FROM user_table WHERE role = 'user'";
             $result = $conn->query($sql);

             if ($result->num_rows > 0) {
              print '
              <table id="dataTable" class="display table table-striped" style="width: 100%; cellspacing: 0;">
              <thead>
              <tr>
              <th>Name</th>
              <th>Mobile</th>
              <th>Status</th>
              <th>Email</th>
              <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
              <th>Name</th>
              <th>Mobile</th>
              <th>Status</th>
              <th>Email</th>
              <th>Action</th>
              </tr>
              </tfoot>
              <tbody>';

              while($row = mysqli_fetch_array($result)) {

               $status = $row['status'];
               if ($status == "Active") {
                 $cust = '<p class="text-success">ACTIVE</p>';
                 $custl = '<a  class="dropdown-item" href="pages/make_customer_in.php?id='.$row['user_id'].'">Make Inactive</a>';
               }else{
                 $cust = '<p class="text-danger">INACTIVE</p>'; 
                 $custl = '<a  class="dropdown-item" href="pages/make_customer_ac.php?id='.$row['user_id'].'">Make Active</a>';                         
               }
               print '
               <tr>
               <td>'.$row['fname'].' '.$row['lname'].'</td>
               <td>'.$row['phone'].'</td>
               <td>'.$cust.'</td>
               <td>'.$row['email'].'</td>
               <td><div class="btn-group dropdown" role="group">
               <button type="button" class="btn btn-default dropdown-toggle border" data-toggle="dropdown" aria-expanded="false" style="outline:none;">
               Select Action
               <span class="caret"></span>
               </button>
               <ul class="dropdown-menu" role="menu">
               <li>'.$custl.'</li>
               <li><a class="dropdown-item" href="edit-customer.php?custid='.$row['user_id'].'">Edit Customer</a></li>
               <li><a  class="dropdown-item" href="view-customer.php?custid='.$row['user_id'].'">View Customer</a></li>
               <li><a  class="dropdown-item"'; ?> onclick = "return confirm('Drop <?php echo $row['first_name']; ?> ?')" <?php print ' href="pages/dropcustomer.php?id='.$row['user_id'].'">Drop Customer</a></li>
               </ul>
               </div></td>

               </tr>';
             }

             print '
             </tbody>
             </table>  ';
           } else {
            print '
            <div class="alert alert-info" role="alert">
            Nothing was found in database.
            </div>';

          }
          $conn->close();

          ?>
        </div>
      </div>
      <div class="tab-pane container fade" id="tab2">
        <form action="pages/add_customer.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Profile Picture</label>
            <input type="file" name="profile" class="form-control shadow-sm" autocomplete="off" placeholder=" Profile Picture">
          </div>
          <div class="form-group">
            <label>First Name</label>
            <input type="text" name="fname" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter First Name">
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lname" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Last Name">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Email">
          </div>

          <div class="form-group">
            <label>Mobile</label>
            <input type="text" name="mobile" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Mobile">
          </div>
          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control shadow-sm" autocomplete="off" required name="address" style="resize: none" rows="4" placeholder="Enter Your Address"></textarea>
          </div>
          <div class="form-group">
            <label>City</label>
            <input type="text" name="city" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter City">
          </div>
          <div class="form-group">
            <label>State</label>
            <input type="text" name="state" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter State">
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
            <input type="text" name="locality" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Locality">
          </div>
          <button type="submit" name="submit" class="btn btn-primary text-white">Submit</button>
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