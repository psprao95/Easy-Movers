<?php
session_start();
$host='localhost';
$username='root';
$password='root';
$db_name='EasyMovers';
$conn =mysqli_connect($host,$username,$password,$db_name);

$id=$_POST['item'];
$name=$_POST['name'];
$pack=$_POST['pack'];
$ship=$_POST['ship'];
$categ=$_POST['categ'];
mysqli_query($conn,"update items set category_id='$categ',item_name='$name',shipping_charge='$ship',packing_charge='$pack' where item_id='$id'");
header('Location:admin.php');

 ?>
