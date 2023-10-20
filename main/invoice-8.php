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

<!-- Invoice 8 start -->
<div class="invoice-8 invoice-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner clearfix">
                    <div class="invoice-info clearfix" id="invoice_wrapper">
                        <div class="invoice-headar border-shadow-bg">
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
                                <div class="col-sm-6">
                                    <div class="invoice-contact-us mt-5">
                                        <h1>Contact Us</h1>
                                        <ul class="link">
                                            <li>
                                                <i class="fa fa-map-marker"></i> <?php echo $address ?>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope"></i> <a href=""><?php echo $fromemail ?></a>
                                            </li>
                                            <li>
                                                <i class="fa fa-phone"></i> <a href=""><?php echo $phone ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-top border-shadow-bg">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h1 class="invoice-name">Invoice</h1>
                                </div>
                                <div class="col-sm-6 mb-30">
                                    <div class="invoice-number-inner">
                                        <h2 class="name">Invoice No: #<?php echo $invoiceNumber ?></h2>
                                        <p class="mb-0">Invoice Date: <span><?php echo $invoiceDate ?></span></p>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-30">
                                    <div class="invoice-number">
                                        <h4 class="inv-title-1">Invoice From</h4>
                                        <h2 class="name mb-10"><?php echo $fromname ?></h2>
                                        <p class="invo-addr-1 mb-0">
                                        <?php echo $fromBusiness ?> <br/>
                                        <?php echo $address ?> <br/>
                                        <?php echo $fromemail ?> <br/>
                                        <?php echo $phone ?> <br>
                                        <?php echo $gst; ?> <br/>
                                        <?php echo $other ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-30">
                                    <div class="invoice-number">
                                        <div class="invoice-number-inner">
                                            <h4 class="inv-title-1">Invoice To</h4>
                                            <h2 class="name mb-10"><?php echo $toName ?></h2>
                                            <p class="invo-addr-1 mb-0">
                                            <?php echo $toBusiness ?> <br/>
                                            <?php echo $toAddress ?> <br/>
                                            <?php echo $toEmail ?> <br/>
                                            <?php echo $toPhone; ?> <br/>
                                            <?php echo $cgst; ?>  
                                            
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-center border-shadow-bg">
                            <div class="order-summary">
                                <div class="table-outer">
                                    <table class="default-table invoice-table">
                                        <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                            <?php 
                                            $subtotal = 0;
                                            foreach($result as $res){
                                                $amount = $res['price'] * $res['quantity'];
                                                $subtotal += $amount;
                                            ?>
                                        <tr>
                                            <td><?php echo $res['product'] ?></td>
                                            <td>₹<?php echo $res['price'] ?> </td>
                                            <td><?php echo $res['quantity'] ?></td>
                                            <td><?php echo $amount ?></td>
                                        </tr>
                                        <?php } ?>
                                        
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><strong>Subtotal</strong></td>
                                            <td><strong><?php echo $subtotal ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $tax_type ?></td>
                                            <td></td>
                                            <td></td>
                                            <td><?php echo $tax ?>%</td>
                                        </tr>
                                        <?php if ($discount != 0): ?>
                                        <tr>
                                            <td>Discount</td>
                                            <td></td>
                                            <td></td>
                                            <td><?php echo $discount ?>%</td>
                                        </tr>
                                        <?php endif; ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><strong>Grand Total</strong></td>
                                            <td><strong>₹<?php 
                                            $grandTotal = $subtotal - ($subtotal*$discount/100) + ($subtotal*$tax/100);
                                            echo $grandTotal
                                            ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>Amount Paid</td>
                                            <td>₹<?php echo $amount_paid ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><strong>Balance Due</strong></td>
                                            <td><strong>₹<?php 
                                            $balance = $grandTotal - $amount_paid;
                                            echo $balance;
                                            ?></strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-bottom border-shadow-bg bsb2">
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-7">
                                    <div class="terms-conditions mb-30">
                                        <h3 class="inv-title-1 mb-10">Terms & Conditions</h3>
                                        <?php echo $terms ?>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5">
                                    <div class="payment-method mb-30">
                                        <h3 class="inv-title-1 mb-10">Other Details</h3>
                                        <ul class="payment-method-list-1 text-14">
                                            <li><strong>Due date:</strong> <?php echo $due_date ?></li>
                                            <li><strong>Payment terms:</strong> <?php echo $payment_terms ?></li>
                                            <li><strong>P O Number:</strong> <?php echo $po_number ?></li>
                                            <li><strong>Notes :</strong> <?php echo $notes ?></li>

                                        </ul>
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
</div>
<!-- Invoice 8 end -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jspdf.min.js"></script>
<script src="assets/js/html2canvas.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>