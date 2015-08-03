<?php require_once("../includes/functions/db_connection.php"); ?>
<?php require_once("../includes/functions/functions.php"); ?>
<?php
//echo "articles list";

$article_tag=$_POST["article_tag"];
$article_type=$_POST["article_type"];

$result=generate_articles_list($article_tag,$article_type);
if($result){
  while($row=mysqli_fetch_assoc($result)){
    $options="<input type=\"radio\" value=\"".$row["article_id"]."\" name=\"selected_article\" ";
    $options.="id=\"selected_article\">&nbsp";
    $options.=$row["title"];
    $options.="</input><br>";

    echo $options;
  }
  $options="<input type=\"submit\" name=\"delete_selected\" id=\"delete_selected\" value=\"Delete selected article\"></input>";
  echo $options;
}
else{
    echo "Preview generation failed";
}
?>
