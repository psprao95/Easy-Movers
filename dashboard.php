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

    $host='localhost';
    $username='root';
    $password='root';
    $db_name='EasyMovers';
    $conn =mysqli_connect($host,$username,$password,$db_name);


    $u = $_SESSION['user_name'];


    $my_query = "select * from users where username='$u'";
    $result=mysqli_query($conn,$my_query);


    if(mysqli_num_rows($result)==1)
    {
      while($row=mysqli_fetch_array($result))
      {
        $fname=$row['first_name'];
        $lname = $row['last_name'];
      }
      echo "<h2>Welcome to Easy Movers, ". $fname." " .$lname."</h2>";
      echo "Your Dashboard";
      echo "Click <a href='logout.php'>HERE</a> to logout";
    }
    else
    {
      header('Location: login.php');

    }




?>

</div>
</body>
</html>
