<html>

<head>
  <title> Easy Movers</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="mystyle.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>


<body>
  <?php
  echo file_get_contents('navbar.php');
  echo file_get_contents('foot.php');
  ?>



  <div class="container">
  <div class="row">
      <div class="col-sm-1">
      </div>

    <div class="col-sm-11">
      <div id="test">

<?php
session_start();
if(!isset($_SESSION['user_name']))
{
  header('Location:login.php');
}

    $host='localhost';
    $username='root';
    $password='root';
    $db_name='EasyMovers';
    $conn =mysqli_connect($host,$username,$password,$db_name);
    $u = $_SESSION['user_name'];

    echo "<h3>My Cart</h3>";
    $name=$_GET['name'];
    $ship=$_GET['ship'];
    $pack=$_GET['pack'];
    $quan=$_GET['quan'];

    $result= mysqli_query($conn,"select * from cart where username='$u' and item_name='$name'");
    if(mysqli_num_rows($result)==0)
    {

      $total=$quan*($ship+$pack);
      $result=mysqli_query($conn,"insert into cart (username,item_name,shipping_charge,packing_charge,quantity,total_charge) values ('$u','$name','$ship','$pack','$quan','$total')");

    }
    else {
      while($rop=mysqli_fetch_array($result))
      {
        $q=$rop['quantity'];
      }
      $q=$q+1;
      $total=$q*($ship+$pack);
      mysqli_query($conn,"update cart set quantity=$q, total_charge=$total where username='$u' and item_name='$name'");
    }




    $result=mysqli_query($conn,"select * from cart where username='$u'");
    echo "<table class='table table-striped'> <tr><th>Item Name</th><th>Shipping Charge</th><th>Packing Charge</th><th>Quantity</th><th>Total Charge</th><th></th></tr>";
      while($rop=mysqli_fetch_array($result))
      {
        echo "<tr><td>".$rop['item_name']."</td><td>$".$rop['shipping_charge']."</td><td>$".$rop['packing_charge']."</td><td>".$rop['quantity']."</td><td>$".$rop['total_charge']."</td><td><a class='bt btn-danger' href='delete.php'></a></td></tr>";
      }
      echo "</table>";


?>

  </div>
  </div>
  </div>
  </div>

</body>
</html>
