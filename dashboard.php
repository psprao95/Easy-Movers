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




    <div class="container">
    <div class="row">
        <div class="col-sm-1">  </div>
<div class="col-sm-11">
    <div id="test">

<h2>Making Your Move Easy!</h2>
<h3>Select the items you want to move/pack</h3><br/><br/>


<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-2">
      <form method="POST"action="search.php">
        <select name="categ" id="sel" >
          <option>---select---</option>
          <option>Living Room</option>
          <option>Dining Room</option>
          <option> Bed Room</option>
          <option>Nursery</option>
          <option>Office</option>
          <option>Appliances</option>
          <option>Miscellaneous</option>
          <option>Boxes</option>
        </select>
      </div>
      <div class="col-sm-2">
      <input name='sea' width=8>
    </div>
      <div class="col-sm-3">
          <input type="submit" value="Filter your search" class="btn btn-success">
        </form>
      </div>
    </div><br/>



<?php
session_start();
if(!isset($_SESSION['user_name']))
{
  header('Location:login.php');
}

if($_SESSION['user_name']=='admin')
{
  header('Location:admin.php');
}
    $host='localhost';
    $username='root';
    $password='root';
    $db_name='EasyMovers';
    $conn =mysqli_connect($host,$username,$password,$db_name);
    $u = $_SESSION['user_name'];

      $categories=mysqli_query($conn,"select * from item_categories");



      if(isset($_SESSION['category']) && $_SESSION['category']!='---select---')
      {
        $filter=$_SESSION['category'];
        $search=$_SESSION['s'];
        $row=mysqli_query($conn,"select * from (item_categories join items on item_categories.category_id=items.category_id)
        where category_name='$filter' and item_name like '%$search%'");
        echo "<h4>$cat_name </h4>";
        echo "<table class='table table-dark'> <tr><th>Item No.</th><th>Item Name</th><th>Shipping Charge</th><th>Packing Charge</th><th>Quantity</th><th></th></tr>";
        $id=0;
        while($rop=mysqli_fetch_array($row))
        {
          $id+=1;
          $name=$rop['item_name'];
          $ship=$rop['shipping_charge'];
          $pack=$rop['packing_charge'];
          echo "<tr><td>".$id."</td><td>".$rop['item_name']."</td><td>".$rop['shipping_charge']."</td><td>".$rop['packing_charge']."</td><td><form method='POST' action=cart.php><input type='hidden' name='name' value='$name'><input type='hidden' name='pack' value='$pack'><input type='hidden' name='ship' value='$ship'><input type='text' name='quan' size=4 required></td><td><input type='submit' class='btn btn-primary' value='Add to Cart'></form></td></tr>";
        }
        echo "</table><br/><br/>";

      }


      else if(isset($_SESSION['category']) && $_SESSION['category']=='---select---')
      {
        echo "<table > <tr><th>Item No.</th><th>Item Name</th><th>Shipping Charge</th><th>Packing Charge</th><th>Quantity</th><th></th></tr>";

        while($temp=mysqli_fetch_array($categories))
        {
          $cat_id=$temp['category_id'];
          $cat_name=$temp['category_name'];
          $search=$_SESSION['s'];
          $row=mysqli_query($conn,"select * from (item_categories join items on item_categories.category_id=items.category_id)
          where items.category_id='$cat_id' and item_name like '%$search%'");

        while($rop=mysqli_fetch_array($row))
        {

          $name=$rop['item_name'];
          $ship=$rop['shipping_charge'];
          $pack=$rop['packing_charge'];
          echo "<tr><td>".$rop['item_id']."</td><td>".$rop['item_name']."</td><td>".$rop['shipping_charge']."</td><td>".$rop['packing_charge']."</td><td><form method='POST' action=cart.php><input type='hidden' name='name' value='$name'><input type='hidden' name='pack' value='$pack'><input type='hidden' name='ship' value='$ship'><input type='text' name='quan' size=4 required></td><td><input type='submit' class='btn btn-primary' value='Add to Cart'></form></td></tr>";
        }

      }
      echo "</table>";

      }


      else
      {

      while($temp=mysqli_fetch_array($categories))
      {
        $cat_id=$temp['category_id'];
        $cat_name=$temp['category_name'];
        $search=$_SESSION['s'];
        $row=mysqli_query($conn,"select * from (item_categories join items on item_categories.category_id=items.category_id)
        where items.category_id='$cat_id'");
        echo "<h4>$cat_name</h4>";
      echo "<table class='table table-dark'> <tr><th>Item No.</th><th>Item Name</th><th>Shipping Charge</th><th>Packing Charge</th><th>Quantity</th><th></th></tr>";
      while($rop=mysqli_fetch_array($row))
      {

        $name=$rop['item_name'];
        $ship=$rop['shipping_charge'];
        $pack=$rop['packing_charge'];
        echo "<tr><td>".$rop['item_id']."</td><td>".$rop['item_name']."</td><td>".$rop['shipping_charge']."</td><td>".$rop['packing_charge']."</td><td><form method='POST' action=cart.php><input type='hidden' name='name' value='$name'><input type='hidden' name='pack' value='$pack'><input type='hidden' name='ship' value='$ship'><input type='text' name='quan' size=4 required></td><td><input type='submit' class='btn btn-primary' value='Add to Cart'></form></td></tr>";
      }
      echo "</table>";
    }
  }

unset($_SESSION["category"]);
unset($_SESSION["s"]);

?>
  </div>
</div>
</div>
</div>

</body>
</html>
