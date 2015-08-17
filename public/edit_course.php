<?php require_once("../includes/functions/functions.php"); ?>
<?php require_once("../includes/functions/db_connection.php"); ?>
<?php


	if(isset($_POST['submit'])){
		if(isset($_POST['section_name'])){
			echo "hello";
			$course_id=$_POST['course_id'];
			$course_name=fetch_course_name($course_id);
			$result=add_section($course_name,$_POST['section_name'],$_POST['section_position']);
			if($result){
				echo "Section added";
			}
			else {
				echo "section add failed";
			}

		}
	}
	else{
		redirect("add_course.php");
	}


?>

<?php include("../includes/layouts/header.php"); ?>


<div class="main">
	<div class="content container" id="main-section">
		<br><br>

<div class="row">
	<div class="col-md-4 col-sm-12 col-xs-12">
	<!-- heading -->
	<h5>Course name:</h5>
	<h2><?php
	$course_id=$_POST['course_id'];

	$course_name=fetch_course_name($course_id);
	echo $course_name;
	$_POST['course_id']=$course_id;
	?></h2>
	<h2></h2>
	<h3> Enter details for new course</h3>
	<!-- form -->
	<?php

		$section_list=fetch_section_list($course_name);

		while($section_list_row=mysqli_fetch_assoc($section_list)){
			echo "<h4>".$section_list_row["name"]."</h4><br>";
			$video_list=fetch_video_list($section_list_row["name"]);
			echo "<ul>";
			while($video_list_row=mysqli_fetch_assoc($video_list)){
				echo "<li>".$video_list_row["name"]."</li><br>";
			}
			echo "</ul>";
		}
	?>
	<form name="add_section" id="add_section" action="edit_course.php" method="POST">

		<input type="text" placeholder="Section name" id="section_name" name="section_name"></input>
		<input type="text" placeholder="Section position" id="section_position" name="section_position"></input>
		<?php echo $_POST['course_id'];?>
		<input type="submit" id="submit" name="submit" value="Add new section"></input>
	</form>
	<form name="add_video" id="add_video" action="edit_course.php" method="POST" enctype="multipart/form-data">
		<label for="file"><span>Video filename:</span></label>
			<input type="file" name="file" id="file" accept=".mp4"/><br />
			<input type="submit" name="submit" value="Upload Video" />
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
<div class="col-md-8 col-sm-12 col-xs-12 article_preview_col">

	<div id="course_list">
		<!-- heading -->
		<?php echo "<video width=\"320\" height=\"240\" controls>
  		<source src=\"movie.mp4\" type=\"video/mp4\">
  		Your browser does not support the video tag.
			</video>";
		?>
	</div>
</div>
</div>


</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
