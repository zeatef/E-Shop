<?php 
// Delete Item Question to Admin and Delete Product if they choose yes.
if (isset($_GET['deleteid'])) {
	echo 'Do you really want to delete product with ID of ' . $_GET['deleteid'] . '? <a href="admin.php?yesdelete=' . $_GET['deleteid'] . '">Yes</a> | <a href="admin.php">No</a>';
	exit();
}
if (isset($_GET['yesdelete'])) {
// Remove item from system and delete its picture.
// Delete item from db.
	$id_to_delete = $_GET['yesdelete'];
	$sql = mysql_query("DELETE FROM products WHERE id='$id_to_delete' LIMIT 1") or die (mysql_error());
// Unlink the image from server
// Remove The Pic 
	$pictodelete = ("/assets/inventory_images/$id_to_delete.jpg");
	if (file_exists($pictodelete)) {
		unlink($pictodelete);
	}
	header("location: admin.php"); 
	exit();
}
?>