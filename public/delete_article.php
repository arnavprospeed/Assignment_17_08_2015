<?php require_once("../includes/functions/functions.php"); ?>
<?php require_once("../includes/functions/db_connection.php"); ?>

<?php
if(isset($_POST['delete_selected'])){
  //echo "Submitted";
  if($_POST['selected_article']){
    $result=delete_article($_POST['selected_article']);
    if($result){
      $_POST = array();
      $update_confirmation=$result;
      $update_confirmation.="<p class=\"update-confirmed\">Page deleted successfully. Go to <a href=\"index.php\">Home page</a> to review changes.<p>";
    }
    else $update_confirmation="Deleting article failed";
  }
  else{
    $update_confirmation="Update failed please check the values input";
  }
}
?>

<?php require_once("../includes/layouts/header.php"); ?>
  <div class="main">
    <div class="content container" id="main-section">

      <br>
      <div class="row">
      	<div class="col-md-6 col-sm-12 col-xs-12">
      	 <!-- heading -->
      	  <h3> Delete Article: Select an article</h3>
          <!-- form -->
        	<form name="delete_article" id="delete_article" action="delete_article.php" method="POST">
            <!-- Article type -->
            Select by:
         		Article type:
         		 <select id="article_type" name="article_type" required
         				onchange="configureDropDownLists(this,document.getElementById('article_tag'))">
         				 <option value="Any">Any</option>
                 <option value="News">News</option>
         				 <option value="Reviews">Reviews</option>
         				 <option value="Trailers">Trailers</option>
         				 <option value="Tweaks">Tweaks</option>
         		 </select>
         		&nbsp&nbsp&nbsp

         		<!-- Article tag -->
         		Article tag:
         		<select id="article_tag" name="article_tag">
         		</select>
         			 <br>
         			 <br>

            <input type="button" id="show_articles_list" name="show_articles_list" value="Show articles" onclick="show_articles()"></input>
            <div id="articles_list"></div>

          </form>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
          <?php
          if(isset($update_confirmation)){
            echo $update_confirmation;
          }
          ?>

        </div>
    </div><!-- content container -->
      <br>
  </div><!-- main -->
</div>

<?php include("../includes/layouts/footer.php"); ?>
