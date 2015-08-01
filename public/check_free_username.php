<?php require_once("../includes/functions/db_connection.php"); ?>
<?php require_once("../includes/functions/functions.php"); ?>
<?php

$free_username=check_free_username($_POST['username']);
if($free_username){
    echo "<span class='status-available'> <b>".$_POST['username']."</b> is available.</span>";;
}
else{
    echo "<span class='status-not-available'> <b>".$_POST['username']."</b> is not available.</span>";;
}
 ?>
