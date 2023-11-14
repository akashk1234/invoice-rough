

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Reset password</title>
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

  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>





  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">



              <div class="d-flex justify-content-center py-4">
                <a href="" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/favicon.png" alt="">
                  <span class=" d-lg-block">Invoice Generator</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3 p-5">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Answer the questions below</h5>
                    <p class="text-center small">Use this to reset your password</p>
                  </div>


                  <?php
                            include 'connection.php';

                            if (isset($_POST['submit'])) {
                                // Assuming you have the user ID available
                                $userId = $_GET['id']; // Replace with the actual user ID

                                // Get the selected question and the answer from the form
                                $selectedQuestion = $_POST['question'];
                                $answer = mysqli_real_escape_string($conn, $_POST['food']); // Sanitize the input

                                // Retrieve the question ID based on the selected question
                                $questionId = null;

                                switch ($selectedQuestion) {
                                    case 'color':
                                        $questionId = 1; // Replace with the actual question ID for the color question
                                        break;
                                    case 'food':
                                        $questionId = 2; // Replace with the actual question ID for the food question
                                        break;
                                    case 'instrument':
                                        $questionId = 3; // Replace with the actual question ID for the instrument question
                                        break;
                                    // Add more cases if needed
                                }

                                // Check if the question ID is valid
                                if ($questionId !== null) {
                                    // Check if the provided answer matches the stored answer in the database
                                    $checkAnswerQuery = "SELECT answer FROM answer WHERE user_id = '$userId' AND q_id = '$questionId'";
                                    $result = $conn->query($checkAnswerQuery);

                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $storedAnswer = $row['answer'];

                                        // Compare the provided answer with the stored answer
                                        if ($answer === $storedAnswer) {
                                            // Redirect to the password reset page
                                            header("Location: reset-password.php?uid=$userId");
                                            exit();
                                        } else {
                                            alert ("Incorrect answer. Please try again.");
                                        }
                                    } else {
                                        alert ("Question and answer not matching!");
                                    }
                                } else {
                                    alert ("Invalid question selected.");
                                }
                            }

                            // Close the database connection
                            $conn->close();
                  ?>


                  <form method="post" class="row g-3 needs-validation" >

                    <div class="col-12">
                      <select class="form-select" name="question" aria-label="Default select example">
                        <option selected>Choose a question</option>
                        <option value="color">What is your favorite color?</option>
                        <option value="food">What is your favorite food?</option>
                        <option value="instrument">What is your favorite musical instrument?</option>
                      </select>
                      <div class="invalid-feedback">Answer something</div>
                    </div>

                    <div class="col-12 mt-">
                      <input type="text" name="food" class="form-control" placeholder="Answer the question"  required>
                      <div class="invalid-feedback">Answer something</div>
                    </div>


                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="submit">Submit</button>
                    </div>

                  </form>

                </div>
              </div>

              <div class="credits">
                Developed by <a href="https://ictglobaltech.com/">ICT Global Tech</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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