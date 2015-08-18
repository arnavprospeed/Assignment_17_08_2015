<?php require_once("../includes/functions/sessions.php"); ?>
<?php require_once("../includes/functions/functions.php"); ?>
<?php
	$_SESSION['username']=null;
	$_SESSION['course_id']=null;
	redirect("login.php");
?>
