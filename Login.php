<?php 
session_start();
// if(isset($_SESSION['UserID'])){
//     header('Location: '.'./index.html?se=1');
// }
$Status = "";
if (isset($_SESSION['Status'])) {
    $Status = $_SESSION['Status'];
    unset($_SESSION['Status']); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Uniconnect Signin/ Sign up </title>
  <link rel="icon" type="image/x-icon" href="logo.png">
  <link rel="stylesheet" href="./style/regi.css" />
</head>
<body>
  <main>
    <div class="box">
      <div class="inner-box">
        <div class="forms-wrap">
          <form action="LoginCheck.php" method="post" autocomplete="off" class="sign-in-form">
            <div class="./images/logo">
              <img src="./images/loginlogo.png" alt="easyclass" />
              <h3>Uniconnect</h3>
            </div>

            <div class="heading">
              <h2>Welcome Back</h2>
              <h6>Not registred yet?</h6>
              <a href="#" class="toggle">Sign up</a>
            </div>

            <div class="actual-form">
                <?php if($Status!=''){
                    echo "<font color='red'>".$Status."</font>";
                }
                ?>
                <div class="input-wrap">
                <input type="text" name='name' minlength="4" class="input-field" autocomplete="off" required />
                <label>Name</label>
              </div>

              <div class="input-wrap">
                <input type="password" name='password' minlength="4" class="input-field" autocomplete="off" required />
                <label>Password</label>
              </div>

              <input type="submit" value="Sign In" class="sign-btn" />

              <p class="text">
                Forgotten your password or you login datails?
                <a href="#">Get help</a> signing in
              </p>
            </div>
          </form>

          <form action="register.php" method="post" autocomplete="off" class="sign-up-form">
            <div class="logo">
              <img src="./images/loginlogo.png" alt="easyclass" />
              <h3>Uniconnect</h3>
            </div>

            <div class="heading">
              <h2>Get Started</h2>
              <h6>Already have an account?</h6>
              <a href="#" class="toggle">Sign in</a>
            </div>

            <div class="actual-form">
              <div class="input-wrap">
                <input type="text"   class="input-field" autocomplete="off" name="name" required />
                <label>Name</label>
              </div>

              <div class="input-wrap">
                <input type="email" name="email" class="input-field"autocomplete="off"  name="email" required />
                <label>Email</label>
              </div>

              <div class="input-wrap">
                <input type="password"  class="input-field" autocomplete="off" name="password" required />
                <label>Password</label>
              </div>

              <input type="submit" value="Sign Up" class="sign-btn" />

              <p class="text">
                By signing up, I agree to the
                <a href="#">Terms of Services</a> and
                <a href="#">Privacy Policy</a>
              </p>
            </div>
          </form>
        </div>

        <div class="carousel">
          <div class="images-wrapper">
            <img src="./images/image1.png" class="image img-1 show" alt="" />
            <img src="./images/image2.png" class="image img-2" alt="" />
            <img src="./images/image3.png" class="image img-3" alt="" />
          </div>

          <div class="text-slider">
            <div class="text-wrap">
              <div class="text-group">
                <h2>Create your own courses</h2>
                <h2>Customize as you like</h2>
                <h2>Invite students to your class</h2>
              </div>
            </div>

            <div class="bullets">
              <span class="active" data-value="1"></span>
              <span data-value="2"></span>
              <span data-value="3"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Javascript file -->

  <script src="./scripts/re.js"></script>
</body>

</html>