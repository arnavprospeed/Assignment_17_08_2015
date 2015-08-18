<?php require_once("../includes/functions/sessions.php"); ?>
<?php require_once("../includes/functions/functions.php"); ?>
<?php require_once("../includes/functions/db_connection.php"); ?>
<?php
	if(!isset($_SESSION['username'])){
		$_SESSION['unauth_user']=1;
		redirect("login.php");
	}
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


<div class="row">
	<div class="col-md-6 col-sm-12 col-xs-12 add-course">
	<!-- heading -->
	<h2>Add new courses</h2>
	<h3> Enter details for new course</h3>
	<!-- form -->
	<form name="add_course" id="add_course" action="add_course.php" method="POST" onsubmit="return validateNewCourse()">

		<!-- Title of course -->
		<table class="form_new_course" style="width:500px;">
			<tr>
				<td>Course Title:</td>
				<td><input  class="input-text rich-text form-control" type="text" placeholder="Course title" id="course_title" name="course_title"
				value="<?php echo isset($_POST['course_title']) ? $_POST['course_title'] : '' ?>" required
		       oninvalid="this.setCustomValidity('Course title is a must')" oninput="setCustomValidity('')"></input></td>
		 </tr>


		 <tr>
		<!-- Course category -->
		<td>Course Category:</td>
		<td><select id="course_category" class="form-control" name="course_category" required
		 	 oninvalid="this.setCustomValidity('Please provide a course category')" oninput="setCustomValidity('')">
		 		<?php
				$course_category=fetch_course_category();
				while($course_category_row=mysqli_fetch_assoc($course_category)){
					echo "<option value=\"".$course_category_row["category_id"]."\">".$course_category_row["category_name"]."</option>";
				}?>
		</select></td>
		</tr>

		<tr>
		<!-- Course level -->
		<td>Course Category:</td>
		<td><select id="course_category" class="form-control" name="course_category" required
		 	 oninvalid="this.setCustomValidity('Please provide a course category')" oninput="setCustomValidity('')">
			 <option value="beginner">Beginner</option>
			 <option value="intermediate">Intermediate</option>
			 <option value="advanced">Advanced</option>
		</select></td>
		</tr>

		<!-- Author of course -->
		<tr>
			<td>Author:</td>
			<td><input class="input-text rich-text form-control" type="text" placeholder="Author" id="author" name="author"
			value="<?php echo isset($_POST['author']) ? $_POST['author'] : '' ?>" required
				 oninvalid="this.setCustomValidity('Author is a must')" oninput="setCustomValidity('')"></input>
			</td>
		</tr>

		<tr>
			<!-- MRP of Course -->
			<td>MRP of course:</td>
			<td>
			<input class="MRP form-control" type="text" placeholder="MRP of the course" id="MRP" name="MRP"
			value="<?php echo isset($_POST['MRP']) ? $_POST['MRP'] : '' ?>" required
			   oninvalid="this.setCustomValidity('Please enter MRP')" oninput="setCustomValidity('')"></input>
			</td>
		</tr>

		<tr>
			<td>Selling price of course:</td>
			<td>
			<input class="SP form-control" type="text" placeholder="Selling Price of the course" id="SP" name="SP"
			value="<?php echo isset($_POST['SP']) ? $_POST['SP'] : '' ?>" required
				 oninvalid="this.setCustomValidity('Please enter SP')" oninput="setCustomValidity('')"></input>
			</td>
		</tr>
		<tr>
			<td><input type="submit" class="btn btn-default" id="submit" name="submit"></input>&nbsp</td>
		</tr>

		</table>
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
<div class="col-md-6 col-sm-12 col-xs-12 select-course">

	<div id="course_list">
		<!-- heading -->
		<h2>Edit courses</h2>
		<h3>Select the course you want to edit</h3>
		<!-- form -->
		<form name="edit_course" id="edit_course" action="edit_course.php" method="POST" onsubmit="return validateNewCourse()">
			<div class="form-group" style="margin-left:50px;">
			<?php

				$course_list=fetch_course_list();

				while($course_list_row=mysqli_fetch_assoc($course_list)){
					echo "<div class=\"radio\"><input type=\"radio\" name=\"course_id\" id=\"course_id\" value=\"".$course_list_row["course_id"]."\">".$course_list_row["course_name"]."</input></div><br>";
				}

			?>
			</div>
			<br>
			<input type="submit" class="btn btn-default" id="submit" name="submit" value="Edit Course"></input>
		</form>
	</div>
</div>
</div>


</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
