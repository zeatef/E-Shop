<?php 
session_start();

include "php_scripts/connect_mySQL.php"; 
  $email = $_SESSION["email"];
  $cart = $_SESSION["cart"];

$test = "UPDATE `eShop`.`client` SET `cart` = '' WHERE (email = '".$email."')";
  mysql_query($test) or die(mysql_error());;



session_destroy();

header("location: home.php"); 
exit();
?>
