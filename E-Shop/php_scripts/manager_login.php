<?php 
//Start session, connect to mySQL and make sure the logged session record's is in the db. 
session_start();
if (!isset($_SESSION["manager"])) {
	header("location: admin_login.php"); 
	exit();
}

$managerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]);
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]); 
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]);


include "php_scripts/connect_mySQL.php"; 
$member = mysql_query("SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1");

$exist = mysql_num_rows($member);
if ($exist == 0) {
	echo "Your login session data is not recorded in the database.";
	exit();
}
?>
<?php 