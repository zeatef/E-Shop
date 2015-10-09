<?php 
session_start();
$logged = '';
if (!isset($_SESSION["email"])) {
  $logged = 'no'; 
}
else {
  $logged = 'yes';
  $fname = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["fname"]);
  $lname = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["lname"]); 
  $email = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["email"]);

}


?>

<?php 
// Check to see the URL variable is set and that it exists in the database
if (isset($_GET['id'])) {
// Connect to the MySQL database  
  include "php_scripts/connect_mySQL.php"; 
  $id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
// Use this var to check to see if this ID exists, if yes then get the product 
// details, if no then exit this script and give message why
  $sql = mysql_query("SELECT * FROM products WHERE id='$id' LIMIT 1");
$productCount = mysql_num_rows($sql); // count the output amount
$available = "";
if ($productCount > 0) {
// get all the product details
  while($row = mysql_fetch_array($sql)){ 
    $product_name = $row["product_name"];
    $price = $row["price"];
    $details = $row["details"];
    $category = $row["category"];
    $subcategory = $row["subcategory"];
    $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
    $stock = $row["stock"];
  }

  if($stock > 10) {
    $available = "<p class = 'text-success' align = 'left'><strong>In Stock. <span class='glyphicon glyphicon-ok'></strong></p>";
  }
  elseif($stock > 0) {
    $available = "<p class = 'text-success' align = 'left'><strong>Only $stock items left.. <span class='glyphicon glyphicon-ok'></strong></p>";

  }
  else {
    $available .= "<p class = 'text-danger' align = 'left'>Sold Out <span class='glyphicon glyphicon-remove'></p>";
  }

} else {
  echo "That item does not exist.";
  exit();
}

} else {
  echo "Data to render this page is missing.";
  exit();
}
mysql_close();
?>
<!DOCTYPE html>
<head>
  <title><?php echo $product_name; ?></title>
  <link rel="stylesheet" href="/E-Shop/assets/bootstrap-3.3.5/css/bootstrap.css">
  <link href="/E-Shop/assets/css/main.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>
  <div align = "center" id = "mainWrapper">
    <?php
            if($logged == 'no') {
                include_once("layouts/header_home.php");
            }
            else {
              include_once("layouts/header_client.php");
            }
    ?>
    <div id = "contentt">

      <div class="container-fluid" id ="container-product">
        <div class="row">
          <div class="col-md-3">
            <img alt="<?php echo $product_name; ?>" src="assets/inventory_images/<?php echo $id; ?>.png"  height = "300" width = "300" /> 
            <br> 
            <a href="assets/inventory_images/<?php echo $id; ?>.png">View Full Size Image</a></td>
          </div>
          <div class="col-md-">
            <h3 class="text-danger" align ="left">
              <u><strong><?php echo $product_name; ?></strong></u>
            </h3>
            <p align ="left">
              <?php echo "$".$price; ?><br />
              <br />
              <?php echo "Category: $category <br /> Subcategory: $subcategory"; ?> <br />
              <br />
              <?php echo $details; ?> 
              <br />
              <?php echo $available; ?>
            </p>
            <?php
            if($logged == 'yes') {
              if($stock > 0) {
                echo '<form id="form1" name="form1" method="POST" action="cart.php">
                <input type="hidden" name="pid" id="pid" value="'.$id.' " />
                <a href = "cart.php"> <input type="submit" name="button" id="button" class="btn btn-success" style="float:left;" value="Add to Shopping Cart" /></a>
                </form>';
              }
            }
            else {
              echo '<a href = "login_signup.php"> <button class = "btn btn-primary" style ="float:left;">Login or Sign Up Now!</button></a>';
            }
            ?>


          </div>
        </div>
      </div>
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