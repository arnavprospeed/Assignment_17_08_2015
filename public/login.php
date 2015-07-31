<?php session_start(); ?>
<?php include("../includes/layouts/header.php"); ?>
<?php require_once("../includes/functions/functions.php"); ?>
<?php require_once("../includes/functions/db_connection.php"); ?>
<?php
	if(isset($_GET["signedup"]))
	{
		if($_GET["signedup"]==1){
			echo "Account created successfully. Please log in.";
		}
	}
	if(isset($_POST["username"])){
		if(validate_user($_POST["username"],$_POST["password"])){
				$_SESSION["username"]=$_POST["username"];
				redirect("home.php");
				//echo "Valid user";
		}
		else{
			echo "<p id=\"invalid_cred\">Invalid Username or Password</p>";
		}
	}
?>
<html>
<body>
	<div id="main">
		<h3> Log in:</h3>
		<form name="login" action="index.php" method="POST">
			<input type="text" placeholder="username" id="username" name="username"
			value="<?php echo isset($_POST['username']) ? htmlentities($_POST['username']) : '' ?>" required
	       oninvalid="this.setCustomValidity('User ID is a must')" oninput="setCustomValidity('')">
				 </input>
				 <br>
			<input type="password" placeholder="password" id="password" name="password" required
	       oninvalid="this.setCustomValidity('Password is a must')" oninput="setCustomValidity('')"></input>
			<br>
			<input type="submit" id="submit" name="Submit"></input>
		</form>
		<br>
		<hr>

		<br>
		<a href="signup.php">Sign up for new account for free!</a>
		<br>
	</div>
</body>
<?php include("../includes/layouts/footer.php"); ?>
