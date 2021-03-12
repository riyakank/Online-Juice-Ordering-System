<?php session_start(); ?>
<?php include "includes/head.php";


									if(isset($_POST['register'])) {	
										$c_fname = $_POST['firstname'];
										$c_lname = $_POST['lastname'];
										$c_email = $_POST['email'];
										$c_password = $_POST['password'];
										$c_address = $_POST['address'];
										$c_contact = $_POST['contact'];
										if($connection){
											$query="INSERT INTO customer(cust_fname,cust_lname,cust_email,cust_pswd,cust_address,cust_contact) VALUES ('$c_fname','$c_lname','$c_email','$c_password','$c_address','$c_contact')";
											$result=mysqli_query($connection,$query);
											if($result){
												echo "<script>alert('Data successfully saved!')</script>";
												header("Location: login2.php");
											}
											else{
												echo "error".mysqli_error($connection);
											}
										}
										else
										{
											echo "error in connection";
										}
									}
								
?>
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      	<div class="card login-card">
			<div class="row no-gutters">
			<div class="col-md-8">
				<video autoplay muted loop id="bg-video">
					<source src="assets/images/video2.mp4" type="video/mp4" />
				</video>
			</div>
				<div class="col-md-4">
					<div class="card-body">
					<p class="login-card-description">Sign Up</p>
						<form action="register.php" method="post">
								<div class="form-group">
								<label for="firstname" class="sr-only" data-validate = "First name is required">Email</label>
								<input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" required>
								</div>
								<div class="form-group">
								<label for="lasttname" class="sr-only" data-validate = "Last name is required">Email</label>
								<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" required>
								</div>
								<div class="form-group">
								<label for="address" class="sr-only" data-validate = "Address is required">Email</label>
								<input type="text" name="address" id="address" class="form-control" placeholder="Address" required>
								</div>
								<div class="form-group">
								<label for="contact" class="sr-only" data-validate = "Contact is required">Email</label>
								<input type="number" name="contact" id="contact" class="form-control" placeholder="Contact" required>
								</div>
								<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
								</div>
								<div class="form-group mb-4">
								<label for="password" class="sr-only">Password</label>
								<input type="password" name="password" id="password" class="form-control" placeholder="***********" required>
								</div>
									<input name="register" id="register" class="btn btn-block btn-primary waves-effect waves-light continue mb-4" type="submit" value="Register">
									<br>
									<br>
									<a href="login2.php" class="txt2 bo1">Already a user? Sign in</a>
								</div>
								
								</form>
					</div>
				</div>
			</div>
    	</div>
	</div>								
  </main>
<?php include "includes/footer.php";?>   