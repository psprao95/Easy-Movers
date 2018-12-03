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

    $result= mysqli_query($conn,"select * from cart where username='$u'");
    if(mysqli_num_rows($result)==0)
    {
      echo "<h4>Your Cart is empty</h4>";
    }
    else
    {
      echo "<h3>Your order has been placed successfully!</h3><br/>";
      echo "<h4>Order confirmation number : F592330CBA90</h4><br/>";
      echo"<h4> Order Details</h4>";


      echo "<table text-align='center' class='table table-striped'> <tr><th>Item Name</th>
      <th>Shipping Charge</th><th>Packing Charge</th><th>Quantity</th><th>Total Charge</th><th></th></tr>";
      while($rop=mysqli_fetch_array($result))
      {
        $tot+=$rop['total_charge'];
        $item=$rop['item_name'];
          echo "<tr><td>".$rop['item_name']."</td><td>$".$rop['shipping_charge']."</td>
          <td>$".$rop['packing_charge']."</td><td>".$rop['quantity']."</td>
          <td>$".$rop['total_charge']."</td>
          </tr>";
        }
        echo "</table>";

        echo"<h4>Order Total : $$tot.00</h4>";


        mysqli_query($conn,"insert into orders (username,total) values ('$u','$tot')");
        $result=mysqli_query($conn,"select max(order_id) from orders");
        while($rop=mysqli_fetch_array($result))
        {
          $order_id=$rop['max(order_id)'];
        }



        $result= mysqli_query($conn,"select * from cart where username='$u'");
        while($rop=mysqli_fetch_array($result))
        {
          $name=$rop['item_name'];
          $ship=$rop['shipping_charge'];
          $pack=$rop['packing_charge'];
          $quan=$rop['quantity'];
          $total=$rop['total_charge'];
          mysqli_query($conn,"insert into order_details (order_id,item_name,shipping_charge,
          packing_charge,quantity,total_charge) values ('$order_id','$name','$ship','$pack','$quan','$total')");


        }


        echo "<a class='btn btn-success' href='dashboard.php'>Place another order</a><br/>";

        mysqli_query($conn,"delete from cart where username='$u'");

    }
?>





  </div>
  </div>
  </div>
  </div>

</body>

</html>
