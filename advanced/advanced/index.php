<?php
	include_once("connection.php");
	session_start();

	if(isset($_SESSION['logged_in'])){
		header("Location: home.php");
	}

?>

<html>
<head>
	<title>Login and Registration</title>
	<link rel="stylesheet" type="text/css" href="global.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

	<script type="text/javascript">
	// $(document).ready(function(){
	// });
	</script>

</head>
<body>
<div class="container">
	<div class="login">
		<h3>Login</h3>
		<form action="process.php" method="post">
			<input type="hidden" name="action" value="login" />
			<input type="text" name="email" placeholder="Email address" />
			<input type="password" name="password" placeholder="Password" />
			<input type="submit" value="Login" />
		</form>
		<br>
		<div class="errors">
			<?php
				if(isset($_SESSION['login_errors'])){
					echo '<div class="error"><p>'.$_SESSION['login_errors']['email'].'</p></div>';
					echo '<div class="error"><p>'.$_SESSION['login_errors']['password'].'</p></div>';
					unset($_SESSION['login_errors']);
				}
			?>
		</div>
	</div>

	<div class="registration">
		<h1>Registration</h1>
		<div class="errors">
		<?php
			if(isset($_SESSION['register_errors'])){
				foreach($_SESSION['register_errors'] as $error){
					echo $error ."<br />";
				}
				unset($_SESSION['register_errors']);
			}
		?>	
		</div>
		<form action="process.php" method="post">
			<input type="hidden" name="action" value="register" />
			<input type="text" name="first_name" placeholder="First Name" /><br />
			<input type="text" name="last_name" placeholder="Last Name" /><br />
			<input type="text" name="email" placeholder="Email address" /><br />
			<input type="password" name="password" placeholder="Password" /><br />
			<input type="password" name="confirm_password" placeholder="Confirm Password" /><br />
			<input type="submit" value="Register" />
		</form>
	</div>
</div>
</body>
</html>