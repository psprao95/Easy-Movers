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

    $my_query = "select * from users where username='$u'";
    $result=mysqli_query($conn,$my_query);

      while($row=mysqli_fetch_array($result))
      {
        $fname=$row['first_name'];
        $lname = $row['last_name'];
      }
      echo "<h2> ". $fname." " .$lname."'s Dashboard</h2>";
      echo "<h3>Choose the items you have to move<h3>";
      echo "<h4>Click <a href='logout.php'>HERE</a> to logout.</h4>";
      echo "View  <a href='cart.php'>Cart</a> here<br/>";

      $row=mysqli_query($conn,"select * from (item_categories join items on item_categories.category_id=items.category_id) where items.category_id='1'");
      echo "<h3>Living Room Items</h3>";
      echo "<table class='table table-striped'> <tr><th>Item No.</th><th>Item Name</th><th>Shipping Charge</th><th>Packing Charge</th><th>Quantity</th><th></th></tr>";
      while($rop=mysqli_fetch_array($row))
      {
        $name=$rop['item_name'];
        $ship=$rop['shipping_charge'];
        $pack=$rop['packing_charge'];
        echo "<tr><td>".$rop['item_id']."</td><td>".$rop['item_name']."</td><td>".$rop['shipping_charge']."</td><td>".$rop['packing_charge']."</td><td><a class='btn btn-primary' href='cart.php?name=$name&ship=$ship&pack=$pack&quan=1'>Add to Cart</a></td></tr>";
      }
      echo "</table>";



      echo "<h3>Dining Room Items</h3>";
      $row=mysqli_query($conn,"select * from (item_categories join items on item_categories.category_id=items.category_id) where items.category_id='2'");
      echo "<table class='table table-striped'> <tr><th>Item No.</th><th>Item Name</th><th>Shipping Charge</th><th>Packing Charge</th><th>Quantity</th><th></th></tr>";
      while($rop=mysqli_fetch_array($row))
      {
        echo "<tr><td>".$rop['item_id']."</td><td>".$rop['item_name']."</td><td>".$rop['shipping_charge']."</td><td>".$rop['packing_charge']."</td><td><a class='btn btn-primary' href='cart.php'>Add to Cart</a> </tr>";
      }
      echo "</table>";



      echo "<h3>Nursery</h3>";
      $row=mysqli_query($conn,"select * from (item_categories join items on item_categories.category_id=items.category_id) where items.category_id='3'");
      echo "<table class='table table-striped'> <tr><th>Item No.</th><th>Item Name</th><th>Shipping Charge</th><th>Packing Charge</th><th>Quantity</th><th></th></tr>";
      while($rop=mysqli_fetch_array($row))
      {
        echo "<tr><td>".$rop['item_id']."</td><td>".$rop['item_name']."</td><td>".$rop['shipping_charge']."</td><td>".$rop['packing_charge']."</td><td><a class='btn btn-primary' href='cart.php'>Add to Cart</a> </tr>";
      }
      echo "</table>";



      echo "<h3>Office</h3>";
      $row=mysqli_query($conn,"select * from (item_categories join items on item_categories.category_id=items.category_id) where items.category_id='4'");
      echo "<table class='table table-striped'> <tr><th>S No.</th><th>Item Name</th><th>Shipping Charge</th><th>Packing Charge</th><th>Quantity</th><th></th></tr>";
      $id=0;
      while($rop=mysqli_fetch_array($row))
      {
        $id=$id+1;
        echo "<tr><td>".$id."</td><td>".$rop['item_name']."</td><td>".$rop['shipping_charge']."</td><td>".$rop['packing_charge']."</td><td><a class='btn btn-primary' href='cart.php'>Add to Cart</a> </tr>";
      }
      echo "</table>";


      echo "<h3>Appliances</h3>";
      $row=mysqli_query($conn,"select * from (item_categories join items on item_categories.category_id=items.category_id) where items.category_id='5'");
      echo "<table class='table table-striped'> <tr><th>S No.</th><th>Item Name</th><th>Shipping Charge</th><th>Packing Charge</th><th>Quantity</th><th></th></tr>";
      $id=0;
      while($rop=mysqli_fetch_array($row))
      {
        $id=$id+1;
        echo "<tr><td>".$id."</td><td>".$rop['item_name']."</td><td>".$rop['shipping_charge']."</td><td>".$rop['packing_charge']."</td><td><a class='btn btn-primary' href='cart.php'>Add to Cart</a> </tr>";
      }
      echo "</table>";

?>
  </div>
  </div>
  </div>
  </div>

</body>
</html>
