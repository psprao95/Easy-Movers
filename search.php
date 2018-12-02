<?php
session_start();

$_SESSION['category']=$_POST['categ'];
$_SESSION['s']=$_POST['sea'];
header('Location:dashboard.php'); ?>
