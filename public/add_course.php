<?php require_once("../includes/functions/functions.php"); ?>
<?php require_once("../includes/functions/db_connection.php"); ?>
<?php
	if(isset($_POST['submit'])){
		if(isset($_POST['course_title'])&&isset($_POST['course_category'])&&isset($_POST['author'])&&isset($_POST['MRP'])&&isset($_POST['SP'])){
			$valid=validate($_POST['course_title'],$_POST['course_category'],$_POST['author'],$_POST['MRP'],$_POST['SP']);
			if($valid){
				$result=add_course($_POST['course_title'],$_POST['course_category'],$_POST['author'],$_POST['MRP'],$_POST['SP']);
				if($result){
					$course_added=true;
					$_POST = array();
				}
				else {
					$course_added=false;
				}
			}
			else {
				$validity=false;
			}
		}

	}


?>

<?php include("../includes/layouts/header.php"); ?>


<div class="main">
	<div class="content container" id="main-section">
		<br><br>

<div class="row">
	<div class="col-md-6 col-sm-12 col-xs-12">
	<!-- heading -->
	<h2>Add new courses</h2>
	<h3> Enter details for new course</h3>
	<!-- form -->
	<form name="add_course" id="add_course" action="add_course.php" method="POST" onsubmit="return validateNewCourse()">

		<!-- Title of course -->
		Course Title:
		<input  class="input-text rich-text" type="text" placeholder="Course title" id="course_title" name="course_title"
		value="<?php echo isset($_POST['course_title']) ? $_POST['course_title'] : '' ?>" required
       oninvalid="this.setCustomValidity('Course title is a must')" oninput="setCustomValidity('')"></input>

	 <br>
	 <br>



		<!-- Course category -->
		Course Category:
		<select id="course_category" name="course_category" required
		 	 oninvalid="this.setCustomValidity('Please provide a course category')" oninput="setCustomValidity('')">
		 		<?php
				$course_category=fetch_course_category();
				while($course_category_row=mysqli_fetch_assoc($course_category)){
					echo "<option value=\"".$course_category_row["category_id"]."\">".$course_category_row["category_name"]."</option>";
				}?>
		</select>
		<br>
		<br>

		<!-- Author of course -->
		Author:
		<input  class="input-text rich-text" type="text" placeholder="Author" id="author" name="author"
		value="<?php echo isset($_POST['author']) ? $_POST['author'] : '' ?>" required
			 oninvalid="this.setCustomValidity('Author is a must')" oninput="setCustomValidity('')"></input>

	 <br>
	 <br>

		<!-- MRP of Course -->
		MRP of course:
		<input class="MRP" type="text" placeholder="MRP of the course" id="MRP" name="MRP"
		value="<?php echo isset($_POST['MRP']) ? $_POST['MRP'] : '' ?>" required
		   oninvalid="this.setCustomValidity('Please enter MRP')" oninput="setCustomValidity('')"></input>&nbsp
		<br>
		<br>
		Selling price of course:
		<input class="SP" type="text" placeholder="Selling Price of the course" id="SP" name="SP"
		value="<?php echo isset($_POST['SP']) ? $_POST['SP'] : '' ?>" required
			 oninvalid="this.setCustomValidity('Please enter SP')" oninput="setCustomValidity('')"></input>&nbsp
		<br>
		<br>

		<input type="submit" id="submit" name="submit"></input>&nbsp

	</form>

	<?php
	if(isset($validity)){
		if(!$validity)
			echo "Invalid input";
	}
	if(isset($added)){
		if($added){
			echo "successfully added.";
		}
		else {
			echo "Failed";
		}
	}
	?>
	<br>
</div>
<div class="col-md-6 col-sm-12 col-xs-12 article_preview_col">

	<div id="course_list">
		<!-- heading -->
		<h2>Edit courses</h2>
		<h3>Select the course you want to edit</h3>
		<!-- form -->
		<form name="edit_course" id="edit_course" action="edit_course.php" method="POST" onsubmit="return validateNewCourse()">
			<?php
				
				$course_list=fetch_course_list();

				while($course_list_row=mysqli_fetch_assoc($course_list)){
					echo "<input type=\"radio\" name=\"course_id\" id=\"course_id\" value=\"".$course_list_row["course_id"]."\">".$course_list_row["course_name"]."</option><br>";
				}
			?>
			<input type="submit" id="submit" name="submit" value="Edit Course"></input>
		</form>
	</div>
</div>
</div>


</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
