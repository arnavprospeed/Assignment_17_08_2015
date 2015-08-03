<?php require_once("../includes/functions/functions.php"); ?>
<?php require_once("../includes/functions/db_connection.php"); ?>
<?php
	if(isset($_POST['submit'])){

		$icon_link=upload_image("icon_image");

		if($icon_link){
			$link=$_POST['link'].".php";
			$result=add_article($_POST['title'],$_POST['article_type'],$_POST['article_tag'],$_POST['tile_css'],$link,$icon_link);
			if($result){
				$_POST = array();
				$update_confirmation="<p class=\"update-confirmed\">Page updated successfully. Go to <a href=\"index.php\">Home page</a> to review.<p>";
			}
			else $update_confirmation="Adding article failed";
		}
		else{
			$update_confirmation="Update failed please check the values input";
		}
	}


?>

<?php include("../includes/layouts/header.php"); ?>


<div class="main">
	<div class="content container" id="main-section">
		<br><br>
		<h4>**Please view this page on IE10, Google Chrome or Mozilla Firefox only.</h2>
<div class="row">
	<div class="col-md-6 col-sm-12 col-xs-12">
	<!-- heading -->
	<h3> Enter details Home page: New article</h3>
	<!-- form -->
	<form name="update_home" id="update_home" action="update_home.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

		<!-- Title of article -->
		<input  class="input-text rich-text" type="text" placeholder="Title" id="title" name="title"
		value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>" required
       oninvalid="this.setCustomValidity('User ID is a must')" oninput="setCustomValidity('')"></input>

	 <br>
	 <br>
	 <!-- Article type -->
		Article type:
		 <select id="article_type" name="article_type" required
				onchange="configureDropDownLists(this,document.getElementById('article_tag'))">
				 <option value="News">News</option>
				 <option value="Reviews">Reviews</option>
				 <option value="Trailers">Trailers</option>
				 <option value="Tweaks">Tweaks</option>
		 </select>
		&nbsp&nbsp&nbsp

		<!-- Article tag -->
		Article tag:
		<select id="article_tag" name="article_tag">
		</select>
			 <br>
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
		<br>
		<br>
		<!-- Icon image upload -->
		Select an icon image to upload:&nbsp&nbsp&nbsp<input type="file" name="icon_image" id="icon_image"></input>
		<br>

		<!-- Name of file -->
		<input class="input-text" type="text" placeholder="Article file name without filetype extension(E.g. 'batman-pc-sales-suspended')" id="link" name="link"
		value="<?php echo isset($_POST['link']) ? $_POST['link'] : '' ?>" required
		   oninvalid="this.setCustomValidity('Please enter your Phone no')" oninput="setCustomValidity('')"></input>&nbsp.php
		<br>
		<br>

		<input type="submit" id="submit" name="submit"></input>&nbsp
		<input type="button" id="article_preview_button" name="article_preview_button" value="Preview" onclick="article_preview();"></input>
	</form>
	<?php
	if(isset($update_confirmation)){
		echo $update_confirmation;
	}
	?>
	<br>
</div>
<div class="col-md-6 col-sm-12 col-xs-12 article_preview_col">
	<h3>preview</h3>
	<progress></progress>
	<div id="article_preview"></div>
</div>
</div>


</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
