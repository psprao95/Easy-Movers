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
<h2>My Order History <i class="fa fa-history"> </i></h2>


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

    $result=mysqli_query($conn,"SELECT O.order_id,GROUP_CONCAT(' ',D.item_name,': ', D.quantity, ' ') as items,O.total FROM 	orders O join order_details D on O.order_id=D.order_id where username='$u' group by O.order_id ");
    echo "<table text-align='center' class='table table-striped'> <tr><th>Order ID</th><th>Items</th><th>Order Total</th></tr>";
    $tot=0;
      while($rop=mysqli_fetch_array($result))
      {
        $tot+=$rop['total_charge'];
        $item=$rop['item_name'];
        echo "<tr><td>".$rop['order_id']."</td><td>".$rop['items']."</td><td>$".$rop['total'];
      }
      echo "</table>";





?>

<a class='btn btn-success' href='dashboard.php'>Place Another Order</a>

  </div>
  </div>
  </div>
  </div>

</body>

</html>
