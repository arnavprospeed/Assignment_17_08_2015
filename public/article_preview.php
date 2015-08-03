<?php require_once("../includes/functions/db_connection.php"); ?>
<?php require_once("../includes/functions/functions.php"); ?>
<?php

$preview=generate_article_preview($_POST['title'],$_POST['article_tag'],$_POST['tile_css']);
//if($_FILES["icon_image"]){echo "Yes";}
if($preview){
    echo $preview;
}
else{
    echo "Preview generation failed";
}?>
