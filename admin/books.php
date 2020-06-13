<!-- Page Title -->
<?php define('TITLE', 'Book');
define('PAGE', 'Book') ?>

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
    <h1 class="h3 mb-0 text-gray-800">Manage Book</h1>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-white shadow-lg">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">Books</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab">Add Book</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-3">
          <div class="tab-pane container active" id="tab1">
            <div class="table-responsive">
             <?php
             include '../connection/config.php';
             $sql = "SELECT * FROM book_table";
             $result = $conn->query($sql);

             if ($result->num_rows > 0) {
              print '
              <table id="dataTable" class="display table table-striped" style="width: 100%; cellspacing: 0;">
              <thead>
              <tr>
              <th>Title</th>
              <th>Author</th>
              <th>Price</th>
              <th>Status</th>
              <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
              <th>Title</th>
              <th>Author</th>
              <th>Price</th>
              <th>Status</th>
              <th>Action</th>
              </tr>
              </tfoot>
              <tbody>';

              while($row = mysqli_fetch_array($result)) {

               $status = $row['status'];
               if ($status == "Active") {
                 $book = '<p class="text-success">ACTIVE</p>';
                 $bookl = '<a  class="dropdown-item" href="pages/make_book_in.php?id='.$row['book_id'].'">Make Inactive</a>';
               }else{
                 $book = '<p class="text-danger">INACTIVE</p>'; 
                 $bookl = '<a  class="dropdown-item" href="pages/make_book_ac.php?id='.$row['book_id'].'">Make Active</a>';                         
               }
               print '
               <tr>
               <td>'.$row['title'].'</td>
               <td>'.$row['author'].'</td>
               <td>'.$row['price'].'</td>
               <td>'.$book.'</td>
               <td><div class="btn-group dropdown" role="group">
               <button type="button" class="btn btn-default dropdown-toggle border" data-toggle="dropdown" aria-expanded="false" style="outline:none;">
               Select Action
               <span class="caret"></span>
               </button>
               <ul class="dropdown-menu" role="menu">
               <li>'.$bookl.'</li>
               <li><a class="dropdown-item" href="edit-book.php?book_id='.$row['book_id'].'">Edit Book</a></li>
               <li><a  class="dropdown-item" href="view-book.php?book_id='.$row['book_id'].'">View Book</a></li>
               <li><a  class="dropdown-item"'; ?> onclick = "return confirm('Drop <?php echo $row['first_name']; ?> ?')" <?php print ' href="pages/dropbook.php?id='.$row['book_id'].'">Drop Book</a></li>
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
        <form action="pages/add_book.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Title">
          </div>
          <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Author">
          </div>
          <div class="form-group">
            <label>Select Book Category</label>
            <select class="form-control shadow-sm" name="category_id" autocomplete="off" required="">
              <option value="" selected disabled>-Select Category-</option>
              <?php include '../connection/config.php';
              $sql = "SELECT * FROM book_category";
              $result = mysqli_query($conn, $sql);
              if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)){
                  echo '<option value="'.$row['category_id'].'">'.$row['category'].'</option>';
                }
              }
              else{

              }
              $conn->close();
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Image">
          </div>
          <div class="form-group">
            <label>Edition</label>
            <input type="text" name="edition" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Edition">
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Price">
          </div>
          <div class="form-group">
            <label>Language</label>
            <input type="text" name="language" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Language">
          </div>

          <div class="form-group">
            <label>Binding</label>
            <input type="text" name="binding" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Binding">
          </div>
          <div class="form-group">
            <label>Publisher</label>
            <input type="text" name="publisher" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Publisher">
          </div>
          <div class="form-group">
            <label>Genre</label>
            <input type="text" name="genre" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Genre">
          </div>
          <div class="form-group">
            <label>Pages</label>
            <input type="text" name="pages" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Pages">
          </div>
          <div class="form-group">
            <label>Availability</label>
            <input type="text" name="availability" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Availability">
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control shadow-sm" autocomplete="off" name="description" required style="resize: none" rows="4" placeholder="Enter Book Description"></textarea>
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