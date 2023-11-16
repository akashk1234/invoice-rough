



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

  

<?php include 'public-header.php' ?>


  <main id="main" class="main">



    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-">
          <div class="row">


            <div class="card">


              <div class="card-body">


              <?php
              $i_id = $_GET['invoice_id'];
              
              $q = "select * from invoice where invoice_id= '$i_id'";
              $res = select($q);


              $login_id = $_SESSION['id'];

              $l = "select * from user where id = '$login_id'";
              $logo = select($l);
              
              ?>



                <form method="post" action="action-update.php"  id="add_form" >

                  <div class="row mb-4">
                    <div class="col-md-9 col-lg-9 mb-3">
                      <img src="<?php echo $logo[0]['logo'] ?>" alt="Logo" width="150">
                      <div class="pt-2">
                        
                      </div>
                    </div>









                    <div class="col-lg-3 col-md-3 mb-3">
                      <h5 class="card-title">INVOICE</h5>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                        <input type="text" name="invoice_id" value="<?php echo $res[0]['invoice_id'] ?>" class="form-control" id="invoiceId" required>
                      </div>
                    </div>


                  </div>


                  <div class="row">

                    <div class="col-lg-6 mb-3 card">

                      <h5 class="card-title">Who is this invoice from</h5>


                      <div class="form-floating mb-1">
                        <input type="text" name="user_name" value="<?php echo $res[0]['user_name'] ?>" class="form-control" id="floatingName"
                          placeholder="Your Name">
                        <label for="floatingName">Name</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="text" name="user_business" value="<?php echo $res[0]['user_business'] ?>" class="form-control"
                          id="floatingName" placeholder="Your Name">
                        <label for="floatingName">Business name</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="text" name="user_address" value="<?php echo $res[0]['user_address'] ?>" class="form-control"
                          id="floatingName" placeholder="Your Name">
                        <label for="floatingName">Address</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="email" name="user_email" value="<?php echo $res[0]['user_email'] ?>" class="form-control"
                          id="floatingName" placeholder="Your Name">
                        <label for="floatingName">Email</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="text" name="user_mobile" value="<?php echo $res[0]['user_mobile'] ?>" class="form-control"
                          id="floatingName" placeholder="Your Name">
                        <label for="floatingName">Mobile number</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="text" name="gst" value="<?php echo $res[0]['user_gst'] ?>" class="form-control" id="floatingName"
                          placeholder="GST">
                        <label for="floatingName">GST Number</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="text" name="user_other_details" value="<?php echo $res[0]['user_other_details'] ?>" class="form-control" id="floatingName" placeholder="Your Name">
                        <label for="floatingName">Other Details</label>
                      </div>


                    </div>




                    <div class="col-lg-6 mb-3 card">

                      <h5 class="card-title">Who is this invoice to</h5>


                      <div class="form-floating mb-1">
                        <input type="text" name="cname" value="<?php echo $res[0]['cname'] ?>" class="form-control" id="floatingName" placeholder="Your Name">
                        <label for="floatingName">Name</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="text" name="cbusiness" value="<?php echo $res[0]['cbusiness'] ?>" class="form-control" id="floatingName"
                          placeholder="Your Name">
                        <label for="floatingName">Business name</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="text" name="caddress" value="<?php echo $res[0]['caddress'] ?>" class="form-control" id="floatingName"
                          placeholder="Your Name">
                        <label for="floatingName">Address</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="email" name="cemail" value="<?php echo $res[0]['cemail'] ?>" class="form-control" id="floatingName"
                          placeholder="Your Name">
                        <label for="floatingName">Email</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="text" name="cmobile" value="<?php echo $res[0]['cmobile'] ?>" class="form-control" id="floatingName"
                          placeholder="Your Name">
                        <label for="floatingName">Mobile number</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="text" name="cgst" value="<?php echo $res[0]['cgst'] ?>" class="form-control" id="floatingName"
                          placeholder="GST">
                        <label for="floatingName">GST Number</label>
                      </div>

                     

                    </div>
              </div>




              <div class="row mb-3">
                <div class="col-md-3 col-lg-3 col-sm-6 mb-3">
                  <div class="form-floating">
                    <input type="date" name="date" value="<?php echo $res[0]['date'] ?>" class="form-control" id="floatingName" placeholder="Your Name">
                    <label for="floatingName">Date</label>
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-6 mb-3">
                  <div class="form-floating">
                    <input type="text" name="payment_terms" value="<?php echo $res[0]['payment_terms'] ?>" class="form-control" id="floatingName" placeholder="Your Name">
                    <label for="floatingName">Payment Terms</label>
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-6 mb-3">
                  <div class="form-floating">
                    <input type="date" name="due_date" value="<?php echo $res[0]['due_date'] ?>" class="form-control" id="floatingName" placeholder="Your Name">
                    <label for="floatingName">Due Date</label>
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-6 mb-3">
                  <div class="form-floating">
                    <input type="text" name="po_number" value="<?php echo $res[0]['po_number'] ?>" class="form-control" id="floatingName" placeholder="Your Name">
                    <label for="floatingName">PO Number</label>
                  </div>
                </div>
              </div>






<!-- ... Your HTML code ... -->
<div class="row mb-4">
  <table class="table">
    <thead>
      <tr>
        <th scope="col" class="text-center">Service</th>
        <th scope="col" class="text-center">Quantity</th>
        <th scope="col" class="text-center">Price</th>
        <th scope="col" class="text-center">Subtotal</th>
        <th scope="col" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody id="productTableBody">
    <?php 
$p = "select * from product where invoice_id = '$i_id'";
$r = select($p);
foreach ($r as $index => $row){
?>
 <tr>
    <td class="w-50"><textarea name="product[<?php echo $index; ?>]" class="form-control text-center" placeholder="Enter Product name or description" required><?php echo $row['product']; ?></textarea></td>
    <td><input type="number" name="quantity[<?php echo $index; ?>]" value="<?php echo $row['quantity']; ?>" class="form-control text-center" placeholder="Quantity"></td>
    <td><input type="number" name="price[<?php echo $index; ?>]" value="<?php echo $row['price']; ?>" class="form-control text-center" placeholder="Price"></td>
    <td>0.00</td>
    <td><input type="hidden" name="product_id[<?php echo $index; ?>]" value="<?php echo $row['product_id']; ?>"></td>
    <td><button type="button" class="btn btn-outline-danger add_item_btn">Add</button></td>
    <td><button type="button" class="btn btn-outline-danger remove_item_btn" data-row-index="<?php echo $index; ?>">Remove</button></td>
 </tr>
<?php } ?>




    </tbody>
  </table>
</div>

<!-- ... Your JavaScript code ... -->
<!-- ... Your JavaScript code ... -->
<script>
  $(document).ready(function () {
    // Calculate the initial row index based on the number of existing rows
    var rowIndex = <?php echo count($r); ?>;

$(document).on("click", ".add_item_btn", function (e) {
    e.preventDefault();

    // Increment the row index
    rowIndex++;

    // Generate a unique identifier for the new row
    var uniqueId = Date.now();

    // Update this line to include the correct product ID
    $("#productTableBody").append(`
        <tr data-row-id="${uniqueId}">
            <td class="w-50">
                <textarea name="product[${uniqueId}]" class="form-control text-center" placeholder="Enter Product name or description" required></textarea>
            </td>
            <td><input type="number" name="quantity[${uniqueId}]" class="form-control text-center" placeholder="Quantity"></td>
            <td><input type="number" name="price[${uniqueId}]" class="form-control text-center" placeholder="Price"></td>
            <td>0.00</td>
            <td>
                <input type="hidden" name="product_id[${uniqueId}]" value="">
                <button type="button" class="btn btn-outline-danger add_item_btn">Add</button>
                
            </td>
        </tr>`);

    // Remove the click event handler for all "Add" buttons
    $(".add_item_btn").off("click");

    // Rebind the click event handler for the newly added "Add" button
    $(".add_item_btn").on("click", function (e) {
        // Trigger the click event for the newly added "Add" button
        $(this).trigger("click");
    });
});




// Function to update product IDs for all rows
function updateProductIds() {
        $("#productTableBody tr").each(function (index) {
            $(this).find(`input[name^='product_id']`).attr('name', `product_id[${index}]`);
        });
    }

    // Call the function to update product IDs initially
    updateProductIds();

    $(document).on('click', '.remove_item_btn', function (e) {
        e.preventDefault();
        let row_item = $(this).closest("tr");
        $(row_item).remove();
        updateProductIds();
    });

    $("#add_form").submit(function (e) {
        e.preventDefault();
        $("#add_btn").val('Loading...');

        // Serialize the form data, including dynamically added rows
        var formData = new FormData(this);

        // Update product IDs in the formData
        updateProductIds();

        $.ajax({
            url: 'action-update.php',
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                // alert('Data passed successfully to action-update.php');

                var invoiceId = $('#invoiceId').val();
                console.log('Invoice ID:', invoiceId); // Log the invoice ID

                var subTotal = $('#secondTableSubtotal').val();

                // Redirect to choose-invoice.php with the invoice ID as a URL parameter
                window.location.href = 'choose-invoice.php?invoice_id=' + invoiceId;
            },
            error: function (error) {
                console.error('Error:', error);
                // alert('Error occurred while processing data.');
            }
});
    });
  });
</script>



<script>
  $(document).ready(function () {
    // Function to calculate and update subtotal for a specific row
    function updateRowSubtotal(row) {
      var quantity = parseFloat($(row).find('input[name^="quantity"]').val()) || 0;
      var price = parseFloat($(row).find('input[name^="price"]').val()) || 0;
      var rowSubtotal = quantity * price;
      $(row).find('td:eq(3)').text(rowSubtotal.toFixed(2));
      return rowSubtotal;
    }

    // Function to update the total and balance due
    function updateTotal() {
      var subtotal = 0;

      // Calculate subtotal for each row and update the table
      $("#productTableBody tr").each(function (index, row) {
        var rowSubtotal = updateRowSubtotal(row);
        subtotal += rowSubtotal;
      });

      // Calculate discount
      var discount = parseFloat($("#discountInput").val()) || 0;
      var discountedSubtotal = subtotal - (subtotal * (discount / 100));

      // Calculate tax
      var tax = parseFloat($("#taxInput").val()) || 0;
      var taxAmount = discountedSubtotal * (tax / 100);

      // Update total and balance due
      var total = discountedSubtotal + taxAmount;
      var amountPaid = parseFloat($("#amountPaidInput").val()) || 0;
      var balanceDue = total - amountPaid;

      $("#secondTableSubtotal").text(subtotal.toFixed(2));
      $("#total").text(total.toFixed(2));
      $("#balanceDue").text(balanceDue.toFixed(2));
    }

    // // Bind the click event for the "Add" button only once
    // $(".add_item_btn").unbind("click").click(function (e) {
    //   e.preventDefault();
    //   $("#productTableBody").append(`<tr>
    //     <td class="w-50"><textarea name="product[]" class="form-control text-center" placeholder="Enter Product name or description" required></textarea></td>
    //     <td><input type="number" name="quantity[]" class="form-control text-center" placeholder="Quantity"></td>
    //     <td><input type="number" name="price[]" class="form-control text-center" placeholder="Price"></td>
    //     <td>0.00</td>
    //     <td><button type="button" class="btn btn-outline-danger remove_item_btn">Remove</button></td>
    //   </tr>`);
      updateTotal(); // Update totals after adding a new row
    });

    // Remove item row when the "Remove" button is clicked
    $(document).on('click', '.remove_item_btn', function (e) {
      e.preventDefault();
      let row_item = $(this).parent().parent();
      $(row_item).remove();
      updateTotal(); // Update totals after removing a row
    });

    // Call the updateTotal function when inputs change
    $(document).on("input", 'input[name^="quantity"], input[name^="price"], #discountInput, #taxInput, #amountPaidInput', updateTotal);

    // Trigger the input event on page load to calculate subtotals
    $("input[name^='quantity'], input[name^='price']").trigger("input");
  });
</script>

              

            </div>

            




            <div class="row">
              <div class="col-lg-6 mb-3">
                <div class="form-floating mb-3">
                  <textarea class="form-control"  name="note" placeholder="Address" id="floatingTextarea"
                    style="height: 100px;"><?php echo $res[0]['note'] ?></textarea>
                  <label for="floatingTextarea">Notes</label>
                </div>

                <div class="form-floating">
                  <textarea class="form-control"  name="terms" placeholder="Address" id="floatingTextarea"
                    style="height: 100px;"><?php echo $res[0]['terms'] ?></textarea>
                  <label for="floatingTextarea">Terms</label>
                </div>
              </div>




              <div class="col-md-6 col-lg-6 col-sm-6">
                <div class="card">
                  <div class="card-body">

                    <!-- Table with hoverable rows -->
                    <table class="table table-hover">

                      <tbody>
                      <tr>
    <td>Subtotal</td>
    <td class="text-center">
        <input type="hidden" name="subtotal" id="secondTableSubtotalInput">
        <span id="secondTableSubtotal">0.0</span>
    </td>
</tr>

                        <tr>
  <td>Discount</td>
  <td><input type="text" name="discount" value="<?php echo $res[0]['discount'] ?>" class="form-control text-center" id="discountInput" placeholder="%"
      oninput="updateTotal()"></td>
</tr>
<tr>
  <td>
    <div class="row mb-3">
      <div class="col-sm-10">
        <select class="form-select" name="tax_type" aria-label="Default select example">
          <option selected>Tax</option>
          <option value="IGST">IGST</option>
          <option value="GST">GST</option>
          <option value="SGST">SGST</option>
        </select>
      </div>
    </div>
  </td>
  <td><input type="text" name="tax" value="<?php echo $res[0]['tax'] ?>" class="form-control text-center" id="taxInput" placeholder="%"
      ></td>
</tr>
<tr>
  <td class="fw-bold">Total</td>
  <td class="text-center" id="total"><input type="hidden" name="total" id="total"></td>
</tr>
<tr>
  <td>Amount paid</td>
  <td><input type="text" name="amount_paid" value="<?php echo $res[0]['amount_paid'] ?>" class="form-control text-center" id="amountPaidInput" placeholder="₹ 0"
      oninput="updateTotal()"></td>
</tr>
<tr>
  <td class="fw-bold">Balance Due</td>
  <td class="text-center" id="balanceDue"><input type="hidden" name="balance_due" id="balanceDue"></td>
</tr>

                      </tbody>
                    </table>


                    <!-- End Table with hoverable rows -->

                  </div>
                </div>

              </div>
            </div>

            <div class="container text-end">
              <a href="choose-invoice.php"><input type="submit" name="submit" value="Preview" class="btn btn-warning w-50 me-3" id="add_btn"></a>
            </div>



            </form><!-- End Profile Edit Form -->

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