<html>

<head>
  <title> Easy Movers</title>
  <link rel="stylesheet" href="mystyle.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>


<?php
echo file_get_contents('navbar.php');
echo file_get_contents('foot.php');


$host='localhost';
$username='root';
$password='root';
$db_name='EasyMovers';
$conn =mysqli_connect($host,$username,$password,$db_name);

$ship=$_POST['ship'];
$pack=$_POST['pack'];
$categ=$_POST['categ'];
$name=$_POST['name'];
mysqli_query($conn,"insert into items (category_id,item_name,shipping_charge,packing_charge) values('$categ','$name','$ship','$pack')");


?>

<div class="container">
<div class="row">
    <div class="col-sm-1">
    </div>

  <div class="col-sm-11">
    <div id="test">

<h3>Admin's Page -- Add a New Item</h3><br/>

<?php
if($ship)
{
  echo "<h4>Item added Successfully</h4><br/>";
}

?>
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-6">
<form action="admin-add.php" method="POST">

  <label>Category ID</label>
    <input name="categ"class="form-control"><br/>
    <label>Item Name</label><input name="name"class="form-control"><br/>
      <label>Shipping Charge</label><input name="pack"class="form-control"><br/>
  <label>Packing Charge</label><input name="ship"class="form-control"><br/>
  <input type='submit' class="btn btn-primary" value="Add Item">
</form><br/>
<a class='btn btn-success' href='admin.php'>Return to main Admin </a>
</div>
</div>


</div>
</div>
</div>
</div>


</body>

</html>
