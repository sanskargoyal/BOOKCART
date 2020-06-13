<?php define('TITLE', 'Review');
define('PAGE', 'Review') ?>
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
    <h1 class="h3 mb-0 text-gray-800">View reviews</h1>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-white shadow-lg">
        <div class="row">
          <div class="col-md-12">
           <div class="table-responsive p-4">
             <?php
             include '../connection/config.php';
             $sql = "SELECT * FROM review_table";
             $result = $conn->query($sql);

             if ($result->num_rows > 0) {
              print '
              <table id="dataTable" class="display table table-striped" style="width: 100%; cellspacing: 0;">
              <thead>
              <tr>
              <th>Review ID</th>
              <th>Email</th>
              <th>Review Date</th>
              <th>Review</th>
              <th>Book ID</th>
              <th>Status</th>
              <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
              <th>Review ID</th>
              <th>Email</th>
              <th>Review Date</th>
              <th>Review</th>
              <th>Book ID</th>
              <th>Status</th>
              <th>Action</th>
              </tr>
              </tfoot>
              <tbody>';

              while($row = mysqli_fetch_array($result)) {

               $status = $row['status'];
               if ($status == "Active") {
                 $review = '<p class="text-success">ACTIVE</p>';
                 $reviewl = '<a  class="dropdown-item" href="pages/make_review_in.php?id='.$row['review_id'].'">Make Inactive</a>';
               }else{
                 $review = '<p class="text-danger">INACTIVE</p>'; 
                 $reviewl = '<a  class="dropdown-item" href="pages/make_review_ac.php?id='.$row['review_id'].'">Make Active</a>';                         
               }
               print '
               <tr>
               <td>'.$row['review_id'].'</td>
               <td>'.$row['email'].'</td>
               <td>'.$row['post_date'].'</td>
               <td>'.$row['review'].'</td>
               <td>'.$row['book_id'].'</td>
               <td>'.$review.'</td>
               <td><div class="btn-group dropdown" role="group">
               <button type="button" class="btn btn-default dropdown-toggle border" data-toggle="dropdown" aria-expanded="false" style="outline:none;">
               Select Action
               <span class="caret"></span>
               </button>
               <ul class="dropdown-menu" role="menu">
               <li>'.$reviewl.'</li>
               <li><a  class="dropdown-item"'; ?> onclick = "return confirm('Drop <?php echo $row['first_name']; ?> ?')" <?php print ' href="pages/dropreview.php?id='.$row['review_id'].'">Drop Review</a></li>
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
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<!-- Footer Start -->
<?php require 'winclude/footer.php' ?>