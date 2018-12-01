<html>

<head>
  <title> Easy Movers</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="mystyle.css" type="text/css">

</head>


<body>

  <?php
  echo file_get_contents('navbar.php');
  ?>





  <?php
session_start();
if(empty($_POST["user"]) || empty($_POST["pwd"]))
{
  header('Location: signup.html');
  exit();

  }

    $host='localhost';
    $username='root';
    $password='root';
    $db_name='EasyMovers';
    $conn =mysqli_connect($host,$username,$password,$db_name);




    $u = $_POST["user"];
    $p =  $_POST["pwd"];
    $mail= $_POST["email_id"];
    $first =  $_POST["fna"];
    $last = $_POST["lna"];



    $my_query = "select * from users where username='$u'";
    $result=mysqli_query($conn,$my_query);

    if(mysqli_num_rows($result)==1)
    {
      echo "Hello ", $u,"!<br>";
      echo "Account already exists. ";
      echo "Click here to <a href='login.php'>Sign in</a>";
      $_SESSION['user_name']=$u;

    }
    else {

      echo "<h1>Account created successfully!</h1>"."<a href='login.php'>Sign in</a>";
      $my_query = "insert into users (username,password,first_name,last_name,email_id) values ('$u','$p', '$first','$last','$mail')";
      mysqli_query($conn,$my_query);
    }

    echo file_get_contents('foot.php');

?>



</body>
</html>
