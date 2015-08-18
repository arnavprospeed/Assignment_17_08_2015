<?php require_once("../includes/functions/sessions.php"); ?>
<?php require_once("../includes/functions/functions.php"); ?>
<?php require_once("../includes/functions/db_connection.php"); ?>
<?php


	if(isset($_POST['submit'])){
		if(isset($_POST['course_id'])){
			$_SESSION['course_id']=$_POST['course_id'];
		}
		if(isset($_POST['section_name'])){
			echo "hello";
			$course_id=$_SESSION['course_id'];
			$course_name=fetch_course_name($course_id);
			$result=add_section($course_name,$_POST['section_name'],$_POST['section_position']);
			if($result){
				echo "Section added";
			}
			else {
				echo "section add failed";
			}

		}
		if(isset($_FILES['video'])){

			$course_id=$_SESSION['course_id'];
			$course_name=fetch_course_name($course_id);
			$video_link=upload_video($course_name,"Intro");
			//echo $video_link;
			if(isset($video_link)){
				$result=add_video($course_name,"Intro",$video_link,$_POST['video_position']);
				if($result){
					echo "video added";
				}
				else{
					echo "video add failed";
				}
			}
		}
	}
	else{
		//redirect("add_course.php");
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
	<h3 class="course_name_title"><?php
	$course_id=$_SESSION['course_id'];

	$course_name=fetch_course_name($course_id);
	echo $course_name;

	?></h3>

	<h4>Sections list:</h4>
	<!-- form -->
	<?php

		$section_list=fetch_section_list($course_name);
		echo "<ul>";
		while($section_list_row=mysqli_fetch_assoc($section_list)){

			echo "<li>".$section_list_row["name"]."</li>";
			$video_list=fetch_video_list($course_name,$section_list_row["name"]);
			echo "<ul>";
			while($video_list_row=mysqli_fetch_assoc($video_list)){
				echo "<li>".$video_list_row["name"]."</li>";
			}
			echo "</ul>";
		}
		echo "</ul>";
	?>
	<br>
	<input type="button" id="add_section" name="add_section" value="+ Add new section" onclick="populateAddNewSection();"/>
	<input type="button" id="add_video" name="add_video" value="+ Add new Video" onclick="populateAddNewSection();"/>
	<form name="add_section" id="add_section" action="edit_course.php" method="POST">

		<input type="text" placeholder="Section name" id="section_name" name="section_name"></input>
		<input type="text" placeholder="Section position" id="section_position" name="section_position"></input>
		<br><br>
		<input type="submit" id="submit" name="submit" value="Add new section"/>
	</form>
	<form name="add_video" id="add_video" action="edit_course.php" method="POST" enctype="multipart/form-data">
		<label for="file"><span>Video filename:</span></label>
		<input type="file" name="video" id="video" accept=".mp4"/><br />
		<input type="text" placeholder="Position" id="video_position" name="video_position"></input>
		<input type="submit" id="submit" name="submit" value="Upload Video"></input>
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
<div class="col-md-8 col-sm-12 col-xs-12 video_col">

	<div id="video_preview">
		<!-- heading -->
		<?php echo "<video width=\"640\" height=\"480\" controls>
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
