<?php
include '..\connection.php';
session_start();

// Check if the invoice_id is provided in the URL
if (isset($_GET['invoice_id'])) {
    // Retrieve the invoice_id from the URL
    $invoice_id = $_GET['invoice_id'];

    // Assuming you have a function to fetch invoice data from the database
    // Adjust this query according to your database structure
    $query = "SELECT * FROM invoice inner join product using(invoice_id) WHERE invoice_id = $invoice_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $invoiceData = mysqli_fetch_assoc($result);

        // You can access invoice data like this:

        $invoiceNumber = $invoiceData['invoice_id'];
        $invoiceDate = $invoiceData['date'];
        $toName = $invoiceData['cname'];
        $toBusiness = $invoiceData['cbusiness'];
        $toAddress = $invoiceData['caddress'];
        $toEmail = $invoiceData['cemail'];
        $toPhone = $invoiceData['cmobile'];
        $fromname =$invoiceData['user_name'];
        $fromBusiness =$invoiceData['user_business'];
        $fromemail =$invoiceData['user_email'];
        $phone =$invoiceData['user_mobile'];
        $address =$invoiceData['user_address'];
        $other =$invoiceData['user_other_details'];
        $product =$invoiceData['product'];
        $quantity =$invoiceData['quantity'];
        $price =$invoiceData['price'];
        $amount_paid =$invoiceData['amount_paid'];
        $tax_type =$invoiceData['tax_type'];
        $tax =$invoiceData['tax'];
        $discount =$invoiceData['discount'];
        $due_date =$invoiceData['due_date'];
        $payment_terms =$invoiceData['payment_terms'];
        $po_number =$invoiceData['po_number'];
        $terms =$invoiceData['terms'];
        $notes =$invoiceData['note'];
        $gst=$invoiceData['user_gst'];
        $cgst = $invoiceData['cgst'];

        // ... and so on for other fields
    } else {
        // Handle the case when the invoice data is not found
        echo "Invoice not found.";
    }
} else {
    // Handle the case when invoice_id is not provided in the URL
    echo "Invoice ID not provided.";
}

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- Invoice 4 start -->
<div class="invoice-4 invoice-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner" id="invoice_wrapper">
                    <div class="invoice-top">
                        <div class="row">
                        <div class="col-sm-6">
                                    <div class="">
                                        <!-- logo started -->
                                <?php
                                $login_id = $_SESSION['id'];
                                $q = "SELECT logo FROM user WHERE id='$login_id'";
                                $res = select($q); 
                                ?>

                                        <div class=" p-3">
                                            <img src="http://localhost/invoice/<?php echo $res[0]['logo'] ?>" alt="logo" width="150">
                                        </div>
                                        <!-- logo ended -->
                                    </div>
                                </div>
                            <div class="col-sm-6 mt-5">
                                <div class="invoice text-end">
                                    <h1>Invoice</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-titel">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="invoice-number">
                                    <h3>Invoice Number: #<?php echo $invoiceNumber ?></h3>
                                </div>
                            </div>
                            <div class="col-sm-6 text-end">
                                <div class="invoice-date">
                                    <h3>Invoice Date: <?php echo $invoiceDate ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-info">
                        <div class="row">
                            <div class="col-sm-6 mb-30">
                                <div class="invoice-number">
                                    <h4 class="inv-title-1">Invoice From</h4>
                                    <p class="invo-addr-1">
                                    <?php echo $fromname ?> <br/>
                                    <?php echo $fromBusiness ?><br/>
                                    <?php echo $address ?> <br/>
                                    <?php echo $fromemail ?> <br>
                                    <?php echo $phone ?> <br>
                                    <?php echo $gst; ?> <br/>
                                    <?php echo $other ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-30">
                                <div class="invoice-number text-end">
                                    <h4 class="inv-title-1">Invoice To</h4>
                                    <p class="invo-addr-1">
                                    <?php echo $toName ?> <br/>
                                    <?php echo $toBusiness ?><br/>
                                    <?php echo $toAddress ?> <br/>
                                    <?php echo $toEmail ?> <br>
                                    <?php echo $toPhone; ?> <br/>
                                    <?php echo $cgst; ?> 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-30">
                                <h4 class="inv-title-1">Date</h4>
                                <p class="inv-from-1">Due Date: <?php echo $due_date ?></p>
                            </div>
                            <div class="col-sm-6 text-end mb-30">
                                <h4 class="inv-title-1">Other details</h4>
                                <p class="inv-from-1">Payment terms: <?php echo $payment_terms ?></p>
                                <p class="inv-from-1">P O number: <?php echo $po_number ?></p>

                            </div>
                        </div>
                    </div>
                    <div class="order-summary">
                        <div class="table-responsive">
                            <table class="table invoice-table">
                                <thead class="bg-active">
                                <tr>
                                    <th>Description</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-right">Totals</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $subtotal = 0;
                                    foreach($result as $res){

                                        $amount = $res['price'] * $res['quantity'];
                                        $subtotal += $amount
                                    ?>
                                <tr>
                                    <td>
                                        <div class="item-desc-1">
                                            <span><?php echo $res['product'] ?></span>
                                        </div>
                                    </td>
                                    <td class="text-center">₹<?php echo $res['price'] ?></td>
                                    <td class="text-center"><?php echo $res['quantity'] ?></td>
                                    <td class="text-right">₹ <?php echo $amount ?></td>
                                </tr>
                                <?php } ?>
                                
                                <tr>
                                    <td colspan="3" class="text-end">SubTotal</td>
                                    <td class="text-right">₹<?php echo $subtotal ?></td>
                                </tr>
                                <?php if ($discount != 0): ?>
                                <tr>
                                    <td colspan="3" class="text-end">Discount</td>
                                    <td class="text-right"><?php echo $discount ?>%</td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <td colspan="3" class="text-end"><?php echo $tax_type ?></td>
                                    <td class="text-right"><?php echo $tax ?>%</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end fw-bold">Grand Total</td>
                                    <td class="text-right fw-bold">₹<?php 
                                    $grandTotal = $subtotal - ($subtotal * $discount / 100) + ($subtotal * $tax / 100);
                                    echo $grandTotal;
                                    ?></td>
                                </tr>
                                <tr>
                                    <td colspan="" class="">Amount Paid</td>
                                    <td class="text-right ">₹<?php echo $amount_paid ?></td>
                                </tr>
                                <tr>
                                    <td colspan="" class="fw-bold">Balance due</td>
                                    <td class="text-right fw-bold">₹<?php
                                    $balance = $grandTotal - $amount_paid;
                                    echo $balance;
                                    ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="invoice-informeshon">
                        <div class="row">
                           
                            <div class="col-md-6 col-sm-6">
                                <div class="terms-and-condistions mb-30">
                                    <h3 class="inv-title-1">Terms and Conditions</h3>
                                    <p class="mb-0"><?php echo $terms ?></p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="nates mb-30">
                                    <h4 class="inv-title-1">Notes</h4>
                                    <p class="text-muted"><?php echo $notes ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="invoice-contact clearfix ">
                        <div class="row g-0 ">
                            <div class="col-lg-9 col-md-11 col-sm-12 text-center">
                                <div class="contact-info text-center">
                                    <a href=""><i class="fa fa-phone"></i> <?php echo $phone ?></a>
                                    <a href=""><i class="fa fa-envelope"></i> <?php echo $fromemail ?></a>
                                    <a href="" class="mr-0 d-none-580"><i class="fa fa-map-marker"></i> <?php echo $address ?></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="invoice-btn-section clearfix d-print-none">
                    <a href="javascript:window.print()" class="btn btn-lg btn-print">
                        <i class="fa fa-print"></i> Print Invoice
                    </a>
                    <a id="invoice_download_btn" class="btn btn-lg btn-download btn-theme">
                        <i class="fa fa-download"></i> Download Invoice
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Invoice 4 end -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jspdf.min.js"></script>
<script src="assets/js/html2canvas.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>
