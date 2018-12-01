<html>

<head>
  <title> Easy Movers</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="mystyle.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
  <?php
  echo file_get_contents('navbar.php');
  ?>

<div id="test">

<?php
session_start();
if(empty($_POST["user"]) || empty($_POST["pwd"]))
{
  header('Location: login.php');
  exit();

  }

    $host='localhost';
    $username='root';
    $password='root';
    $db_name='EasyMovers';
    $conn =mysqli_connect($host,$username,$password,$db_name);


    $u = $_POST["user"];
    $p =  $_POST["pwd"];


    $my_query = "select * from users where username='$u' and password='$p'";
    $result=mysqli_query($conn,$my_query);


    if(mysqli_num_rows($result)==1)
    {
      while($row=mysqli_fetch_array($result))
      {
        $fname=$row['first_name'];
        $lname = $row['last_name'];
      }
      echo "<h2>Welcome to Easy Movers, ". $fname." " .$lname."</h2>";
      $_SESSION['user_name']=$u;
      header('Location:dashboard.php');
    }
    else
    {
      echo "<h4>Account does not exist. <a href='signup.php'>Click here</a> to create a new account </h3><br>";

    }

?>

</div>


<?php
echo file_get_contents('foot.php');?>
</body>
</html>
