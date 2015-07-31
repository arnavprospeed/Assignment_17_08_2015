<?php require_once("../includes/functions/functions.php"); ?>
<?php require_once("../includes/functions/db_connection.php"); ?>
<?php require_once("../includes/layouts/header.php"); ?>
<?php include("../includes/layouts/carousel_slide.php"); ?>



  <div class="main">
    <div class="content container" id="main-section">
      <div class="page" id="news">

        <h2>News</h2>
          <div class="row">

            <div class="tile col-md-4 col-sm-6 col-xs-12">
              <div class="tile third-column">
                <h4 class="article-tag">News</h4>
                <a href="saturoiwata.html"><img src="img/satiwa.jpg" alt="img" class="icon"></a> <!--350px x 200px-->

                <a href="saturoiwata.html"><p class="title">End of a Legacy - Nintendo president and CEO Saturo Iwata Dies at 55</p></a>
              </div> <!--tile second-column-->
            </div> <!--column-->

            <?php
              $query="SELECT * FROM articles_list where article_tag=\"news\" ORDER BY published_date DESC";
              global $connection;
              $result=mysqli_query($connection,$query);
              if(!$result){
                echo "Query failed";
              }
              while($row = mysqli_fetch_assoc($result)){
                echo "<div class=\"tile col-md-4 col-sm-6 col-xs-12\">
                        <div class=\"tile ";
                echo $row["css_class"];
                echo "\">";
                echo "<h4 class=\"article-tag\">".$row["article_tag"]."</h4>";
                echo "<a href=\"".$row["link"]."\"><img src=\"".$row["icon_link"]."\" alt=\"img\" class=\"icon\"></a> <!--350px x 200px-->";
                echo "<a href=\"".$row["link"]."\"><p class=\"title\">".$row["title"]."</p></a>";
                echo  "</div> <!--tile second-column-->
                </div> <!--column-->";

              }

            ?>

          </div><!-- news row -->

        </div><!-- news page -->

        <hr>
        <div class="page" id="reviews">

        <h2>Reviews</h2>
          <div class="row">

            <div class="tile col-md-4 col-sm-6 col-xs-12">
              <div class="tile fifth-column">
                <h4 class="article-tag">Review</h4>
                <a href="witcher3.html"><img src="img/witcher3_icon.jpg" alt="img" class="icon"></a> <!--350px x 200px-->
                <a href="witcher3.html"><p class="title">The Witcher 3: The Wild Hunt: Massive open world full of events, immersive combat and alchemy system</p></a>
              </div> <!--tile second-column-->
            </div> <!--column-->

            <div class="tile col-md-4 col-sm-6 col-xs-12">
              <div class="tile second-column">
                <h4 class="article-tag">Review</h4>
                <a href="gta5.html"><img src="img/gta5.jpg"  alt="img" class="icon"></a> <!--350px x 200px-->
                <a href="gta5.html"><p class="title">Our review of Grand Theft Auto 5 on PC</p></a>
              </div> <!--tile second-column-->
            </div> <!--column-->

            <div class="tile col-md-4 col-sm-6 ol-xs-12 top-games-desktop">
              <div class="tile tg-column" id="top-games">
                <h4>Top Games</h4>

                <ul>

                  <li>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <img src="img/batman_cover.jpg" alt="Batman Arkham Knight" class="cover">
                      </div> <!-- cover -->
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <p>Batman Arkham Knight</p>
                        <table class="game-list-info">

                          <tr>
                            <td>Platforms:</td>
                            <td>PC, PS4, Xbox One</td>
                          </tr>
                          <tr>
                            <td>Publisher:</td>
                            <td>Rocksteady</td>
                          </tr>
                          <tr>
                            <td>Developer:</td>
                            <td>Some developer</td>
                          </tr>
                          <tr>
                            <td>Release date:</td>
                            <td>23<sup>th</sup> June, 2015</td>
                          </tr>
                        </table>
                      </div> <!-- game info -->
                    </div> <!-- list item row -->
                  </li> <!--list item ends --><hr>
                  <li>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <a href="witcher3.html"><img src="img/witcher3_cover.png" alt="The Witcher 3" class="cover"></a>
                      </div> <!-- cover -->
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <a href="witcher3.html"><p>The Witcher 3: The Wild Hunt</p></a>
                        <table class="game-list-info">
                          <tr>
                            <td>Platforms:</td>
                            <td>PC, PS4, Xbox One</td>
                          </tr>
                          <tr>
                            <td>Publisher:</td>
                            <td>CD Projekt, Namco Bandai</td>
                          </tr>
                          <tr>
                            <td>Developer:</td>
                            <td>CD Projekt Red</td>
                          </tr>
                          <tr>
                            <td>Release date:</td>
                            <td>19<sup>th</sup> May, 2015</td>
                          </tr>
                        </table>
                      </div> <!-- game info -->
                    </div> <!-- list item row -->
                  </li> <!--list item ends --><hr>
                  <li>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <img src="img/mkx_cover.jpg" alt="Mortal Kombat X" class="cover">
                      </div> <!-- cover -->
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <p>Mortal Kombat X</p>
                        <table class="game-list-info">
                          <tr>
                            <td>Platforms:</td>
                            <td>PC, PS4, ,PS3, Xbox One, Xbox 360</td>
                          </tr>
                          <tr>
                            <td>Publisher:</td>
                            <td>Warner Bros.</td>
                          </tr>
                          <tr>
                            <td>Developer:</td>
                            <td>NetherRealm studios, High Voltage SOftware</td>
                          </tr>
                          <tr>
                            <td>Release date:</td>
                            <td>25<sup>th</sup> June, 2015</td>
                          </tr>
                        </table>
                      </div> <!-- game info -->
                    </div> <!-- list item row -->
                  </li> <!--list item ends -->
                </ul>
                </div> <!--top games list-->
              </div> <!--tile second-column-->

              <div  class="tile col-md-4 col-sm-6 col-xs-12">
                <div class="tile first-column">
                  <h4 class="article-tag">Review</h4>
                  <a href="wwe2k15.html"><img src="img/wwe2k15.jpg" alt="img" class="icon"></a> <!--350px x 200px-->
                  <a href="wwe2k15.html"><p class="title">WWE 2K15 Review</p></a>
                </div> <!--tile second-column-->
              </div> <!--column-->

            <div class="tile col-md-4 col-sm-6 ol-xs-12 top-games-medium">
              <div class="tile tg-column" id="top-games">
                <h4>Top Games</h4>

                <ul>

                  <li>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <img src="img/batman_cover.jpg" alt="Batman Arkham Knight" class="cover">
                      </div> <!-- cover -->
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <p>Batman Arkham Knight</p>
                        <table class="game-list-info">

                          <tr>
                            <td>Platforms:</td>
                            <td>PC, PS4, Xbox One</td>
                          </tr>
                          <tr>
                            <td>Publisher:</td>
                            <td>Rocksteady</td>
                          </tr>
                          <tr>
                            <td>Developer:</td>
                            <td>Some developer</td>
                          </tr>
                          <tr>
                            <td>Release date:</td>
                            <td>23<sup>th</sup> June, 2015</td>
                          </tr>
                        </table>
                      </div> <!-- game info -->
                    </div> <!-- list item row -->
                  </li> <!--list item ends --><hr>
                  <li>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <a href="witcher3.html"><img src="img/witcher3_cover.png" alt="The Witcher 3" class="cover"></a>
                      </div> <!-- cover -->
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <a href="witcher3.html"><p>The Witcher 3: The Wild Hunt</p></a>
                        <table class="game-list-info">
                          <tr>
                            <td>Platforms:</td>
                            <td>PC, PS4, Xbox One</td>
                          </tr>
                          <tr>
                            <td>Publisher:</td>
                            <td>CD Projekt, Namco Bandai</td>
                          </tr>
                          <tr>
                            <td>Developer:</td>
                            <td>CD Projekt Red</td>
                          </tr>
                          <tr>
                            <td>Release date:</td>
                            <td>19<sup>th</sup> May, 2015</td>
                          </tr>
                        </table>
                      </div> <!-- game info -->
                    </div> <!-- list item row -->
                  </li> <!--list item ends --><hr>
                  <li>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <img src="img/mkx_cover.jpg" alt="Mortal Kombat X" class="cover">
                      </div> <!-- cover -->
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <p>Mortal Kombat X</p>
                        <table class="game-list-info">
                          <tr>
                            <td>Platforms:</td>
                            <td>PC, PS4, ,PS3, Xbox One, Xbox 360</td>
                          </tr>
                          <tr>
                            <td>Publisher:</td>
                            <td>Warner Bros.</td>
                          </tr>
                          <tr>
                            <td>Developer:</td>
                            <td>NetherRealm studios, High Voltage SOftware</td>
                          </tr>
                          <tr>
                            <td>Release date:</td>
                            <td>25<sup>th</sup> June, 2015</td>
                          </tr>
                        </table>
                      </div> <!-- game info -->
                    </div> <!-- list item row -->
                  </li> <!--list item ends -->
                </ul>
                </div> <!--top games list-->
              </div> <!--tile second-column-->

            <div class="tile col-md-4 col-sm-6 col-xs-12">
              <div class="tile seventh-column">
                <h4 class="article-tag">Review</h4>
                <a href="ingress.html"><img src="img/ingress.jpg" alt="img" class="icon"></a> <!--350px x 200px-->
                <a href="witcher3.html"><p class="title">Ingress Review: Navigation-based Massively Multiplayer pervasive game between to rival factions</p></a>
              </div> <!--tile second-column-->
            </div> <!--column-->
            <div class="tile col-md-4 col-sm-6 ol-xs-12 top-games-mobile">
              <div class="tile tg-column" id="top-games">
                <h4>Top Games</h4>

                <ul>

                  <li>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <img src="img/batman_cover.jpg" alt="Batman Arkham Knight" class="cover">
                      </div> <!-- cover -->
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <p>Batman Arkham Knight</p>
                        <table class="game-list-info">

                          <tr>
                            <td>Platforms:</td>
                            <td>PC, PS4, Xbox One</td>
                          </tr>
                          <tr>
                            <td>Publisher:</td>
                            <td>Rocksteady</td>
                          </tr>
                          <tr>
                            <td>Developer:</td>
                            <td>Some developer</td>
                          </tr>
                          <tr>
                            <td>Release date:</td>
                            <td>23<sup>th</sup> June, 2015</td>
                          </tr>
                        </table>
                      </div> <!-- game info -->
                    </div> <!-- list item row -->
                  </li> <!--list item ends --><hr>
                  <li>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <a href="witcher3.html"><img src="img/witcher3_cover.png" alt="The Witcher 3" class="cover"></a>
                      </div> <!-- cover -->
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <a href="witcher3.html"><p>The Witcher 3: The Wild Hunt</p></a>
                        <table class="game-list-info">
                          <tr>
                            <td>Platforms:</td>
                            <td>PC, PS4, Xbox One</td>
                          </tr>
                          <tr>
                            <td>Publisher:</td>
                            <td>CD Projekt, Namco Bandai</td>
                          </tr>
                          <tr>
                            <td>Developer:</td>
                            <td>CD Projekt Red</td>
                          </tr>
                          <tr>
                            <td>Release date:</td>
                            <td>19<sup>th</sup> May, 2015</td>
                          </tr>
                        </table>
                      </div> <!-- game info -->
                    </div> <!-- list item row -->
                  </li> <!--list item ends --><hr>
                  <li>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <img src="img/mkx_cover.jpg" alt="Mortal Kombat X" class="cover">
                      </div> <!-- cover -->
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <p>Mortal Kombat X</p>
                        <table class="game-list-info">
                          <tr>
                            <td>Platforms:</td>
                            <td>PC, PS4, ,PS3, Xbox One, Xbox 360</td>
                          </tr>
                          <tr>
                            <td>Publisher:</td>
                            <td>Warner Bros.</td>
                          </tr>
                          <tr>
                            <td>Developer:</td>
                            <td>NetherRealm studios, High Voltage SOftware</td>
                          </tr>
                          <tr>
                            <td>Release date:</td>
                            <td>25<sup>th</sup> June, 2015</td>
                          </tr>
                        </table>
                      </div> <!-- game info -->
                    </div> <!-- list item row -->
                  </li> <!--list item ends -->
                </ul>
                </div> <!--top games list-->
              </div> <!--tile second-column-->

          </div><!-- row -->
        <!--</div><!-- content container -->

    </div><!-- reviews -->
    <hr>
    <div class="page" id="trailers">

        <h2>Trailers & Annoucements</h2>
          <div class="row">

            <div class="tile col-md-4 col-sm-6 col-xs-12">
              <div class="tile eighth-column">
                <h4 class="article-tag">Gameplay</h4>
                <a href="nfs2015.html"><img src="img/nfs2015.jpg" alt="img" class="icon"></a> <!--350px x 200px-->
                <a href="nfs2015.html"><p class="title">NFS 2015 is looking gorgeous with mind-blowing modifications. Read our gameplay trailer analysis.</p></a>
              </div> <!--tile second-column-->
            </div> <!--column-->

            <div  class="tile col-md-4 col-sm-6 col-xs-12">
              <div class="tile third-column">
                <h4 class="article-tag">Insight</h4>
                <a href="fifapes.html"><img src="img/fifapes.jpg" alt="img" class="icon"></a> <!--350px x 200px-->
                <a href="fifapes.html"><p class="title">Fifa 16 vs PES 16? Both look promising and stunning in action.</p></a>
              </div> <!--tile second-column-->
            </div> <!--column-->

            <div  class="tile col-md-4 col-sm-6 col-xs-12">
              <div class="tile sixth-column">
                <h4 class="article-tag">Gameplay</h4>
                <a href="fifapes.html"><img src="img/dxmd.jpg" alt="img" class="icon"></a> <!--350px x 200px-->
                <a href="fifapes.html"><p class="title">Deus Ex Mankind Divided 25 minutes gameplay revealed. This is what it looks like.</p></a>
              </div> <!--tile second-column-->
            </div> <!--column-->


          </div><!-- row -->


    </div><!-- trailers -->
    <hr>
    <div class="page" id="tweaks">

        <h2>Tweaks & Fixes</h2>
          <div class="row">

            <div class="tile col-md-4 col-sm-6 col-xs-12">
              <div class="tile first-column">
                <h4 class="article-tag">Mods</h4>
                <a href="gta5-mods.html"><img src="img/gta5-mods.jpg" alt="img" class="icon"></a> <!--350px x 200px-->
                <a href="gta5-mods.html"><p class="title">Best Grand Theft Auto V Mods on all time</p></a>
              </div> <!--tile second-column-->
            </div> <!--column-->

            <div  class="tile col-md-4 col-sm-6 col-xs-12">
              <div class="tile fourth-column">
                <h4 class="article-tag">Tweaks</h4>
                <a href="gta-tweaks.html"><img href="index.html" src="img/gta_tweaks.jpg" alt="img" class="icon"></a> <!--350px x 200px-->
                <a href="gta-tweaks.html"><p class="title">Top GTA V fixes and tweaks for AMD Mobile GPU Users</p></a>
              </div> <!--tile second-column-->
            </div> <!--column-->

            <div class="tile col-md-4 col-sm-6 col-xs-12">
              <div class="tile fifth-column">
                <h4 class="article-tag">Mods</h4>
                <a href="mc2.html"><img src="img/mc2.jpg" alt="img" class="icon"></a> <!--350px x 200px-->
                <a href="mc2.html"><p class="title">Our favourites: Midnight Club 2. Play like it is meant to be with MODS and Tunngle.</p></a>
              </div> <!--tile second-column-->
            </div> <!--column-->
          </div><!-- row -->

        </div><!-- tweaks -->
      </div><!-- content container -->
      <br>
    </div><!-- main -->

<?php include("../includes/layouts/footer.php"); ?>
