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
<h2>My Cart <i class="fa fa-shopping-cart"> </i></h2>


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


    $name=$_POST['name'];
    $ship=$_POST['ship'];
    $pack=$_POST['pack'];
    $quan=$_POST['quan'];



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
      $q=$q+$quan;
      $total=$q*($ship+$pack);
      mysqli_query($conn,"update cart set quantity=$q, total_charge=$total where username='$u' and item_name='$name'");
    }




    $result=mysqli_query($conn,"select * from cart where username='$u'");
    echo "<table text-align='center' class='table table-striped'> <tr><th>Item Name</th><th>Shipping Charge</th><th>Packing Charge</th><th>Quantity</th><th>Total Charge</th><th></th></tr>";
    $tot=0;
      while($rop=mysqli_fetch_array($result))
      {
        $tot+=$rop['total_charge'];
        $item=$rop['item_name'];
        echo "<tr><td>".$rop['item_name']."</td><td>$".$rop['shipping_charge']."</td><td>$".$rop['packing_charge']."</td><td>".$rop['quantity']."</td><td>$".$rop['total_charge']."</td><td><a class='btn btn-danger' href='delete-from-cart.php?name=$item'>Remove</a></td></tr>";
      }
      echo "</table>";




?>


<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-3"><a class="btn btn-primary" href="dashboard.php">Continue shopping</a></div>
  <div class="col-sm-3"><h4>Cart Total: $<?php echo $tot?>.00</h4></div>
  <div class="col-sm-3"><a class="btn btn-warning" href="delete-from-cart.php?all=1">Clear Cart</a></div>
  <div class="col-sm-2"><a class="btn btn-success" href="order.php">Checkout</a></div>


  </div>
  </div>
  </div>
  </div>

</body>

</html>
