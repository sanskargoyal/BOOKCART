<?php define('TITLE', 'Comments');
define('PAGE', 'Comment') ?>
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
    <h1 class="h3 mb-0 text-gray-800">View Comments</h1>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-white shadow-lg">
        <div class="row">
          <div class="col-md-12">
           <div class="table-responsive p-4">
             <?php
             include '../connection/config.php';
             $sql = "SELECT * FROM comments_table";
             $result = $conn->query($sql);

             if ($result->num_rows > 0) {
              print '
              <table id="dataTable" class="display table table-striped" style="width: 100%; cellspacing: 0;">
              <thead>
              <tr>
              <th>Comment ID</th>
              <th>Email</th>
              <th>Comment Date</th>
              <th>Comments</th>
              <th>Book ID</th>
              <th>Status</th>
              <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
              <th>Comment ID</th>
              <th>Email</th>
              <th>Comment Date</th>
              <th>Comments</th>
              <th>Book ID</th>
              <th>Status</th>
              <th>Action</th>
              </tr>
              </tfoot>
              <tbody>';

              while($row = mysqli_fetch_array($result)) {

               $status = $row['status'];
               if ($status == "Active") {
                 $comment = '<p class="text-success">ACTIVE</p>';
                 $commentl = '<a  class="dropdown-item" href="pages/make_comment_in.php?id='.$row['comment_id'].'">Make Inactive</a>';
               }else{
                 $comment = '<p class="text-danger">INACTIVE</p>'; 
                 $commentl = '<a  class="dropdown-item" href="pages/make_comment_ac.php?id='.$row['comment_id'].'">Make Active</a>';                         
               }
               print '
               <tr>
               <td>'.$row['comment_id'].'</td>
               <td>'.$row['email'].'</td>
               <td>'.$row['post_date'].'</td>
               <td>'.$row['message'].'</td>
               <td>'.$row['book_id'].'</td>
               <td>'.$comment.'</td>
               <td><div class="btn-group dropdown" role="group">
               <button type="button" class="btn btn-default dropdown-toggle border" data-toggle="dropdown" aria-expanded="false" style="outline:none;">
               Select Action
               <span class="caret"></span>
               </button>
               <ul class="dropdown-menu" role="menu">
               <li>'.$commentl.'</li>
               <li><a  class="dropdown-item"'; ?> onclick = "return confirm('Drop <?php echo $row['first_name']; ?> ?')" <?php print ' href="pages/dropcomment.php?id='.$row['comment_id'].'">Drop Comment</a></li>
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