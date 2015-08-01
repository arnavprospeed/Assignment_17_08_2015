<?php require_once("../includes/functions/functions.php"); ?>
<?php require_once("../includes/functions/db_connection.php"); ?>
<?php
	if(isset($_POST['submit'])){
		create_article_page($_POST['title']);
		$icon_link=upload_image("icon_image");

		if($icon_link){
			$result=add_article($_POST['title'],$_POST['article_type'],$_POST['article_tag'],$_POST['tile_css'],$_POST['link'],$icon_link);
			$_POST = array();
			$update_confirmation="<p class=\"update-confirmed\">Page updated successfully. Go to <a href=\"index.php\">Home page</a> to preview.<p>";
		}
		else{
			$update_confirmation="Update failed please check the values input";
		}
	}


?>

<?php include("../includes/layouts/header.php"); ?>


<div class="main">
	<div class="content container" id="main-section">
		<br>
		<br><br><br>
		<br><br>

	<!-- heading -->
	<h3> Enter details Home page: New article</h3>
	<!-- form -->
	<form name="update-home" action="update-home.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

		<!-- Title of article -->
		<input  class="input-text rich-text" type="text" placeholder="Title" id="title" name="title"
		value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>" required
       oninvalid="this.setCustomValidity('User ID is a must')" oninput="setCustomValidity('')"></input>

	 <br>

	 <!-- Article type -->
		Article type:
		 <select id="article_type" name="article_type" required
				onchange="configureDropDownLists(this,document.getElementById('article_tag'))">
				 <option value="news">News</option>
				 <option value="reviews">Reviews</option>
				 <option value="trailers">Trailers</option>
				 <option value="tweaks">Tweaks</option>
		 </select>
		<br>

		<!-- Article tag -->
		Article tag:
		<select id="article_tag" name="article_tag">
		</select>
			 <br>

		<!-- Article Tile CSS -->
		CSS Tile class:
		<select id="tile_css" name="tile_css" required
		 	 oninvalid="this.setCustomValidity('Please provide a password')" oninput="setCustomValidity('')">
		 		<?php
				$tile_css=fetch_tile_css();
				while($tile_css_row=mysqli_fetch_assoc($tile_css)){
					echo "<option value=\"".$tile_css_row["tile_css_class"]."\">".$tile_css_row["tile_css_class"]."</option>";
				}?>
		</select>

		<!-- Icon image upload -->
		Select an icon image to upload:
		<input type="file" name="icon_image" id="icon_image"></input>



		<br>

		<!-- Name of file -->
		<input class="input-text" type="text" placeholder="Article file name (E.g. 'batman-pc-sales-suspended.php')" id="link" name="link"
		value="<?php echo isset($_POST['link']) ? $_POST['link'] : '' ?>" required
		   oninvalid="this.setCustomValidity('Please enter your Phone no')" oninput="setCustomValidity('')"></input>
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
	<br><br>
</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
