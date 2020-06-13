
<!-- Start Header Area -->

<header class="header_area sticky-header">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light main_box">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<a class="navbar-brand logo_h" href="index.php" style="font-size: 30px; "><i class="fa fa-book mr-2 shadow-lg" style="color: #ff6c00"></i>BookCart</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
				<ul class="nav navbar-nav menu_nav ml-auto">
					<li class="nav-item <?php if(PAGE == 'Home') { echo 'active'; } ?>"><a class="nav-link" href="index.php">Home</a></li>
					<li class="nav-item <?php if(PAGE == 'About') { echo 'active'; } ?>"><a class="nav-link" href="about.php">About Us</a></li>

					<li class="nav-item submenu dropdown <?php if(PAGE == 'Book') { echo 'active'; } ?>">
						<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">Books</a>
						<ul class="dropdown-menu">
							<li class="nav-item"><a class="nav-link" href="bookscategory.php">All</a></li>
							<?php 
							include('../connection/config.php');
							$sql = "SELECT * FROM book_category";
							$result = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($result)){
								?>

								<li class="nav-item"><a class="nav-link" href="bookscategory.php?cat_id=<?php echo $row['category_id']  ?>"><?php echo $row['category'] ?></a></li>
								<?php
							}
							
							?>
						</ul>
					</li>
					<li class="nav-item  <?php if(PAGE == 'Contact') { echo 'active'; } ?>"><a class="nav-link" href="contact.php">Contact</a></li>
					<?php 
					if($_SESSION['login']){
						echo '<li class="nav-item submenu dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">'.$myfname.' '.$mylname.'</a>
						<ul class="dropdown-menu">
						<li class="nav-item"><a class="nav-link" href="myorders.php?user_id='.$myid.'">My Orders</a></li>
						<li class="nav-item"><a class="nav-link" href="address.php?user_id='.$myid.'">Manage Address</a></li>
						
						<li class="nav-item"><a class="nav-link" href="logout.php?user_id='.$myid.'">Log Out</a></li>

						</ul>
						</li>';
					}else{
						echo '<li class="nav-item"><a class="nav-link" href="contact.php">Login</a></li>';
					}
					?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="nav-item"><a href="cart.php?user_id=<?php echo $myid ?>" class="cart "><span class="ti-bag"></span></a></li>
					<!-- <li class="nav-item">
						<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
					</li> -->
				</ul>
			</div>
		</div>
	</nav>
</div>
<!-- <div class="search_input" id="search_input_box">
	<div class="container">
		<form class="d-flex justify-content-between" action="pages/search.php" method="POST">
			<input type="text" class="form-control" id="search_input" placeholder="Search Here" name="search">
			<button type="submit" class="btn" name="submit"></button>
			<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
		</form>
	</div>
</div> -->
</header>
	<!-- End Header Area -->
