<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $invoice_id = $_POST["invoice_id"];
    $product_ids = isset($_POST["product_id"]) ? $_POST["product_id"] : [];
    
    $conn = new mysqli('localhost', 'root', '', 'invoice');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $conn->begin_transaction();

    // Update invoice details
    $sql_update_invoice = "UPDATE invoice SET 
        user_name=?, 
        user_business=?, 
        user_address=?, 
        user_email=?, 
        user_mobile=?, 
        user_gst=?, 
        user_other_details=?, 
        cgst=?, 
        cname=?, 
        cbusiness=?, 
        caddress=?, 
        cemail=?, 
        cmobile=?, 
        date=?, 
        payment_terms=?, 
        due_date=?, 
        po_number=?, 
        note=?, 
        terms=?, 
        discount=?, 
        tax_type=?, 
        tax=?, 
        amount_paid=? 
        WHERE invoice_id=?";

    $stmt_update_invoice = $conn->prepare($sql_update_invoice);

    $stmt_update_invoice->bind_param(
        "ssssssssssssssssssssssss",
        $_POST['user_name'],
        $_POST['user_business'],
        $_POST['user_address'],
        $_POST['user_email'],
        $_POST['user_mobile'],
        $_POST['gst'],
        $_POST['user_other_details'],
        $_POST['cgst'],
        $_POST['cname'],
        $_POST['cbusiness'],
        $_POST['caddress'],
        $_POST['cemail'],
        $_POST['cmobile'],
        $_POST['date'],
        $_POST['payment_terms'],
        $_POST['due_date'],
        $_POST['po_number'],
        $_POST['note'],
        $_POST['terms'],
        $_POST['discount'],
        $_POST['tax_type'],
        $_POST['tax'],
        $_POST['amount_paid'],
        $invoice_id
    );

    echo "SQL Update Invoice: " . $sql_update_invoice . "<br>";
    $stmt_update_product->execute();

    if ($stmt_update_product->error) {
        echo "Error updating product details: " . $stmt_update_product->error;
    } else {
        echo "Data updated successfully for product with ID: $product_id<br>";
    }
}    
?>
