<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Update Customer</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

</head>

<body>

  <?php include 'public-header.php'; 
  
  $id = $_GET['id'];
  if(isset($_POST['update'])){
    extract($_POST);
    $q = "update client set name='$name', business='$business', address='$address', email='$email', mobile='$mobile' where id='$id'";
    update($q); 
    redirect('manage-customers.php');
  }
  ?>

  <main id="main" class="main">

    

    <section class="section dashboard">
        <div class="row">

            <div class="col-lg-">
                <div class="row">

            
                    <div class="card">


                        <div class="card-body ">


                  
                            <div class="container text-center p-4"><h5 class="card-title">Update customer details</h5></div>


                            <div class="container p-5">
                              <?php 

                              
                              $q="select * from client where id='$id'";
                              $res = select($q);

                              ?>
                                <form method="post">
                                    <div class="form-floating mb-4">
                                     <input type="text" name="name" class="form-control" id="floatingName" value="<?php echo $res[0]['name'] ?>">
                                     <label for="floatingName">Name</label>
                                    </div>
            
                                    <div class="form-floating mb-4">
                                      <input type="text" name="business" class="form-control" id="floatingName" value="<?php echo $res[0]['business'] ?>">
                                      <label for="floatingName">Business name</label>
                                    </div>
            
                                    <div class="form-floating mb-4">
                                      <input type="text" name="address" class="form-control" id="floatingName" value="<?php echo $res[0]['address'] ?>">
                                      <label for="floatingName">Address</label>
                                    </div>
            
                                    <div class="form-floating mb-4">
                                      <input type="email" name="email" class="form-control" id="floatingName" value="<?php echo $res[0]['email'] ?>">
                                      <label for="floatingName">Email</label>
                                    </div>
            
                                    <div class="form-floating mb-5">
                                      <input type="text" name="mobile" class="form-control" id="floatingName" value="<?php echo $res[0]['mobile'] ?>">
                                      <label for="floatingName">Mobile number</label>
                                    </div> 

                                    <div class="text-center">
                                        <button type="submit" name="update" class="btn btn-primary">Update Details <i class="bi bi-pen"></i></button>
                                    </div>
                            
                                </form>
                            </div>
                              




  
                        </div>
                    </div>
            

            

            

                </div>
            </div>



        </div>

    </section>

  </main><!-- End #main -->





  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span><a href="https://ictglobaltech.com/" style="color: inherit;">ICT Global Tech</a></span></strong>. All Rights Reserved
    </div>
    
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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