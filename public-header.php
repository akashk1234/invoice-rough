<?php include 'connection.php';

session_start();

// Check if the user is not logged in (no active session)
if (!isset($_SESSION['id'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit; // Terminate the script to prevent further execution
}


// Assuming $login_id is obtained from some source (e.g., user input or a session variable)
$login_id = $_SESSION['id']; // Initialize $login_id with a value
                    
$q = "SELECT * FROM user WHERE id='$login_id'";
$res = select($q);

?>





<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.php" class="logo d-flex align-items-center">
    <img src="assets/img/favicon.png" alt="">
    <span class="d-none d-lg-block">Invoice Generator</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->



<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">







    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="<?php echo $res[0]['logo'] ?>" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $res[0]['name'] ?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?php echo $res[0]['name'] ?></h6>
          <span><?php echo $res[0]['business'] ?></span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="profile.php">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>



        <li>
          <a class="dropdown-item d-flex align-items-center" href="logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->



<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php">
      <i class="bi bi-journal-text"></i>
      <span>Create Invoice</span>
    </a>
  </li>
  <hr>

  <li class="nav-item">
    <a class="nav-link collapsed" href="manage-invoice.php">
      <i class="bi bi-card-list"></i>
      <span>Manage Invoice</span>
    </a>
  </li>
  <hr>

  <li class="nav-item">
    <a class="nav-link collapsed" href="add-customer.php">
      <i class="bi bi-person"></i>
      <span>Add customer</span>
    </a>
  </li>
  <hr>

  <li class="nav-item">
    <a class="nav-link collapsed" href="manage-customers.php">
      <i class="bi bi-people"></i>
      <span>Manage Customer</span>
    </a>
  </li>



  <!-- <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi-menu-button-wide"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="forms-elements.html">
          <i class="bi bi-circle"></i><span>Add product+</span>
        </a>
      </li>
      <li>
        <a href="forms-layouts.html">
          <i class="bi bi-circle"></i><span>Manage Product</span>
        </a>
      </li>
      
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-people"></i><span>Customers</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="tables-general.html">
          <i class="bi bi-circle"></i><span>Add Customer</span>
        </a>
      </li>
      <li>
        <a href="tables-data.html">
          <i class="bi bi-circle"></i><span>Manage Customer</span>
        </a>
      </li>
    </ul>
  </li> -->











</ul>

</aside><!-- End Sidebar-->