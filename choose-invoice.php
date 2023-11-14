



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


    <style>
        .hov:hover{
            transition-duration: 400ms;
            transform: scale(1.1);
        }
    </style>

</head>

<body>

    <?php include 'public-header.php' ?>


    <?php
// Retrieve the invoice_id from the URL
$id = isset($_GET['invoice_id']) ? $_GET['invoice_id'] : '';

// Use the retrieved $id in your SQL query
$q = "SELECT * FROM invoice WHERE invoice_id='$id'";
$res = select($q);

// Print the retrieved data for testing
// print_r($res);
?>







    <main id="main" class="main">



        <section class="section dashboard">

        <div class="container text-center">
             <input type="submit" action="action.php"  name="submit" value="Edit content" class="btn btn-primary w-50 me-3" id="add_btn"></a>
            </div>

            <div class="row mt-5">

                 <div class="col-lg-3">                   
                    <a href="main/invoice-6.php?invoice_id=<?php echo $id; ?>">
                        <div class="card hov">
                            <img src="assets/img/6.png" class="card-img-top" alt="...">
                        </div>
                    </a>
                </div>

                
                <div class="col-lg-3">                   
                    <a href="main/invoice-2.php?invoice_id=<?php echo $id; ?>">
                        <div class="card hov">
                            <img src="assets/img/2.png" class="card-img-top" alt="...">
                        </div>
                    </a>
                </div>
                
          
                <div class="col-lg-3">                   
                    <a href="main/invoice-5.php?invoice_id=<?php echo $id; ?>">
                        <div class="card hov">
                            <img src="assets/img/5.png" class="card-img-top" alt="...">
                        </div>
                    </a>
                </div>
                
                <div class="col-lg-3">                   
                    <a href="main/invoice-7.php?invoice_id=<?php echo $id; ?>">
                        <div class="card hov">
                            <img src="assets/img/7.png" class="card-img-top" alt="...">
                        </div>
                    </a>
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