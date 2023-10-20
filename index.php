
<?php
session_start();

// Check if the user is not logged in (no active session)
if (!isset($_SESSION['id'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit; // Terminate the script to prevent further execution
}
?>


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



                <form method="post" id="add_form" >

                  <div class="row mb-4">
                    <div class="col-md-9 col-lg-9 mb-3">
                      <img src="<?php echo $res[0]['logo'] ?>" alt="Logo" width="150">
                      <div class="pt-2">
                        <a href="profile.php" class="btn btn-primary btn-sm" title="Upload new profile image"
                          >Change logo <i class="bi bi-upload"></i></a>
                        
                      </div>
                    </div>









                    <div class="col-lg-3 col-md-3 mb-3">
                      <h5 class="card-title">INVOICE</h5>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">#</span>
                        <input type="text" name="invoice_id" class="form-control" id="invoiceId" required>
                      </div>
                    </div>


                  </div>


                  <div class="row">

                    <?php
                    // Assuming $login_id is obtained from some source (e.g., user input or a session variable)
                    $login_id = $_SESSION['id']; // Initialize $login_id with a value
                    
                    $q = "SELECT * FROM user WHERE id='$login_id'";
                    $res = select($q);
                    ?>




                    <div class="col-lg-6 mb-3 card">

                      <h5 class="card-title">Who is this invoice from</h5>


                      <div class="form-floating mb-1">
                        <input type="text" name="user_name" value="<?php echo $res[0]['name'] ?>" class="form-control" id="floatingName"
                          placeholder="Your Name">
                        <label for="floatingName">Name</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="text" name="user_business" value="<?php echo $res[0]['business'] ?>" class="form-control"
                          id="floatingName" placeholder="Your Name">
                        <label for="floatingName">Business name</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="text" name="user_address" value="<?php echo $res[0]['address'] ?>" class="form-control"
                          id="floatingName" placeholder="Your Name">
                        <label for="floatingName">Address</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="email" name="user_email" value="<?php echo $res[0]['email'] ?>" class="form-control"
                          id="floatingName" placeholder="Your Name">
                        <label for="floatingName">Email</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="text" name="user_mobile" value="<?php echo $res[0]['mobile'] ?>" class="form-control"
                          id="floatingName" placeholder="Your Name">
                        <label for="floatingName">Mobile number</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="text" name="gst" value="<?php echo $res[0]['gst'] ?>" class="form-control" id="floatingName"
                          placeholder="GST">
                        <label for="floatingName">GST Number</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="text" name="user_other_details" class="form-control" id="floatingName" placeholder="Your Name">
                        <label for="floatingName">Other Details</label>
                      </div>


                    </div>




                    <div class="col-lg-6 mb-3 card">

                      <h5 class="card-title">Who is this invoice to</h5>


                      <div class="form-floating mb-1">
                        <input type="text" name="cname" class="form-control" id="floatingName" placeholder="Your Name">
                        <label for="floatingName">Name</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="text" name="cbusiness" class="form-control" id="floatingName"
                          placeholder="Your Name">
                        <label for="floatingName">Business name</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="text" name="caddress" class="form-control" id="floatingName"
                          placeholder="Your Name">
                        <label for="floatingName">Address</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="email" name="cemail" class="form-control" id="floatingName"
                          placeholder="Your Name">
                        <label for="floatingName">Email</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="text" name="cmobile" class="form-control" id="floatingName"
                          placeholder="Your Name">
                        <label for="floatingName">Mobile number</label>
                      </div>

                      <div class="form-floating mb-1">
                        <input type="text" name="cgst" class="form-control" id="floatingName"
                          placeholder="GST">
                        <label for="floatingName">GST Number</label>
                      </div>

                      <p class="text-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">OR Select
                        Existing Customer</p>

                    </div>


                   
                  <!-- modal start -->

                    <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
                      <div class="modal-dialog modal-dialog-scrollable modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Select Customer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Business</th>
                                  <th scope="col">Address</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Phone</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                $q="select * from client";
                                $res=select($q);
                                $i=1;

                                foreach($res as $row){

                                
                                
                              ?>
                                <!-- Add a data attribute to each row in the client table to store the client's ID -->
                               <tr data-client-id="<?php echo $row['id']; ?>">
                                 <td><?php echo $i++; ?></td>
                                 <td><?php echo $row['name'] ?></td>
                                 <td><?php echo $row['business'] ?></td>
                                 <td><?php echo $row['address'] ?></td>
                                 <td><?php echo $row['email'] ?></td>
                                 <td><?php echo $row['mobile'] ?></td>
                                 <td><button type="button" class="btn btn-outline-primary" onclick="selectClient(this)">Select</button></td>
                               </tr>

                                <?php } ?>


                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- modal end -->

                <script>
                  function selectClient(button) {
                    // Get the parent row of the clicked button
                    var row = button.closest('tr');
                    
                    // Get the client's details from the row
                    var clientId = row.getAttribute('data-client-id');
                    var clientName = row.cells[1].textContent;
                    var clientBusiness = row.cells[2].textContent;
                    var clientAddress = row.cells[3].textContent;
                    var clientEmail = row.cells[4].textContent;
                    var clientMobile = row.cells[5].textContent;
                
                    // Populate the input fields with the selected client's details
                    document.querySelector('input[name="cname"]').value = clientName;
                    document.querySelector('input[name="cbusiness"]').value = clientBusiness;
                    document.querySelector('input[name="caddress"]').value = clientAddress;
                    document.querySelector('input[name="cemail"]').value = clientEmail;
                    document.querySelector('input[name="cmobile"]').value = clientMobile;
                
                    // Close the modal
                    $('#modalDialogScrollable').modal('hide');
                  }
                </script>




              </div>




              <div class="row mb-3">
                <div class="col-md-3 col-lg-3 col-sm-6 mb-3">
                  <div class="form-floating">
                    <input type="date" name="date" class="form-control" id="floatingName" placeholder="Your Name">
                    <label for="floatingName">Date</label>
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-6 mb-3">
                  <div class="form-floating">
                    <input type="text" name="payment_terms" class="form-control" id="floatingName" placeholder="Your Name">
                    <label for="floatingName">Payment Terms</label>
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-6 mb-3">
                  <div class="form-floating">
                    <input type="date" name="due_date" class="form-control" id="floatingName" placeholder="Your Name">
                    <label for="floatingName">Due Date</label>
                  </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-6 mb-3">
                  <div class="form-floating">
                    <input type="text" name="po_number" class="form-control" id="floatingName" placeholder="Your Name">
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
      <tr>
        <td class="w-50 "><textarea name="product[0]" class="form-control text-center" placeholder="Enter Product name or description" required></textarea></td>
        <td><input type="number" name="quantity[0]" class="form-control text-center" placeholder="Quantity"></td>
        <td><input type="number" name="price[0]" class="form-control text-center" placeholder="Price"></td>
        <td>0.00</td>
        <td><button type="button" class="btn btn-outline-success add_item_btn">Add+</button></td>
      </tr>
    </tbody>
  </table>
</div>

<!-- ... Your JavaScript code ... -->
<script>
  $(document).ready(function () {
    let rowIndex = 1; // Initialize the row index

    $(".add_item_btn").click(function (e) {
      e.preventDefault();
      $("#productTableBody").append(`<tr>
        <td><input type="number" name="quantity[${rowIndex}]" class="form-control text-center" placeholder="Quantity"></td>
        <td><input type="number" name="price[${rowIndex}]" class="form-control text-center" placeholder="Price"></td>
        <td>0.00</td>
        <td><button type="button" class="btn btn-outline-danger remove_item_btn">Remove</button></td>
      </tr>`);
      rowIndex++; // Increment the row index
    });

    $(document).on('click', '.remove_item_btn', function (e) {
      e.preventDefault();
      let row_item = $(this).parent().parent();
      $(row_item).remove();
    });

    // Submit form data via AJAX when the form is submitted
    $("#add_form").submit(function (e) {
      e.preventDefault();
      $("#add_btn").val('Adding...');

      // Collect data from dynamically added rows
      let dynamicRowsData = [];
      $("#productTableBody tr").each(function (index, row) {
        let rowData = {
          product: $(row).find('textarea[name^="product"]').val().replace(/\n/g, '<br>'),
          quantity: $(row).find('input[name^="quantity"]').val(),
          price: $(row).find('input[name^="price"]').val(),
        };
        dynamicRowsData.push(rowData);
      });

      // Append dynamicRowsData to the form data
      let formData = $(this).serializeArray();

      // Append data from dynamically added rows
      dynamicRowsData.forEach(function (item, index) {
        formData.push({ name: `product[${index}]`, value: item.product });
        formData.push({ name: `quantity[${index}]`, value: item.quantity });
        formData.push({ name: `price[${index}]`, value: item.price });
      });

      formData.push({ name: "dynamicRowsData", value: JSON.stringify(dynamicRowsData )});

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: formData,
        success: function (response) {
          console.log(response);
          // Extract the invoice ID from the form data
          var invoiceId = $('#invoiceId').val();
          var subTotal = $('#secondTableSubtotal').val();

          // Redirect to profile.php with the invoice ID as a URL parameter
          window.location.href = 'choose-invoice.php?invoice_id=' + invoiceId;
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

    // Bind the click event for the "Add" button only once
    $(".add_item_btn").unbind("click").click(function (e) {
      e.preventDefault();
      $("#productTableBody").append(`<tr>
        <td class="w-50"><textarea name="product[]" class="form-control text-center" placeholder="Enter Product name or description" required></textarea></td>
        <td><input type="number" name="quantity[]" class="form-control text-center" placeholder="Quantity"></td>
        <td><input type="number" name="price[]" class="form-control text-center" placeholder="Price"></td>
        <td>0.00</td>
        <td><button type="button" class="btn btn-outline-danger remove_item_btn">Remove</button></td>
      </tr>`);
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
                  <textarea class="form-control" name="note" placeholder="Address" id="floatingTextarea"
                    style="height: 100px;"></textarea>
                  <label for="floatingTextarea">Notes</label>
                </div>

                <div class="form-floating">
                  <textarea class="form-control" name="terms" placeholder="Address" id="floatingTextarea"
                    style="height: 100px;"></textarea>
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
  <td><input type="text" name="discount" class="form-control text-center" id="discountInput" placeholder="%"
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
  <td><input type="text" name="tax" class="form-control text-center" id="taxInput" placeholder="%"
      ></td>
</tr>
<tr>
  <td class="fw-bold">Total</td>
  <td class="text-center" id="total"><input type="hidden" name="total" id="total"></td>
</tr>
<tr>
  <td>Amount paid</td>
  <td><input type="text" name="amount_paid" class="form-control text-center" id="amountPaidInput" placeholder="₹ 0"
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