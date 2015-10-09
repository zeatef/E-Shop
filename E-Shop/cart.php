<?php 
session_start();
include "php_scripts/connect_mySQL.php"; 

$logged = '';
$counter = 0;
if (!isset($_SESSION["email"])) {
  $logged = 'no'; 
}
else {
  $logged = 'yes';
  $fname = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["fname"]);
  $lname = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["lname"]); 
  $email = $_SESSION["email"];
  $cart = $_SESSION["cart"];
}

if(isset($_POST['pid'])) {
  $item_to_add = $_POST['pid'];
  $cart .= $item_to_add;
  $test = "UPDATE `eShop`.`client` SET `cart` = '$cart' WHERE ( email = '$email')";
mysql_query($test) or die(mysql_error());;
$displayed = '';
if(strlen($cart) === 0) {
  $displayed = "You have no products added to your cart yet.";
}
else {
  if(strlen($cart) === 0) {
    $displayed = "You have no products added to your cart yet.";
  }
  else {
    $items = str_split($cart);
    $no_items_in_cart = count($items);
    while ( $counter < $no_items_in_cart) {
      $l = $items[$counter];
      $tt = "SELECT * FROM `eShop`.`products` WHERE (
    id = '".$l."')";
      $sql = mysql_query($tt) or die(mysql_error());;;
      while($row = mysql_fetch_array($sql)){ 
        $id = $row["id"];
        $product_name = $row["product_name"];
        $price = $row["price"];
        $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
        $stock = $row["stock"];
        $displayed .= "<tr style ='border-bottom: 1px solid #ddd;'><th><h5 class = 'zodiac'> <strong>$product_name</strong> - Price: $$price &nbsp; &nbsp; &nbsp; </h5></th><th><h5 class = 'zodiac'> <a href='product.php?id=$id'>View Product</a> &bull; <a href='#'>Remove From Cart</a></h5> </th></tr>";
      }
      $counter++;


    }
  }

}
}

else {
  $displayed = '';
  if(strlen($cart) === 0) {
    $displayed = "You have no products added to your cart yet.";
  }
  else {
    $items = str_split($cart);
    $no_items_in_cart = count($items);
    while ( $counter < $no_items_in_cart) {
      $k = $items[$counter];
       $tt = "SELECT * FROM `eShop`.`products` WHERE (
       id = '".$k."')";
      $sql = mysql_query($tt) or die(mysql_error());;;
      while($row = mysql_fetch_array($sql)){ 
        $id = $row["id"];
        $product_name = $row["product_name"];
        $price = $row["price"];
        $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
        $stock = $row["stock"];
        $displayed .= "<tr style ='border-bottom: 1px solid #ddd;'><th><h5 class = 'zodiac'> <strong>$product_name</strong> - Price: $$price &nbsp; &nbsp; &nbsp; </h5></th><th><h5 class = 'zodiac'> <a href='product.php?id=$id'>View Product</a> &bull; <a href='#'>Remove From Cart</a></h5> </th></tr>";
      }
      $counter++;


    }
  }
}

?>


<!DOCTYPE html>
<head>
  <title><?php echo "eShop | " .$fname. " " .$lname ."'s Cart" ?></title>
  <link rel="stylesheet" href="/E-Shop/assets/bootstrap-3.3.5/css/bootstrap.css">
  <link href="/E-Shop/assets/css/main.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>
  <div align = "center" id = "mainWrapper">
    <?php
    include_once("layouts/header_client.php");
    ?>
    <div id = "contentt">


      <div align ="left" style ="margin-left:25px;">
        <h1>
          <u><strong><?php echo $fname. " " .$lname ."'s Cart:" ?></strong></strong></u><br>
        </h1>
        <br>
        <table width= "100%"; style ="margin-left:25px; border-bottom: 1px solid #ddd;" align = "left">
          <?php echo $displayed; ?>
        </table>

      </div>
      <?php if($cart !== '') {
        echo ('<form id="formmm" name="formmm" method="post" action="checkout.php">
          <input type="hidden" name="items" id="items" value="<?php echo $items; ?>" />
          <input type="submit" name="button" id="button"  class="btn btn-lg btn-primary" style="float:right; margin-top: 2%; margin-right : 300px;" value="Proceed To Checkout" />
          </form>');
        }?>
      </div>


      <?php include_once("layouts/footer.php");?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="/E-Shop/assets/js/main.js"></script>
    <script src="/E-Shop/assets/bootstrap-3.3.5/js/bootstrap.js"></script>
    <script type="text/javascript" src="/E-Shop/assets/js/jquery.leanModal.min.js"></script>
  </body>
  </html>