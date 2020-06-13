<!-- Page Title -->
<?php define('TITLE', 'Book Category');
define('PAGE', 'Category') ?>

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
    <h1 class="h3 mb-0 text-gray-800">Manage Category</h1>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-white shadow-lg">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab">Add Category</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-3">
          <div class="tab-pane container active" id="tab1">
            <div class="table-responsive">
             <?php
             include '../connection/config.php';
             $sql = "SELECT * FROM book_category";
             $result = $conn->query($sql);

             if ($result->num_rows > 0) {
              print '
              <table id="dataTable" class="display table table-striped" style="width: 100%; cellspacing: 0;">
              <thead>
              <tr>
              <th>Category</th>
              <th>Status</th>
              <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
              <th>Category</th>
              <th>Status</th>
              <th>Action</th>
              </tr>
              </tfoot>
              <tbody>';

              while($row = mysqli_fetch_array($result)) {

               $status = $row['status'];
               if ($status == "Active") {
                 $cat = '<p class="text-success">ACTIVE</p>';
                 $catl = '<a  class="dropdown-item" href="pages/make_cat_in.php?id='.$row['category_id'].'">Make Inactive</a>';
               }else{
                 $cat = '<p class="text-danger">INACTIVE</p>'; 
                 $catl = '<a  class="dropdown-item" href="pages/make_cat_ac.php?id='.$row['category_id'].'">Make Active</a>';                         
               }
               print '
               <tr>
               <td>'.$row['category'].'</td>
               <td>'.$cat.'</td>
               <td><div class="btn-group dropdown" role="group">
               <button type="button" class="btn btn-default dropdown-toggle border" data-toggle="dropdown" aria-expanded="false" style="outline:none;">
               Select Action
               <span class="caret"></span>
               </button>
               <ul class="dropdown-menu" role="menu">
               <li>'.$catl.'</li>
               <li><a  class="dropdown-item"'; ?> onclick = "return confirm('Drop <?php echo $row['first_name']; ?> ?')" <?php print ' href="pages/dropcategory.php?id='.$row['category_id'].'">Drop Category</a></li>
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
        <form action="pages/add_category.php" method="POST">
          <div class="form-group">
            <label>Category</label>
            <input type="text" name="category" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Category">
          </div>
          <div class="form-group">
            <label>Status</label><br>
            <label>Active</label>
            <input type="radio"  name="status" value="Active" required>
            <label>Inactive</label>
            <input type="radio" name="status" value="Inactive" required>
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