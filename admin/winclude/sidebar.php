<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <!-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <i class="fa fa-book"></i>
    <div class="sidebar-brand-text mx-3"><b>BOOKCART</b></div>
  </a> -->
  <li class="nav-item active mt-4">
    <a class="nav-link sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
      <img class="img-profile rounded-circle" src="../img/person.png" style="height: 100px; width: 100px">
    </a>


  </li>
  <li class="nav-item active mt-2">
    <a class="nav-link sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
      <span><?php echo $myfname ?> <?php echo $mylname ?><br>
        <small class="ml-2">Administrator</small>
      </span>
    </a>


  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0 mt-2">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item  <?php if(PAGE == 'Dashboard') { echo 'active'; } ?>">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Customer -->
    <li class="nav-item <?php if(PAGE == 'Customer') { echo 'active'; } ?>">
      <a class="nav-link" href="customer.php">
        <i class="fas fa-users"></i>
        <span>Customer</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Books -->
      <li class="nav-item <?php if(PAGE == 'Book') { echo 'active'; } ?>">
        <a class="nav-link" href="books.php">
          <i class="fas fa-book-open"></i>
          <span>Books</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Category -->
        <li class="nav-item <?php if(PAGE == 'Category') { echo 'active'; } ?>">
          <a class="nav-link" href="category.php">
            <i class="fas fa-tags"></i>
            <span>Categories</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Orders -->
          <li class="nav-item  <?php if(PAGE == 'Order') { echo 'active'; } ?>">
            <a class="nav-link" href="order.php">
              <i class="fas fa-shopping-bag"></i>
              <span>Orders</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Comments -->
            <li class="nav-item <?php if(PAGE == 'Comment') { echo 'active'; } ?>">
              <a class="nav-link" href="comments.php">
                <i class="fas fa-comments"></i>
                <span>Comments</span></a>
              </li>

              <!-- Divider -->
              <hr class="sidebar-divider">

              <!-- Review -->
              <li class="nav-item  <?php if(PAGE == 'Review') { echo 'active'; } ?>">
                <a class="nav-link" href="review.php">
                  <i class="fas fa-reply-all"></i>
                  <span>Review</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Message -->
                <li class="nav-item  <?php if(PAGE == 'Message') { echo 'active'; } ?>">
                  <a class="nav-link" href="message.php">
                    <i class="fas fa-envelope-open"></i>
                    <span>Message</span></a>
                  </li>



                  <!-- Divider -->
                  <hr class="sidebar-divider d-none d-md-block">

                  <!-- Sidebar Toggler (Sidebar) -->
                  <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                  </div>

                </ul>
                <!-- End of Sidebar -->
