<?php
$id=$_GET['item'];
$host='localhost';
$username='root';
$password='root';
$db_name='EasyMovers';
$conn =mysqli_connect($host,$username,$password,$db_name);
mysqli_query($conn,"delete from items where item_id=$id");
header('Location:admin.php');

 ?>
