<?php
include 'connection.php';
print_r($_SERVER['REQUEST_METHOD']);
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Extract form data
    $invoice_id = $_POST["invoice_id"];
    
    

    // Initialize a connection to the database
    $conn = new mysqli('localhost', 'root', '', 'invoice');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Begin a transaction
    $conn->begin_transaction();

    // Insert data into your invoice table
    $sql_invoice = "INSERT INTO invoice (invoice_id, user_name, user_business, user_address, user_email, user_mobile, user_gst, user_other_details,cgst, cname, cbusiness, caddress, cemail, cmobile, date, payment_terms, due_date, po_number, note, terms, discount, tax_type, tax, amount_paid, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending')";
$stmt_invoice = $conn->prepare($sql_invoice);

// Update the "d" in the bind_param to indicate a double (floating-point) data type
$stmt_invoice->bind_param("isssssssssssssssssssssdd", $invoice_id, $_POST['user_name'], $_POST['user_business'], $_POST['user_address'], $_POST['user_email'], $_POST['user_mobile'], $_POST['gst'], $_POST['user_other_details'], $_POST['cgst'], $_POST['cname'], $_POST['cbusiness'], $_POST['caddress'], $_POST['cemail'], $_POST['cmobile'], $_POST['date'], $_POST['payment_terms'], $_POST['due_date'], $_POST['po_number'], $_POST['note'], $_POST['terms'], $_POST['discount'], $_POST['tax_type'], $_POST['tax'], $_POST['amount_paid']);


    if ($stmt_invoice->execute()) {
        // Inserted successfully, now insert dynamic rows data
        foreach ($_POST['product'] as $index => $product) {
            $quantity = $_POST['quantity'][$index];
            $price = $_POST['price'][$index];
            
            $sql_product = "INSERT INTO product (invoice_id, product, quantity, price) VALUES (?, ?, ?, ?)";
            $stmt_product = $conn->prepare($sql_product);
            $stmt_product->bind_param("isdd", $invoice_id, $product, $quantity, $price);
            if (!$stmt_product->execute()) {
                $conn->rollback();
                echo "Error in executing statement: " . $stmt_product->error;
                exit;
            } else {
                echo "Data inserted successfully for row $index<br>";
            }
        }
        

        // Commit the transaction
        $conn->commit();
        
        echo "Data inserted successfully.";
    } else {
        $conn->rollback();
        echo "Error in executing statement: " . $stmt_invoice->error;
    }

    // Close the database connection
    $conn->close();
}
?>