
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Invoice</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Add this link before the Bootstrap JavaScript link -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body>

    <?php include 'public-header.php'; 
      
      // Assuming $login_id is obtained from some source (e.g., user input or a session variable)
      $login_id = $_SESSION['id']; // Initialize $login_id with a value
                          
      $q = "SELECT * FROM user WHERE id='$login_id'";
      $res = select($q);
      
      ?>
      



    <main id="main" class="main">



    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card mb-4">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?php echo $res[0]['logo'] ?>" alt="Profile" class="">
              <h2><?php echo $res[0]['name'] ?></h2>
              <h3><?php echo $res[0]['business'] ?></h3>
              
            </div>


            <div class="tab-pane fade show  profile-overview container ms-4" >

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Name </div>
                    <div class="col-lg-9 col-md-8"><?php echo $res[0]['name'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Company</div>
                    <div class="col-lg-9 col-md-8"><?php echo $res[0]['business'] ?></div>
                  </div>

                

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $res[0]['address'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo $res[0]['mobile'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $res[0]['email'] ?></div>
                  </div>

                </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <!-- <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li> -->

              </ul>
              <div class="tab-content pt-2">


              
                
                  <!-- Profile Edit Form -->

                <div class="tab-pane fade profile-edit pt-3 show active" id="profile-edit">
                <?php


if (isset($_POST['update'])) {
    // Establish database connection
    $conn = mysqli_connect("localhost", "root", "", "invoice");

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Initialize variables for each field
    $update_image = false;
    $update_fullName = false;
    $update_company = false;
    $update_address = false;
    $update_email = false;
    $update_phone = false;

    // Check if an image is uploaded
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $dir = "assets/logo";
        $file = basename($_FILES['image']['name']);
        $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $target = $dir . uniqid("images_") . "." . $file_type;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $update_image = true;
        } else {
            echo "Image upload failed";
        }
    }

    // Check if other fields are updated
    if (!empty($_POST['fullName'])) {
        $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
        $update_fullName = true;
    }

    if (!empty($_POST['company'])) {
        $company = mysqli_real_escape_string($conn, $_POST['company']);
        $update_company = true;
    }

    if (!empty($_POST['address'])) {
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $update_address = true;
    }

    if (!empty($_POST['email'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $update_email = true;
    }

    if (!empty($_POST['phone'])) {
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $update_phone = true;
    }

    // Assuming you have a unique identifier for the user, replace 'user_id' with the actual column name
    $user_id = $_SESSION['id']; // Assuming you have a user session

    // Update each field individually
    if ($update_image) {
        $update_query = "UPDATE user SET logo = '$target' WHERE id = $user_id";
        mysqli_query($conn, $update_query);
    }

    if ($update_fullName) {
        $update_query = "UPDATE user SET name = '$fullName' WHERE id = $user_id";
        mysqli_query($conn, $update_query);
    }

    if ($update_company) {
        $update_query = "UPDATE user SET business = '$company' WHERE id = $user_id";
        mysqli_query($conn, $update_query);
    }

    if ($update_address) {
        $update_query = "UPDATE user SET address = '$address' WHERE id = $user_id";
        mysqli_query($conn, $update_query);
    }

    if ($update_email) {
        $update_query = "UPDATE user SET email = '$email' WHERE id = $user_id";
        mysqli_query($conn, $update_query);
    }

    if ($update_phone) {
        $update_query = "UPDATE user SET mobile = '$phone' WHERE id = $user_id";
        mysqli_query($conn, $update_query);
    }
    alert('Updated successfully!');
redirect('profile.php');
    // Close the database connection
    mysqli_close($conn);
}
?>




<!-- The rest of your HTML form here -->

                  <form method="post" enctype="multipart/form-data">
                  

                  <div class="row mb-3">
                      <label for="image" class="col-md-4 col-lg-3 col-form-label">Update logo</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="<?php echo $res[0]['logo'] ?>" alt="" width="150">
                        <input name="image" type="file" class="form-control" id="image" value="<?php echo $res[0]['logo'] ?>">
                      </div>
                    </div>

                    

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo $res[0]['name'] ?>">
                      </div>
                    </div>

                   

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="<?php echo $res[0]['business'] ?>">
                      </div>
                    </div>

                   

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="<?php echo $res[0]['address'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo $res[0]['mobile'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?php echo $res[0]['email'] ?>">
                      </div>
                    </div>

                    

                    <div class="text-center">
                      <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                    </div>


                  </form><!-- End Profile Edit Form -->

                </div>

                


                  <!-- Change Password Form -->

                <!-- <div class="tab-pane fade pt-3" id="profile-change-password">
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form>

                </div> -->
                <!-- End Change Password Form -->

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>


    </main><!-- End #main -->





    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span><a href="https://ictglobaltech.com/" style="color: inherit;">ICT Global
                        Tech</a></span></strong>. All Rights Reserved
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>