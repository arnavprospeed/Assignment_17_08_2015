<?php require_once("../includes/functions/functions.php"); ?>
<?php require_once("../includes/functions/db_connection.php"); ?>


<?php require_once("../includes/layouts/header.php"); ?>
  <div class="main">
    <div class="content container" id="main-section">


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
         				 <option value="any">Any</option>
                 <option value="news">News</option>
         				 <option value="reviews">Reviews</option>
         				 <option value="trailers">Trailers</option>
         				 <option value="tweaks">Tweaks</option>
         		 </select>
         		&nbsp&nbsp&nbsp

         		<!-- Article tag -->
         		Article tag:
         		<select id="article_tag" name="article_tag">
         		</select>
         			 <br>
         			 <br>
            <input type="button" id="show_articles_list" name="show_articles_list" value="Show articles" onclick="show_articles_list();"></input>
            <div id="articles_list"></div>

          </form>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
        </div>
    </div><!-- content container -->
      <br>
  </div><!-- main -->

<?php include("../includes/layouts/footer.php"); ?>
