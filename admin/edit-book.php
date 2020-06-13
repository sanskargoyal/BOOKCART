<?php define('TITLE', 'Edit Book');
?>
<?php 
include('../connection/config.php');
?>
<?php 
if(isset($_GET['book_id'])){
	$book_id = mysqli_real_escape_string($conn, $_GET['book_id']);
	$sql = "SELECT * FROM book_table WHERE book_id = '$book_id'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result)){
			$title = $row['title'];
			$author = $row['author'];
			$edition = $row['edition'];
			$language = $row['language'];
			$binding = $row['binding'];
			$price = $row['price'];
			$description = $row['description'];
			$publisher = $row['publisher'];
			$genre = $row['genre'];
			$pages = $row['pages'];
			$availability = $row['availability'];
		}
	}else{
		echo '<script>location.href="books.php"</script>';
	}
}else{
	echo '<script>location.href="books.php"</script>';
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
    <h1 class="h3 mb-0 text-gray-800">Edit Book - <?php echo $title ?></h1>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-white shadow-lg">
        <div class="row">
          <div class="col-md-12">
           <form action="pages/update_book.php" method="POST" class="p-4" enctype="multipart/form-data">
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Title" value="<?php echo $title ?>">
          </div>
          <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Author" value="<?php echo $author ?>">
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
            <input type="text" name="edition" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Edition" value="<?php echo $edition ?>">
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Price" value="<?php echo $price ?>">
          </div>
          <div class="form-group">
            <label>Language</label>
            <input type="text" name="language" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Language" value="<?php echo $language ?>">
          </div>

          <div class="form-group">
            <label>Binding</label>
            <input type="text" name="binding" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Binding" value="<?php echo $binding ?>">
          </div>
          <div class="form-group">
            <label>Publisher</label>
            <input type="text" name="publisher" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Publisher" value="<?php echo $publisher ?>">
          </div>
          <div class="form-group">
            <label>Genre</label>
            <input type="text" name="genre" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Genre" value="<?php echo $genre ?>">
          </div>
          <div class="form-group">
            <label>Pages</label>
            <input type="text" name="pages" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Pages" value="<?php echo $pages ?>">
          </div>
          <div class="form-group">
            <label>Availability</label>
            <input type="text" name="availability" class="form-control shadow-sm" autocomplete="off" required placeholder="Enter Book Availability" value="<?php echo $availability ?>">
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control shadow-sm" autocomplete="off" name="description" required style="resize: none" rows="4" placeholder="Enter Book Description"><?php echo $description?></textarea>
          </div>
          <div class="form-group">
            <label>Status</label><br>
            <label>Active</label>
            <input type="radio"  name="status" value="Active" required>
            <label>Inactive</label>
            <input type="radio" name="status" value="Inactive" required>
          </div>
          <input type="hidden" name="book_id" value="<?php echo $book_id ?>">
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