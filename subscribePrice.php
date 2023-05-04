<?php 
session_start();
require "db-functions.php"; 

$_SESSION['msg'] = "placeholder";
updateQuantity();
header("Location:index.php");
?>

