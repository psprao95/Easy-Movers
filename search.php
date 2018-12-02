<?php
session_start();

$_SESSION['category']=$_POST['categ'];
header('Location:dashboard.php'); ?>
