<?php define('TITLE', 'Message');
define('PAGE', 'Message') ?>
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
    <h1 class="h3 mb-0 text-gray-800">View Message</h1>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-white shadow-lg">
        <div class="row">
          <div class="col-md-12">
           <div class="table-responsive p-4">
             <?php
             include '../connection/config.php';
             $sql = "SELECT * FROM contact_table";
             $result = $conn->query($sql);

             if ($result->num_rows > 0) {
              print '
              <table id="dataTable" class="display table table-striped" style="width: 100%; cellspacing: 0;">
              <thead>
              <tr>
              <th>Contact ID</th>
              <th>Email</th>
              <th>Message</th>
              <th>Status</th>
              <th>Date</th>
              <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
              <th>Contact ID</th>
              <th>Email</th>
              <th>Message</th>
              <th>Status</th>
              <th>Date</th>
              <th>Action</th>
              </tr>
              </tfoot>
              <tbody>';

              while($row = mysqli_fetch_array($result)) {

               $status = $row['status'];
               if ($status == "Active") {
                 $contact = '<p class="text-success">ACTIVE</p>';
                 $contactl = '<a  class="dropdown-item" href="pages/make_contact_in.php?id='.$row['contact_id'].'">Make Inactive</a>';
               }else{
                 $contact = '<p class="text-danger">INACTIVE</p>'; 
                 $contactl = '<a  class="dropdown-item" href="pages/make_contact_ac.php?id='.$row['contact_id'].'">Make Active</a>';                         
               }
               print '
               <tr>
               <td>'.$row['contact_id'].'</td>
               <td>'.$row['email'].'</td>
               <td>'.$row['message'].'</td>
               
               <td>'.$contact.'</td>
               <td>'.$row['cdate'].'</td>
               <td><div class="btn-group dropdown" role="group">
               <button type="button" class="btn btn-default dropdown-toggle border" data-toggle="dropdown" aria-expanded="false" style="outline:none;">
               Select Action
               <span class="caret"></span>
               </button>
               <ul class="dropdown-menu" role="menu">
               <li>'.$contactl.'</li>
               <li><a  class="dropdown-item"'; ?> onclick = "return confirm('Drop <?php echo $row['first_name']; ?> ?')" <?php print ' href="pages/dropcontact.php?id='.$row['contact_id'].'">Drop Contact</a></li>
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