<?php require_once("../includes/functions/functions.php"); ?>
<?php require_once("../includes/functions/db_connection.php"); ?>
<?php
	if(isset($_POST['submit'])){
		$result=add_article($_POST['title'],$_POST['article-type'],$_POST['tile_css'],$_POST['link'],$_POST['icon_link']);
		if($result){
			$update_confirmation="<p class=\"update-confirmed\">Page updated successfully. Go to <a href=\"index.php\">Home page</a> to preview.<p>";
		}
		else{
			$update_confirmation="Update failed please check the values input";
		}
	}


?>

<?php include("../includes/layouts/header.php"); ?>
<br>
<br><br><br>

<div class="main">
	<div class="content container" id="main-section">

		<br><br>
	<h3> Enter details Home page: New article</h3>
	<form name="update-home" action="update-home.php" method="POST" onsubmit="return validateForm()">
		<input  class="input-text rich-text" type="text" placeholder="Title" id="title" name="title"
		value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>" required
       oninvalid="this.setCustomValidity('User ID is a must')" oninput="setCustomValidity('')"></input>
			 <!--<input type="button" value="Check Availability" onsubmit="signup.php"></input>-->
			 <br>
		Article tag:
		<select id="article-type" name="article-type" required
       oninvalid="this.setCustomValidity('Please provide a password')" oninput="setCustomValidity('')">
		 		<option value="news">News</option>
				<option value="reviews">Reviews</option>
				<option value="trailers">Trailers</option>
				<option value="tweaks">Tweaks</option>
		</select>
			 <br>
		CSS Tile class:
		<select id="tile_css" name="tile_css" required
		 	 oninvalid="this.setCustomValidity('Please provide a password')" oninput="setCustomValidity('')">
		 		<?php
				$tile_css=fetch_tile_css();
				while($tile_css_row=mysqli_fetch_assoc($tile_css)){
					echo "<option value=\"".$tile_css_row["tile_css_class"]."\">".$tile_css_row["tile_css_class"]."</option>";
				}

				?>
		</select>
		<br>

		<input class="input-text" type="text" placeholder="Hyperlink (E.g. 'batman.html')" id="link" name="link"
		value="<?php echo isset($_POST['link']) ? $_POST['link'] : '' ?>" required
		   oninvalid="this.setCustomValidity('Please enter your Phone no')" oninput="setCustomValidity('')"></input>
			 <br>
		<input class="input-text" type="text" placeholder="Icon link (E.g. 'img/batman.jpg')" id="icon_link" name="icon_link"
		value="<?php echo isset($_POST['icon_link']) ? $_POST['icon_link'] : '' ?>" required
	 		 oninvalid="this.setCustomValidity('Please enter your email id')" oninput="setCustomValidity('')"></input>
		<br>
		<input type="submit" id="submit" name="submit"></input>
	</form>
	<?php
	if(isset($update_confirmation)){
		echo $update_confirmation;
	}
	?>
	<br>
	<hr>
	<br>
	<a href="index.php">Have an account? Log in</a>
	<br><br>
</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
