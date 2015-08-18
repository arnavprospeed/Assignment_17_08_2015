<?php require_once("../includes/functions/sessions.php"); ?>
<?php require_once("../includes/functions/functions.php"); ?>
<?php require_once("../includes/functions/db_connection.php"); ?>

<?php
	if(isset($_GET["signedup"]))
	{
		if($_GET["signedup"]==1){
			$signedup=1;
		}
	}
	if(isset($_POST["username"])){
		if(validate_user($_POST["username"],$_POST["password"])){
				$_SESSION["username"]=$_POST["username"];
				redirect("add_course.php");
				//echo "Valid user";
		}
		else{
			echo "<p id=\"invalid_cred\">Invalid Username or Password</p>";
		}
	}
?>
<?php include("../includes/layouts/header.php"); ?>
<div class="main">
	<div class="content container" id="main-section">
		<br><br>
		<div class="row">
			<div class="col-md-3 col-sm-12 col-xs-12">
			</div>
			<div class="col-md-6 col-sm-12 col-xs-12">

				<h4><?php
				if(isset($_SESSION['unauth_user'])){
						echo "You need to log in first.";
				}
				if(isset($signedup)&&$signedup==1) echo "Account created successfully. Please log in.";?></h4>
				<h3> Log in:</h3>
				<form name="login" action="login.php" method="POST">
					<input type="text" class="form-control" placeholder="username" id="username" name="username"
					value="<?php echo isset($_POST['username']) ? htmlentities($_POST['username']) : '' ?>" required
			       oninvalid="this.setCustomValidity('User ID is a must')" oninput="setCustomValidity('')">
						 </input>
						 <br>
					<input type="password" class="form-control" placeholder="password" id="password" name="password" required
			       oninvalid="this.setCustomValidity('Password is a must')" oninput="setCustomValidity('')"></input>
						 <br>
					<input type="submit" class="btn btn-default" id="submit" name="Submit"></input>
				</form>
				<br>
				<hr>

				<br>
				<a href="signup.php">Sign up for new account for free!</a>
				<br>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
			</div>
		</div>
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
