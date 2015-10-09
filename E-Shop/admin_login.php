<?php 
session_start();
if (isset($_SESSION["manager"])) {
	header("location: admin.php"); 
	exit();
}
?>
<?php 
if (isset($_POST["username"]) && isset($_POST["password"])) {

$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); 
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); 

include "php_scripts/connect_mySQL.php"; 
$member = mysql_query("SELECT id FROM admin WHERE username='$manager' AND password='$password' LIMIT 1"); 

$exist = mysql_num_rows($member);
if ($exist == 1) { 
	while($row = mysql_fetch_array($member)){ 
		$id = $row["id"];
	}
	$_SESSION["id"] = $id;
	$_SESSION["manager"] = $manager;
	$_SESSION["password"] = $password;
	header("location: admin.php");
	exit();
} else {
	echo 'That information is incorrect, try again <a href="admin.php">Click Here</a>';
	exit();
}
}
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

		<?php include("layouts/header_home.php");?>

		<div id="content">
			<div align="left" style="margin-left:24px;">
				<h2>Please Log In To Manage the Store</h2>
				<form id="form.." name="form.." method="post" action="admin_login.php">
					User Name:<br />
					<input name="username" type="text" id="username" size="40" />
					<br /><br />
					Password:<br />
					<input name="password" type="password" id="password" size="40" />
					<br />
					<br />
					<br />

					<input type="submit" name="button" id="button" value="Log In" />

				</form>
			</div>
			<br />
			<br />
			<br />
		</div>

		<?php include_once("layouts/footer.php");?>

	</div>
</body>
</html>