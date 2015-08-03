<?php require_once("../includes/functions/db_connection.php"); ?>
<?php require_once("../includes/functions/functions.php"); ?>
<?php
echo "articles list";
$article_tag=$_POST["article_tag"];
$article_type=$_POST["article_type"];
$result=generate_articles_list($article_tag,$article_type);
if($result){
  while($row=mysqli_fetch_assoc($result)){
    $options="<input type=\"radio\" value=\"".{$row["article_id"]}."\" name=\"article_list\" ";
    $options.="id=\"article_list\">";
    $options.=$row["title"];
    $options.="</input>";
  }
  echo $options;
}
else{
    echo "Preview generation failed";
}
?>
