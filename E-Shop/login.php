<?php
    include_once "php_scripts/connect_mySQL.php";
    session_start();
?>

<?php
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT count(*) FROM client WHERE (
		email = '".$email."' and password = '".$password."'
	)";
    $query = mysql_query($sql);

    $result = mysql_fetch_array($query);

    if($result[0]>0) {
       	echo "Logged in <br>";
       	$get_fname = "SELECT fname FROM client WHERE (
		email = '".$email."' and password = '".$password."'
		)";
		$query_fname = mysql_query($get_fname);
		$result_fname = mysql_fetch_array($query_fname);

		$get_lname = "SELECT lname FROM client WHERE (
		email = '".$email."' and password = '".$password."'
		)";
		$query_lname = mysql_query($get_lname);
		$result_lname = mysql_fetch_array($query_lname);
		
		$get_cart = "SELECT cart FROM client WHERE (
		email = '".$email."' and password = '".$password."'
		)";
		$query_cart = mysql_query($get_cart);
		$result_cart = mysql_fetch_array($query_cart);

		$fname = $result_fname[0];
		$lname = $result_lname[0];
		$cart = $result_cart[0];

		$_SESSION['fname'] =  $fname;
		$_SESSION['lname'] =  $lname;
		$_SESSION['email'] =  $email;
		$_SESSION['cart'] =  $cart;
		header("location: home.php"); 
    } 
    else
    	header("location: login_error.php");
?>