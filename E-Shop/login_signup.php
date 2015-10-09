<!DOCTYPE html>
<head>
	<title> eShop </title>
	<link rel="stylesheet" href="/E-Shop/assets/bootstrap-3.3.5/css/bootstrap.css">
	<link href="/E-Shop/assets/css/signup.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>
	<div align = "center" id = "mainWrapper">

		<?php include_once("layouts/header_login.php");?>

		<div id = "contentt">
			<div class="form">

    <ul class="tab-group">
        <li class="tab active"><a href="#ind">Login</a></li>
        <li class="tab"><a href="#org">Signup</a></li>
    </ul>

    <div class="tab-content">
    
        <div id="ind">   
            <h1 class="signup">Login!</h1>

            <form action="login.php" method="post">
                <div class="field-wrap">
                    <label>
                        Email
                    </label><BR><BR>
                    <input type="email" name = "email" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Password
                    </label><BR><BR>
                    <input type="password"  name = "password" required autocomplete="off"/>
                </div>
              

                <button type="submit" class="button button-block"/>Go!</button>

            </form>

        </div>   <!-- org -->

         	 <div id="org">   
            <h1 class="signup">Join US!</h1>

            <form action="signup.php" method="post">

                <div class="top-row">
                    <div class="field-wrap">
                        <label>
                            First Name<span class="req">*</span>
                        </label><BR><BR>
                        <input type="text" name = "fname" required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <label>
                            Last Name<span class="req">*</span>
                        </label><BR><BR>
                        <input type="text" name = "lname" required autocomplete="off"/>
                    </div>
                </div>

                <div class="field-wrap">
                    <label>
                        Email<span class="req">*</span>
                    </label><BR><BR>
                    <input type="email" name = "email" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Set A Password<span class="req">*</span>
                    </label><BR><BR>
                    <input type="password"  name = "password" required autocomplete="off"/>
                </div>

           

                <button type="submit" class="button button-block"/>Get Started</button>

            </form>

        </div>
        <!-- ind -->
    </div><!-- tab-content -->

</div> <!-- /form -->
		</div>

		<?php include_once("layouts/footer.php");?>

	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="/E-Shop/assets/js/signup.js"></script>
	<script src="/E-Shop/assets/js/main.js"></script>
	<script src="/E-Shop/assets/js/jquery.min.js"></script>
	<script src="/E-Shop/assets/bootstrap-3.3.5/js/bootstrap.js"></script>
	<script type="text/javascript" src="/E-Shop/assets/js/jquery.leanModal.min.js"></script>
</body>