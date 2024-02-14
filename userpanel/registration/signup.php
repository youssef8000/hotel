<?php 
include '../shared/head.php';
include '../shared/env.php';
include '../shared/functions/functions.php';

// insert user
$validFirstName = "";
$validLastName = "";
$validEmail = "";
$validPassword = "";
$validPhone = "";
$validAddress = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['add'])) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($phone) || empty($address)) {
                  if (empty($firstName)) {
                        $validFirstName = " : First Name IS Requerd";
                  }
                  if (empty($lastName)) {
                        $validLastName = " : Last Name IS Requerd";
                  }
                  if (empty($email)) {
                        $validEmail = " : Email IS Requerd";
                  }
                  if (empty($password)) {
                        $validPassword = " : Password IS Requerd";
                  }
                  if (empty($phone)) {
                        $validPhone = " : Phone IS Requerd";
                  }
                  if (empty($address)) {
                        $validAddress = " : Adress IS Requerd";
                  }
            } else {
                  //Images code
                  $img = time() . $_FILES['image']['name'];
                  $image_tmp = $_FILES['image']['tmp_name'];
                  $location = "upload/";
                  move_uploaded_file($image_tmp, $location . $img);

                  $insert = "INSERT INTO `custmer` VALUES (NULL, '$firstName','$lastName','$email','$password','$img', '$phone','$address', NULL)";
                  $i = mysqli_query($conn, $insert);
            }
      }
}

?>

<main>
      <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                  <div class="container">
                        <div class="row justify-content-center">
                              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                                    <div class="d-flex justify-content-center py-4">
                                          <a class="logo d-flex align-items-center w-auto">
                                                <h2 class="d-none d-lg-block  text-primary">Signup Customer</h2>
                                          </a>
                                    </div>
                                    < <div class="card mb-3">

                                          <div class="card-body">

                                                <div class="pt-4 pb-2">
                                                      <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                                      <p class="text-center small">Enter your personal details to create account</p>
                                                </div>

                                                <form class="row g-3 needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                                                      <div class="col-12">
                                                            <label for="yourName" class="form-label">FirstName</label>
                                                            <input type="text" name="firstName" class="form-control" id="your FistName" required>
                                                            <div class="invalid-feedback"><?php echo $validFirstName ?></div>
                                                      </div>
                                                      <div class="col-12">
                                                            <label for="yourName" class="form-label">LastName</label>
                                                            <input type="text" name="lastName" class="form-control" id="your LastName" required>
                                                            <div class="invalid-feedback"><?php echo $validLastName ?></div>
                                                      </div>

                                                      <div class="col-12">
                                                            <label for="yourEmail" class="form-label">Your Email</label>
                                                            <input type="email" name="email" class="form-control" id="your E-mail" required>
                                                            <div class="invalid-feedback"><?php echo $validEmail ?></div>
                                                      </div>

                                                      <div class="col-12">
                                                            <label for="yourPassword" class="form-label">Password</label>
                                                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                                                            <div class="invalid-feedback"><?php echo $validPassword ?></div>
                                                      </div>

                                                      <div class="col-12">
                                                            <label for="yourPassword" class="form-label">Image Profile</label>
                                                            <input type="File" name="image" class="form-control-file" id="yourPassword" required>
                                                      </div>

                                                      <div class="col-12">
                                                            <label for="yourPassword" class="form-label">Phone</label>
                                                            <input name="phone" type="tell" class="form-control" id="yourPassword" required>
                                                            <div class="invalid-feedback"><?php echo $validPhone ?></div>
                                                      </div>
                                                      <div class="col-12">
                                                            <label for="yourEmail" class="form-label">Your Address</label>
                                                            <input type="text" name="address" class="form-control" id="your E-mail" required>
                                                            <div class="invalid-feedback"><?php echo $validAddress ?></div>
                                                      </div>


                                                      <div class="col-12">
                                                            <button class="btn btn-primary w-100" type="submit" name="add">Create Account</button>
                                                      </div>
                                                      <div class="col-12">
                                                            <p class="small mb-0">Already have an account? <a href="/hotel/userpanel/registration/login.php" class="text-info">Log in</a></p>
                                                      </div>
                                                </form>

                                          </div>
                              </div>


                        </div>
                  </div>
      </div>

      </section>

      </div>
</main>
<?php include '../shared/script.php'; ?>