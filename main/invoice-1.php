<?php include '..\connection.php';
session_start();
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
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- Invoice 1 start -->
<div class="invoice-1 invoice-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner clearfix">
                    <div class="invoice-info clearfix" id="invoice_wrapper">
                    <?php
// Include your database connection file
include_once '..\connection.php';

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
        $fromname=$invoiceData['user_name'];
        $fromBusiness=$invoiceData['user_business'];
        $fromemail=$invoiceData['user_email'];
        $phone=$invoiceData['user_mobile'];
        $address=$invoiceData['user_address'];
        $other=$invoiceData['user_other_details'];
        $product=$invoiceData['product'];
        $quantity=$invoiceData['quantity'];
        $price=$invoiceData['price'];
        $amount_paid=$invoiceData['amount_paid'];
        $tax_type=$invoiceData['tax_type'];
        $tax=$invoiceData['tax'];
        $discount=$invoiceData['discount'];
        $due_date=$invoiceData['due_date'];
        $payment_terms=$invoiceData['payment_terms'];
        $po_number=$invoiceData['po_number'];
        $terms=$invoiceData['terms'];
        $notes=$invoiceData['note'];
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
                        <div class="invoice-headar">
                            <div class="row g-0">
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
                                <div class="col-sm-6 invoice-id">
                                    <div class="info">
                                        <h1 class="color-white inv-header-1">Invoice</h1>
                                        <p class="color-white mb-1">Invoice Number <span>#<?php echo $invoice_id; ?></span></p>
                                        <p class="color-white mb-0">Invoice Date <span><?php echo $invoiceDate; ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-top">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="invoice-number mb-30">
                                        <h4 class="inv-title-1">Invoice From</h4>
                                        <h2 class="name mb-10"><?php echo $fromname; ?></h2>
                                        
                                        <p class="invo-addr-1">
                                            <?php echo $fromBusiness; ?> <br/>
                                            <?php echo $address; ?> <br/>
                                            <?php echo $fromemail; ?> <br/>
                                            <?php echo $phone; ?> <br/>
                                            <?php echo $gst; ?> <br/>
                                            <?php echo $other; ?> 
                                            <!-- Add other fields as needed -->
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- Add similar code for "Invoice From" here -->
                                    <div class="invoice-number mb-30">
                                        <h4 class="inv-title-1">Invoice To</h4>
                                        <h2 class="name mb-10"><?php echo $toName; ?></h2>
                                        <p class="invo-addr-1">
                                            <?php echo $toBusiness; ?> <br/>
                                            <?php echo $toAddress; ?> <br/>
                                            <?php echo $toEmail; ?> <br/>
                                            <?php echo $toPhone; ?> <br/>
                                            <?php echo $cgst; ?> 
                                            <!-- Add other fields as needed -->
                                        </p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-center">
                            <!-- Add table and other invoice data here -->
                            <div class="table-responsive">
                                <table class="table mb-0 table-striped invoice-table">
                                <thead class="bg-active">
                                    <tr class="tr">
                                        <th>No.</th>
                                        <th class="pl0 text-start">Item Description</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-end">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $subtotal=0;
                                    $i = 1;
                                    foreach($result as $res) {
                                        $amount = $res['quantity'] * $res['price']; // Calculate the amount for each item
                                        $subtotal += $amount;
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td class="pl0"><?php echo $res['product'];?></td>
                                            <td class="text-center"><?php echo $res['quantity'];?></td>
                                            <td class="text-center"><?php echo $res['price'];?></td>
                                            <td class="text-end"><?php echo $amount; ?></td> <!-- Display the calculated amount -->
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>

                                    

                                    <tr class="tr2">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center f-w-600 active-color">Sub Total</td>
                                        <td class="f-w-600 text-end active-color"><?php echo $subtotal ?></td>
                                    </tr>
                                    <tr class="tr2">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center"><?php echo $tax_type ?></td>
                                        <td class="text-end"><?php echo $tax ?>%</td>
                                    </tr>
                                    <?php if ($discount != 0): ?>
                                        <tr class="tr2">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">Discount</td>
                                            <td class="text-end"><?php echo $discount; ?>%</td>
                                        </tr>
                                    <?php endif; ?>

                                    <tr class="tr2">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center f-w-600 active-color">Grand Total</td>
                                        <td class="f-w-600 text-end active-color"><?php
                                            // Calculate the grand total
                                            $grandTotal = $subtotal - ($subtotal * $discount / 100) + ($subtotal * $tax / 100);
                                            echo $grandTotal;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="tr2">
                                        
                                        <td class="text-center">Amount Paid</td>
                                        <td class="text-end "><?php echo $amount_paid ?></td>
                                    </tr>
                                    <tr class="tr2">
                                        
                                        <td class="text-center f-w-600 active-color">Balance Due</td>
                                        <td class="f-w-600 text-end active-color"><?php 
                                        // calculate the balance due
                                        $balance = $grandTotal - $amount_paid;
                                        echo $balance;
                                        ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="invoice-bottom">
                            <!-- Add terms, payment method, and contact info here -->
                            <div class="row">
                                <div class="col-lg-6 col-md-8 col-sm-7">
                                    <div class="mb-30 dear-client">
                                        <h3 class="inv-title-1">Terms & Conditions</h3>
                                        <p><?php echo $terms; ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-4 col-sm-5">
                                    <div class="mb-30 payment-method">
                                        <h3 class="inv-title-1">Other Details</h3>
                                        <ul class="payment-method-list-1 text-14">
                                            <li><strong>Due date:</strong> <?php echo $due_date ?></li>
                                            <li><strong>Payment terms: </strong> <?php echo $payment_terms ?></li>
                                            <li><strong>P O number:</strong> <?php echo $po_number ?></li>
                                            <li><strong>Notes:</strong> <?php echo $notes ?></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-contact ">
                            <!-- Add contact information here -->
                            <div class="row g-0">
                                <div class="col-lg-9 col-md-11 col-sm-12">
                                    <div class="contact-info">
                                        <a href="tel:+55-4XX-634-7071"><i class="fa fa-phone"></i> <?php echo $phone; ?></a>
                                        <a href="tel:info@themevessel.com"><i class="fa fa-envelope"></i> <?php echo $fromemail; ?></a>
                                        <a href="tel:info@themevessel.com" class="mr-0 d-none-580"><i class="fa fa-map-marker"></i> <?php echo $address; ?></a>
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

<!-- Invoice 1 end -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jspdf.min.js"></script>
<script src="assets/js/html2canvas.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>
