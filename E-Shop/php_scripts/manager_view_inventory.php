<?php 
// Select all products from the db and display them.
$product_list = "";
$sql = mysql_query("SELECT * FROM products ORDER BY date_added DESC");
$productCount = mysql_num_rows($sql);
if ($productCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
		$id = $row["id"];
		$product_name = $row["product_name"];
		$price = $row["price"];
		$date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
		$stock = $row["stock"];
		$product_list .= "ID: $id - <strong>$product_name</strong> - $$price - Stock: $stock - <em>Added $date_added</em> &nbsp; &nbsp; &nbsp; <a href='product_edit.php?pid=$id'>Edit</a> &bull; <a href='admin.php?deleteid=$id'>Delete</a><br />";
	}
} else {
	$product_list = "You have no products listed in your store yet";
}
?>