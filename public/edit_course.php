<?php require_once("../includes/functions/sessions.php"); ?>
<?php require_once("../includes/functions/functions.php"); ?>
<?php require_once("../includes/functions/db_connection.php"); ?>
<?php
	if(!isset($_SESSION['username'])){
		$_SESSION['unauth_user']=1;
		redirect("login.php");
	}
	if(!isset($_GET["section"])&&!isset($_GET['video'])&&!isset($_POST['submit'])){
		$_SESSION["section_selected"]=null;
		$_SESSION["video_selected"]=null;
	}
	if(!isset($_GET["video"])&&!isset($_POST['submit'])){
		$_SESSION["video_selected"]=null;
	}
	if(isset($_GET["video"])&&isset($_GET["section"])){
		$section_name=$_GET["section"];
		$video_id=$_GET["video"];
		$_SESSION['section_selected']=$section_name;
		$_SESSION['video_selected']=$video_id;
	}
	if(isset($_GET["section"])&&!isset($_GET["video"])){
		$section_name=$_GET["section"];
		$_SESSION['section_selected']=$section_name;
	}

	if(isset($_POST['submit'])||isset($_SESSION['course_id'])){
		if(isset($_POST['course_id'])){
			$_SESSION['course_id']=$_POST['course_id'];
		}
		if(isset($_POST['section_name'])){
			//echo "hello";
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
		if(isset($_FILES['video'])&&$_SESSION['section_selected']){
			$section_selected=$_SESSION['section_selected'];
			$arr=(explode('_',$section_selected));
			$section_selected=$arr[0];
			echo $section_selected;
			$course_id=$_SESSION['course_id'];
			$course_name=fetch_course_name($course_id);
			$video_link=upload_video($course_name,$section_selected);
			//echo $video_link;

			if(isset($video_link)){
				$result=add_video($course_name,$section_selected,$video_link,$_POST['video_position']);
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

			echo "<li><a ";
			if(isset($section_name)&&!isset($video_id)){
				echo "class=\"active\" ";
			}
			echo "href=\"edit_course.php?section={$section_list_row["name"]}\">".$section_list_row["name"]."</a></li>";
			$video_list=fetch_video_list($course_name,$section_list_row["name"]);
			echo "<ul>";
			while($video_list_row=mysqli_fetch_assoc($video_list)){
				echo "<li><a ";
				if(isset($video_id)){
					echo "class=\"active\" ";
				}
				echo "href=\"edit_course.php?section=";
				echo urlencode($course_name);
				echo "_";
				echo urlencode($section_list_row["name"]);
				echo "&";
				echo "video=";
				echo urlencode($video_list_row["id"]);
				echo "\">";
				echo $video_list_row["name"]."<a/></li>";
			}
			echo "</ul>";
		}
		echo "</ul>";
	?>
	<br>
	<input type="button" class="btn btn-default" id="add_section_button" name="add_section_button" value="+ Add new section" onclick="populateAddNewSection();"/>
	<input type="button" class="btn btn-default" id="add_video_button" name="add_video_button" value="+ Add new Video" onclick="populateAddNewVideo();"/>
	<br><br>

	<!--Add new section-->
		<form name="add_section" id="add_section" action="edit_course.php" method="POST">
			<label>Add new section:</label>
			<input type="text" class="form-control" placeholder="Section name" id="section_name" name="section_name"></input><br>
			<input type="text" class="form-control" placeholder="Section position" id="section_position" name="section_position"></input>
			<br><br>
			<input type="submit" class="btn btn-default" id="submit" name="submit" value="Add new section"/>
		</form>


	<!--Add new video-->
	<form name="add_video" id="add_video" action="edit_course.php" method="POST" enctype="multipart/form-data">
		<label>Add new video to
			<?php
			if(isset($_SESSION['section_selected']))
				echo $_SESSION['section_selected'];
			else
				echo "*select a section to add video to*";
			?>
			:</label>

		<input type="file" class="btn btn-default" name="video" id="video" accept=".mp4"/><br />
		<input type="text" class="form-control" placeholder="Position" id="video_position" name="video_position"></input><br>
		<input type="submit" class="btn btn-default" id="submit" name="submit" value="Upload Video"></input>
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
		<?php
			if(isset($video_id)&&isset($section_name)){
		 	$video_link=get_video_link($section_name,$video_id);

			echo "<video width=\"640\" height=\"480\" controls>
  		<source src=\"{$video_link}\" type=\"video/mp4\">
  		Your browser does not support the video tag.
			</video>";
			}
			else{
				echo "<h1 style=\"color:#DDD;margin-left:100px;margin-top:200px;\">Select a video</h1>";
			}
		?>
	</div>
</div>
</div>


</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
