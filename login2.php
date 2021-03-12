<?php
session_start();

?>
<?php<?php include "includes/head.php";

if(isset($_POST['login']))
                        {
                         
                            $l_email=$_POST['email'];
                            $l_password=$_POST['password'];

                          $query_login="SELECT * from customer where cust_email='$l_email' and cust_pswd='$l_password'";
                          $result_login=mysqli_query($connection,$query_login);
                          $number_of_rows=mysqli_num_rows($result_login);
                        
                          if($number_of_rows==1)
                          {
                              header("Location:index.php");
                          }
                          else
                          {
                            echo "<script>alert('User and pass not matched!')</script>";
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
              <p class="login-card-description">Sign into your account</p>
                <form action="login2.php" method="post">
                    <div class="form-group">
                      <label for="email" class="sr-only">Email</label>
                      <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
                    </div>
                    <div class="form-group mb-4">
                      <label for="password" class="sr-only">Password</label>
                      <input type="password" name="password" id="password" class="form-control" placeholder="***********" required>
                      <a href="#" class="txt2 bo1 m-l-5">Forgot password?</a>
                    </div>
                    <input name="login" id="login" class="btn btn-block btn-primary waves-effect waves-light continue mb-4" type="submit" value="Login">
                    
                </form>
                  <div class="w-full text-center p-t-55">
                    <span class="txt2">
                      Not a member?
                    </span>

                    <a href="register.php" class="txt2 bo1">
                      Sign up now
                    </a>
                
                  </div>
          </div>
        </div>
      </div>
      
    </div>
  </main>
<?php include "includes/footer.php";?>   