<?php
    include_once "php_scripts/connect_mySQL.php"
?>

<?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT into client (fname, lname, email, password) VALUES (
		'".$fname."',
		'".$lname."',
		'".$email."',
		'".$password."'
	)";
    $query = mysql_query($sql);

    if(!$query) {
    	echo "Failed".mysql_error();
    }
    else {
    	session_start();
    	$_SESSION['fname'] =  $fname;
		$_SESSION['lname'] =  $lname;
		$_SESSION['email'] =  $email;
		header("location: home.php");     	
    }
?>
	