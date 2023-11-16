
<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $invoice_id = $_POST["invoice_id"];
    $product_id = $_POST["product_id"];
    $conn = new mysqli('localhost', 'root', '', 'invoice');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $conn->begin_transaction();

    // Add your update logic here for each field
    // Example for user_name
    $sql_user_name = "UPDATE invoice SET user_name=? WHERE invoice_id=?";
    $stmt_user_name = $conn->prepare($sql_user_name);
    $stmt_user_name->bind_param("si", $_POST['user_name'], $invoice_id);
    $stmt_user_name->execute();

    $sql_user_business = "UPDATE invoice SET user_business=? WHERE invoice_id=?";
    $stmt_user_business = $conn->prepare($sql_user_business);
    $stmt_user_business->bind_param("si", $_POST['user_business'], $invoice_id);
    $stmt_user_business->execute();

    $sql_user_address = "UPDATE invoice SET user_address=? WHERE invoice_id=?";
    $stmt_user_address = $conn->prepare($sql_user_address);
    $stmt_user_address->bind_param("si", $_POST['user_address'], $invoice_id);
    $stmt_user_address->execute();

    $sql_user_email = "UPDATE invoice SET user_email=? WHERE invoice_id=?";
    $stmt_user_email = $conn->prepare($sql_user_email);
    $stmt_user_email->bind_param("si", $_POST['user_email'], $invoice_id);
    $stmt_user_email->execute();

    $sql_user_mobile = "UPDATE invoice SET user_mobile=? WHERE invoice_id=?";
    $stmt_user_mobile = $conn->prepare($sql_user_mobile);
    $stmt_user_mobile->bind_param("si", $_POST['user_mobile'], $invoice_id);
    $stmt_user_mobile->execute();

    $sql_gst = "UPDATE invoice SET user_gst=? WHERE invoice_id=?";
    $stmt_gst = $conn->prepare($sql_gst);
    $stmt_gst->bind_param("si", $_POST['gst'], $invoice_id);
    $stmt_gst->execute();

    $sql_user_other_details = "UPDATE invoice SET user_other_details=? WHERE invoice_id=?";
    $stmt_user_other_details = $conn->prepare($sql_user_other_details);
    $stmt_user_other_details->bind_param("si", $_POST['user_other_details'], $invoice_id);
    $stmt_user_other_details->execute();

    $sql_cgst = "UPDATE invoice SET cgst=? WHERE invoice_id=?";
    $stmt_cgst = $conn->prepare($sql_cgst);
    $stmt_cgst->bind_param("si", $_POST['cgst'], $invoice_id);
    $stmt_cgst->execute();

    $sql_cname = "UPDATE invoice SET cname=? WHERE invoice_id=?";
    $stmt_cname = $conn->prepare($sql_cname);
    $stmt_cname->bind_param("si", $_POST['cname'], $invoice_id);
    $stmt_cname->execute();

    $sql_cbusiness = "UPDATE invoice SET cbusiness=? WHERE invoice_id=?";
    $stmt_cbusiness = $conn->prepare($sql_cbusiness);
    $stmt_cbusiness->bind_param("si", $_POST['cbusiness'], $invoice_id);
    $stmt_cbusiness->execute();

    $sql_caddress = "UPDATE invoice SET caddress=? WHERE invoice_id=?";
    $stmt_caddress = $conn->prepare($sql_caddress);
    $stmt_caddress->bind_param("si", $_POST['caddress'], $invoice_id);
    $stmt_caddress->execute();

    $sql_cemail = "UPDATE invoice SET cemail=? WHERE invoice_id=?";
    $stmt_cemail = $conn->prepare($sql_cemail);
    $stmt_cemail->bind_param("si", $_POST['cemail'], $invoice_id);
    $stmt_cemail->execute();

    $sql_cmobile = "UPDATE invoice SET cmobile=? WHERE invoice_id=?";
    $stmt_cmobile = $conn->prepare($sql_cmobile);
    $stmt_cmobile->bind_param("si", $_POST['cmobile'], $invoice_id);
    $stmt_cmobile->execute();

    $sql_date = "UPDATE invoice SET date=? WHERE invoice_id=?";
    $stmt_date = $conn->prepare($sql_date);
    $stmt_date->bind_param("si", $_POST['date'], $invoice_id);
    $stmt_date->execute();

    $sql_payment_terms = "UPDATE invoice SET payment_terms=? WHERE invoice_id=?";
    $stmt_payment_terms = $conn->prepare($sql_payment_terms);
    $stmt_payment_terms->bind_param("si", $_POST['payment_terms'], $invoice_id);
    $stmt_payment_terms->execute();

    $sql_due_date = "UPDATE invoice SET due_date=? WHERE invoice_id=?";
    $stmt_due_date = $conn->prepare($sql_due_date);
    $stmt_due_date->bind_param("si", $_POST['due_date'], $invoice_id);
    $stmt_due_date->execute();

    $sql_po_number = "UPDATE invoice SET po_number=? WHERE invoice_id=?";
    $stmt_po_number = $conn->prepare($sql_po_number);
    $stmt_po_number->bind_param("si", $_POST['po_number'], $invoice_id);
    $stmt_po_number->execute();

    $sql_note = "UPDATE invoice SET note=? WHERE invoice_id=?";
    $stmt_note = $conn->prepare($sql_note);
    $stmt_note->bind_param("si", $_POST['note'], $invoice_id);
    $stmt_note->execute();

    $sql_terms = "UPDATE invoice SET terms=? WHERE invoice_id=?";
    $stmt_terms = $conn->prepare($sql_terms);
    $stmt_terms->bind_param("si", $_POST['terms'], $invoice_id);
    $stmt_terms->execute();

    $sql_discount = "UPDATE invoice SET discount=? WHERE invoice_id=?";
    $stmt_discount = $conn->prepare($sql_discount);
    $stmt_discount->bind_param("si", $_POST['discount'], $invoice_id);
    $stmt_discount->execute();

    $sql_tax_type = "UPDATE invoice SET tax_type=? WHERE invoice_id=?";
    $stmt_tax_type = $conn->prepare($sql_tax_type);
    $stmt_tax_type->bind_param("si", $_POST['tax_type'], $invoice_id);
    $stmt_tax_type->execute();

    $sql_tax = "UPDATE invoice SET tax=? WHERE invoice_id=?";
    $stmt_tax = $conn->prepare($sql_tax);
    $stmt_tax->bind_param("si", $_POST['tax'], $invoice_id);
    $stmt_tax->execute();

    $sql_amount_paid = "UPDATE invoice SET amount_paid=? WHERE invoice_id=?";
    $stmt_amount_paid = $conn->prepare($sql_amount_paid);
    $stmt_amount_paid->bind_param("si", $_POST['amount_paid'], $invoice_id);
    $stmt_amount_paid->execute();
    
    $product_ids = $_POST['product_id'];
    $products = $_POST['product'];
    $quantities = $_POST['quantity'];
    $prices = $_POST['price'];

    foreach ($product_ids as $index => $product_id) {
        $product = $products[$index];
        $quantity = $quantities[$index];
        $price = $prices[$index];

        if (!empty($product_id)) {
            // Update existing product
            $stmt_product = $conn->prepare("UPDATE product SET product=?, quantity=?, price=? WHERE product_id=?");
            $stmt_product->bind_param("sddi", $product, $quantity, $price, $product_id);
            $stmt_product->execute() or die("Error updating product: " . $stmt_product->error);
        } else {
            // Insert new product
            $stmt_product = $conn->prepare("INSERT INTO product (invoice_id, product, quantity, price) VALUES (?, ?, ?, ?)");
            $stmt_product->bind_param("isdd", $invoice_id, $product, $quantity, $price);
            $stmt_product->execute() or die("Error inserting product: " . $stmt_product->error);
            
            // Get the auto-generated product ID for the newly inserted row
            $product_id = $stmt_product->insert_id;

            echo "Data inserted successfully for new product with ID $product_id<br>";
        }
}
    $conn->commit();

    $conn->close();`    
}
?>

