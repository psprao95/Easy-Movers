<html>

<head>
  <title> Easy Movers</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="filter.js"></script>
  <link rel="stylesheet" href="mystyle.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>


<body>
  <?php
  echo file_get_contents('navbar.php');
  echo file_get_contents('foot.php');
  ?>



    <div id="test">

<h2>Admin's Page</h2>
<h3>Select the items you want to remove/update</h3><br/><br/>
<a class='btn btn-success' href='admin-add.php'>Add a New Item</a>




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

      $categories=mysqli_query($conn,"select * from item_categories");

      while($temp=mysqli_fetch_array($categories))
      {
        $cat_id=$temp['category_id'];
        $cat_name=$temp['category_name'];
      $row=mysqli_query($conn,"select * from (item_categories join items on item_categories.category_id=items.category_id) where items.category_id='$cat_id'");
      echo "<h3>$cat_name </h3>";
      echo "<table  class='table table-dark' > <tr><th>Item No.</th><th>Category ID</th><th>Item Name</th><th>Shipping Charge</th><th>Packing Charge</th><th></th><th></th></tr>";

      while($rop=mysqli_fetch_array($row))
      {
        $name=$rop['item_name'];
        $id=$rop['item_id'];
        $ship=$rop['shipping_charge'];
        $pack=$rop['packing_charge'];
        $categ=$rop['category_id'];
        echo "<tr><td><form method='post' action='admin-update.php'>
        <input name='item' value='$id'width=3></td>
        <td><input name='categ' value='$categ' width=3></td>
        <td><input name='name'value='$name'></td><td><input name='ship' value='$ship'></td>
        <td><input name='pack'value='$pack'></td><td><input type='submit'class='btn btn-primary' value='Update'></form></td>
        <td><a class='btn btn-danger' href='admin-delete.php?item=$id'>Remove</a></td></tr>";
      }
      echo "</table><br/><br/>";
    }







?>
  </div>


</body>
</html>
