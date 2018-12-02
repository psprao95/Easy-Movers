<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="mystyle.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/signup.js" type="text/javascript"></script>
  <title>Easy Movers - Register</title>
</head>

<body>
  <?php
  echo file_get_contents('navbar.php');
  session_start();
  if(isset($_SESSION['user_name']))
  {
    header('Location:dashboard.php');
  }
  ?>


<div id="signup">

<div class="container">
  <div class="row">

    <div class="col-lg-3"></div>

    <div class="col-lg-6">


<div id="regis">
        <h1>Easy Movers</h1>
        <p> Please fill this form to create a new account!</p>
        <hr>


        <form id="myForm" method="POST" action="reg.php">

          <div class="row">

            <div class=col-lg-6>
              <input type="text" id="f_name" name="fna" class="form-control" placeholder="First name">
            </div>

            <div class=col-lg-6>
              <input type="text" id="l_name" name="lna" class="form-control" placeholder="Last Name">
            </div>

          </div>
          <br>
          <input type="email" id="mail" name="email_id" class="form-control"  placeholder="Email"><br>
            <input type="text" id="uname" name="user" class="form-control"  placeholder="username"><br>
          <input type="password" name="pwd" id="pwd" class="form-control"  placeholder="password"><br>
          <input type="password" id="repwd" class="form-control"  placeholder="confirm password"><br>
          <input type="checkbox" id="terms" required> I accept the <a>Terms of Use</a> and <a>Privacy Policy</a><br><br>
          <input type="submit" id="submitButton" value="Create Account" style="font-size:16px;color:white;background-color:#3e8e41;border:2px solid #336600;padding:3px"><br>

        </form><br/>

        <p>Already have an account?  <a href="login.php">Click here</a> to Sign In</p>

</div>
    </div>


    <div class="col-lg-3"></div>
  </div>
    </div>

</div><br/>


<?php
echo file_get_contents('foot.php');?>
</body>
</html>
