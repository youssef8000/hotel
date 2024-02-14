<?php 
include '../shared/head.php';
include '../shared/env.php';
include '../shared/functions/functions.php';

session_start();

if(isset($_POST['login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$select = "SELECT * FROM `custmer` WHERE `email` = '$email' AND `password` = '$password' ";
	$s = mysqli_query($conn,$select);
	$row = mysqli_fetch_assoc($s);
	$numRows = mysqli_num_rows($s);
	if ($numRows > 0) {
		echo"ture";
		$_SESSION['CustomerID'] = $row['id'];
		$_SESSION['custmer'] = $email;
		header("location:/hotel/userpanel/room/room.php");
	}else{
		
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
								
								<h3 class="d-none d-lg-block text-info  display-4">Login</h3>
							</a>
						</div>

						<div class="card mb-3">

							<div class="card-body">

								<div class="pt-4 pb-2">
									<h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
									<p class="text-center small">Enter your username & password to login</p>
								</div>

								<form class="row g-3 needs-validation" novalidate method="POST">

									<div class="col-12">
										<label for="yourUsername" class="form-label">Email</label>
										<div class="input-group has-validation">
											<input type="email" name="email" class="form-control" id="yourEmail" required>
											<div class="invalid-feedback">Please enter your email.</div>
										</div>
									</div>

									<div class="col-12">
										<label for="yourPassword" class="form-label">Password</label>
										<input type="password" name="password" class="form-control" id="yourPassword" required>
										<div class="invalid-feedback">Please enter your password!</div>
									</div>
									<div class="col-12">
										<button class="btn btn-primary w-100" type="submit" name="login">Login</button>
									</div>
									<div class="col-12">
										<p class="small mb-0 ">Don't have account? <a href="/hotel/userpanel/registration/signup.php" class="text-info">Create an account</a></p>
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