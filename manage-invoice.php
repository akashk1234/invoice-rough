<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Manage invoices</title>
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
  
  
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $q="delete from invoice where invoice_id = '$id'";
    delete($q);
    $r="delete from product where invoice_id = '$id'";
    delete($r);

  }


  
  ?>


  <main id="main" class="main">

    

    <section class="section dashboard">
        <div class="row">

            <div class="col-lg-">
                <div class="row">

            
                    <div class="card">


                        <div class="card-body">



                  
                                  <div class="container text-center p-4"><h5 class="card-title">Manage Invoices</h5></div cla>
                    
                                  <!-- Table with hoverable rows -->
                                  <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Invoice ID</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Issue Date</th>
                                        <th scope="col">Due Date</th>
                                        <!-- <th scope="col">Payment Status</th> -->
                                        <th scope="col">Actions</th>

                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                      $q= "select * from invoice";
                                      $res = select($q);
                                      $i=1;

                                      foreach($res as $row){
                                      ?>
                                      <tr>
                                        <th scope="row"><?php echo $i++; ?></th>
                                        <td><?php echo $row['invoice_id'] ?></td>
                                        <td><?php echo $row['cname'] ?></td>
                                        <td><?php echo $row['date'] ?></td>
                                        <td><?php echo $row['due_date'] ?></td>
                                        <!-- <td><button type="button" class="btn btn-success btn-sm">&nbsp;Paid&nbsp;</button></td> -->
                                        <td>
                                            <a href="choose-invoice.php ?invoice_id=<?php echo $row['invoice_id'] ?>"><button type="button" class="btn btn-outline-primary"><i class="bi bi-file-earmark-arrow-down-fill"></i></button></a>
                                            <a href="?id=<?php echo $row['invoice_id'] ?> " onclick="return confirm('Are you sure you want to delete this invoice?');" ><button type="button" class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i></button></a>
                                        </td>
                                      </tr>
                                      <?php } ?>
                                      
                                      
                                      
                                    </tbody>
                                  </table>
                                  <!-- End Table with hoverable rows -->
                    
                              




  
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