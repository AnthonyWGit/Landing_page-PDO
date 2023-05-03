<?php 
session_start();
require "db-functions.php"; 
$_SESSION['news'] = "Thank you for your support";
var_dump($_POST);

addEmail();

header("Location:newsletter.php");
?>

