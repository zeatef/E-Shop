<?php 
session_start();
if (isset($_SESSION["email"])) {
	header("location: home_client.php"); 
	exit();
}
?>

<?php 
// Run a select query to get my letest 8 items
// Connect to the MySQL database  
include "php_scripts/connect_mySQL.php"; 
$i = 0;
$dynamicList = '<div class="container-fluid">';
$sql = mysql_query("SELECT * FROM products ORDER BY date_added DESC");
$productCount = mysql_num_rows($sql);
$available = "";
if ($productCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
		$id = $row["id"];
		$product_name = $row["product_name"];
		$price = $row["price"];
		$date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
		$stock = $row["stock"];
		if($stock > 0) {
    		$available = "<p class = 'text-success' align = 'center'>In Stock <span class='glyphicon glyphicon-ok'></p>";
  		}
  		else {
   			 $available = "<p class = 'text-danger' align = 'center'>Sold Out <span class='glyphicon glyphicon-remove'></p>";
  		}
		if ($i == 0) { // if $i is divisible by our target number (in this case "3")
			$dynamicList .= '<div class="row" id = "zodiac">
								<div class="col-md-3" id = "wizo">
									<a href="product.php?id=' . $id . '"><img alt="' . $product_name . '" src="/E-Shop/assets/inventory_images/' . $id . '.png"  class="img-thumbnail" width = "300" height = "300"/></a>
									<p>
										' . $product_name . ' <br>
										$' . $price . ' <br>
										' . $available . '
									</p> 
									<button type="button" class="btn btn-default">
										<a href="product.php?id=' . $id . '">View Product Details</a></> </td>
									</button>
								</div>';

		} 
		elseif ($i %4 == 0) {
			$dynamicList .= '</div><div class="row" id ="zodiac">
								<div class="col-md-3" id = "wizo">
									<a href="product.php?id=' . $id . '"><img alt="' . $product_name . '" src="/E-Shop/assets/inventory_images/' . $id . '.png"  class="img-thumbnail" width = "300" height = "300" /></a>
									<p>
										' . $product_name . ' <br>
										$' . $price . ' <br>
										' . $available . '
									</p> 
									<button type="button" class="btn btn-default">
										<a href="product.php?id=' . $id . '">View Product Details</a></> </td>
									</button>
								</div>';
		}
		else {
			$dynamicList .= '	<div class="col-md-3" id = "wizo">
									<a href="product.php?id=' . $id . '"><img alt="' . $product_name . '" src="/E-Shop/assets/inventory_images/' .$id . '.png"  class="img-thumbnail" width = "300" height = "300"/></a>
									<p >
										' . $product_name . ' <br>
										$' . $price . ' <br>
										' . $available . '
									</p> 
									<button type="button" class="btn btn-default">
										<a href="product.php?id=' . $id . '">View Product Details</a></> </td>
									</button>
								</div>';
		}
$i++;
}
$dynamicList .= '</tr></table>';
} else {
	$dynamicList = "We have no products yet";
}
mysql_close();
?>
<!DOCTYPE html>
<head>
	<title> eShop </title>
	<link rel="stylesheet" href="/E-Shop/assets/bootstrap-3.3.5/css/bootstrap.css">
	<link href="/E-Shop/assets/css/main.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>
	<div align = "center" id = "mainWrapper">

		<?php include_once("layouts/header_home.php");?>

		<div id = "content">
			<div id = "#home">
				<?php echo $dynamicList; ?>
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