<?php
session_start();
if(isset( $_SESSION['user_name']))
{
  if($_SESSION['user_name']=='admin')
  {
    header('Location:admin.php');
  }
  else{
  header('Location:dashboard.php');}
} ?>
<html>
<head>
  <title>Easy Movers - Signup</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="mystyle.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
  <?php
  echo file_get_contents('navbar.php');
  ?>

  <div class="container">
    <div class="row">

      <div class="col-lg-3"></div>

      <div class="col-lg-6">
<div id="regis">
<h1>Sign In</h1>

<form id="myForm" method="POST" action="welcome.php">

  <label>Username     </label>
  <input type="text"  name ="user" class="form-control" ><br><br>


    <label>Password   </label>
  <input type="password"  name="pwd" class="form-control" ><br><br>

  <input type="submit" id="submitButton" value="Login">

    <p>Do not have an account? Create a new account  <a href="signup.php">here</a>

</form>
</div>
</div>

<div class="col-lg-3"></div>
</div>
</div>

<?php echo file_get_contents('foot.php');?>
</body>
</html>
