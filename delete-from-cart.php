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

    $name=$_GET['name'];
    $all = $_GET['all'];
    if($all==1)
    {
      mysqli_query($conn,"delete from cart where username='$u'");


    }
    else{
    mysqli_query($conn,"delete from cart where username='$u' and item_name='$name'");
  }
header('Location:cart.php');



?>
