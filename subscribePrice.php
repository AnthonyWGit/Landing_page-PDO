<?php 
session_start();
require "db-functions.php"; 
$golem = 5;
$_SESSION['msg'] = $golem;
updateQuantity();
header("Location:index.php");
?>

