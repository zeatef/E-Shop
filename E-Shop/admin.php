<?php
	include "php_scripts/manager_login.php"; 
?>

<?php 
	include "php_scripts/manager_delete.php"; 
?>
<?php 
	include "php_scripts/manager_add.php"; 
?>

<?php 
	include "php_scripts/manager_view_inventory.php";
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
			<div align="right" style="margin-right:32px;"><a href="admin.php#inventoryForm">+ Add New Inventory Item</a></div>
			<div align="left" style="margin-left:24px;">
				<h2>Inventory list</h2>
				<?php echo $product_list; ?>
			</div>
			<hr />
			<a name="inventoryForm" id="inventoryForm"></a>
			<h3>
				&darr; Add New Inventory Item Form &darr;
			</h3>
			<form action="admin.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
				<table width="90%" border="0" cellspacing="0" cellpadding="6">
					<tr>
						<td width="20%" align="right">Product Name</td>
						<td width="80%"><label>
							<input name="product_name" type="text" id="product_name" size="64" />
						</label></td>
					</tr>
					<tr>
						<td align="right">Product Price</td>
						<td><label>
							$
							<input name="price" type="text" id="price" size="12" />
						</label></td>
					</tr>
					<tr>
						<td align="right">Category</td>
						<td><label>
							<select name="category" id="category">
								<option value="Clothing">Clothing</option>
							</select>
						</label></td>
					</tr>
					<tr>
						<td align="right">Subcategory</td>
						<td><select name="subcategory" id="subcategory">
							<option value=""></option>
							<option value="Hats">Hats</option>
							<option value="Pants">Pants</option>
							<option value="Shirts">Shirts</option>
							<option value="Shirts">Shoes</option>
						</select></td>
					</tr>
					<tr>
						<td align="right">Product Details</td>
						<td><label>
							<textarea name="details" id="details" cols="64" rows="5"></textarea>
						</label></td>
					</tr>
					<tr>
						<td align="right">Product Image</td>
						<td><label>
							<input type="file" name="fileField" id="fileField" />
						</label></td>
					</tr>      
					<tr>
						<td>&nbsp;</td>
						<td><label>
							<input type="submit" name="button" id="button" value="Add This Item Now" onclick="javascript:return validateMyForm();" />
						</label></td>
					</tr>
				</table>
			</form>
			<br />
			<br />
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