<?php require_once("../includes/functions/functions.php"); ?>
<?php require_once("../includes/functions/db_connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Project Catalyst - Gaming News, Reviews, Trailers</title>

  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/web-icon.ico" type="image/x-icon">

</head>

<body>
  <div id="fb-root"></div>

  <header>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<a class="navbar-brand" id="site-name" href="index.html">&nbsp&nbsp&nbsp <span class="subhead"><b>Catalyst</b></span></a>-->
          <a class="navbar-brand" id="site-name" href="index.html"><img src="img/logo-text.png" class="logo-text"></a>
        </div><!-- navbar-header -->

        <div class="collapse navbar-collapse" id="collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <div class="search-container" id="search-desktop">
                <div id="custom-search-input">
                  <div class="input-group">
                      <input type="text" class="form-control input-lg" placeholder="Search" />
                      <span class="input-group-btn">
                          <button class="btn btn-info btn-lg" type="button">
                              <img src="img/search.png" class="search-icon"></i>
                          </button>
                      </span>
                  </div>
              </div>
            </div>
            </li>
            <li class="active dropdown"><a class="dropdown-toggle" data-hover="dropdown" data-close-others="true" href="index.html">Home</a></li>
            <li class="dropdown"><a role="news" class="dropdown-toggle" data-hover="dropdown" data-delay="1000" data-close-others="true" role="button" aria-haspopup="true" aria-expanded="false" href="#news">News</a>
              <ul class="dropdown-menu">
                <li>
                  <div class="row dropdown-list-item">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <a href="batman-arkham-knight-pc-sales-suspended.html"><img src="img/batman-icon.jpg"></a>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                      <a href="batman-arkham-knight-pc-sales-suspended.html">Batman Arkham Knight PC &nbspsales suspended</a>
                    </div>
                </div> <!--row -->
                </li>
                <br>
                <li>
                  <div class="row dropdown-list-item">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <a href="gta5.html"><img src="img/xbox_one_forza6.jpg"></a>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                      <a href="gta5.html">Blue Xbox One Forza 6 &nbspLimited Edition announced</a>
                      </div>
                  </div> <!--row -->
                </li>
                <br>
                <li>
                  <div class="row dropdown-list-item">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <a href="gta5.html"><img src="img/e3_2015.jpg"></a>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                      <a href="gta5.html">Fallout 4, AC Syndicate &nbspand more from E3 2015</a>
                    </div>
                  </div> <!--row -->
                </li>
              </ul><!-- news drop -->
            </li>
            <li class="dropdown"><a role="review" class="dropdown-toggle" data-hover="dropdown" data-delay="1000" data-close-others="true" role="button" aria-haspopup="true" aria-expanded="false" href="#reviews">Reviews</a>
              <ul class="dropdown-menu">
                <li>
                  <div class="row dropdown-list-item">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <a href="gta5.html"><img src="img/gta5.jpg"></a>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                      <a href="gta5.html">GTA V is spectacular. Read &nbspour Review</a>
                    </div>
                </div> <!--row -->
                </li>
                <br>
                <li>
                  <div class="row dropdown-list-item">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <a href="gta5.html"><img src="img/wwe2k15.jpg"></a>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                      <a href="gta5.html">2K Sports WWE 2K15 is &nbsphere. Here's our Review</a>
                      </div>
                  </div> <!--row -->
                </li>
                <br>
                <li>
                  <div class="row dropdown-list-item">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <a href="gta5.html"><img src="img/witcher3_icon.jpg"></a>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                      <a href="gta5.html">The Witcher 3:Wild Hunt <br>&nbsp100 hours of gameplay</a>
                    </div>
                  </div> <!--row -->
                </li>
                <br>
                <li>
                  <div class="row dropdown-list-item">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <a href="gta5.html"><img src="img/ingress.jpg"></a>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                      <a href="gta5.html">Our first mobile game &nbspreview: Ingress </a>
                    </div>
                  </div> <!--row -->
                </li>
              </ul><!-- reviews drop -->
            </li>
            <li class="dropdown"><a role="trailers" class="dropdown-toggle" data-hover="dropdown" data-delay="1000" data-close-others="true" role="button" aria-haspopup="true" aria-expanded="false" href="#trailers">Trailers</a>
              <ul class="dropdown-menu">
                <li>
                  <div class="row dropdown-list-item">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <a href="gta5.html"><img src="img/nfs2015.jpg"></a>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                      <a href="gta5.html">NFS 2015 is looks gorgeous &nbspwith it's customizations!</a>
                    </div>
                </div> <!--row -->
                </li>
                <br>
                <li>
                  <div class="row dropdown-list-item">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <a href="gta5.html"><img src="img/fifapes.jpg"></a>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                      <a href="gta5.html">FIFA 16 or PES 16 ? <br>&nbspBoth look stunning</a>
                      </div>
                  </div> <!--row -->
                </li>
                <br>
                <li>
                  <div class="row dropdown-list-item">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                      <a href="gta5.html"><img src="img/dxmd.jpg"></a>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                      <a href="gta5.html">Deus Ex Mankind Divided &nbsp25 minutes Gameplay</a>
                    </div>
                  </div> <!--row -->
                </li>
              </ul><!-- trailers drop -->
            </li>
            <li class="dropdown"><a role="tweaks" class="dropdown-toggle" data-hover="dropdown" data-delay="1000" data-close-others="true" role="button" aria-haspopup="true" aria-expanded="false" href="#tweaks">Tweaks</a>
              <ul class="dropdown-menu">
                  <li>
                    <div class="row dropdown-list-item">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <a href="gta5.html"><img src="img/gta5-mods.jpg"></a>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <a href="gta5.html">Best Grand Theft Auto V &nbspMods on all time</a>
                      </div>
                    </div> <!--row -->
                  </li>
                  <br>
                  <li>
                    <div class="row dropdown-list-item">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <a href="gta5-mods.html"><img src="img/gta_tweaks.jpg"></a>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <a href="gta5.html">GTA 5 Tweaks for your<br>&nbspAMD Mobile GPU</a>
                      </div>
                    </div> <!--row -->
                  </li>
                  <br>
                  <li>
                    <div class="row dropdown-list-item">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                        <a href="gta5.html"><img src="img/mc2.jpg"></a>
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <a href="gta5.html">Midnight Club 2: Playing &nbspwith mods and Tunngle</a>
                      </div>
                    </div> <!--row -->
                  </li>
              </ul><!-- tweaks drop -->
            </li>
            <li>
              <div class="search-container" id="search-mobile">
              <div id="custom-search-input">
                <div class="input-group">
                    <input type="text" class="form-control input-lg" placeholder="Search" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            <img src="img/search.png" class="search-icon"></i>
                        </button>
                    </span>
                </div>
            </div>
            </div>
            </li>
          </ul>
        </div><!-- collapse navbar-collapse -->
      </div><!-- container -->
    </nav>
    <div class="slide-container slide-container-index">
      <div class="carousel slide" data-ride="carousel" id="featured-home-mobile">
        <div class="carousel-inner">
          <div class="item active"><img src="img/batman_banner-m.jpg" alt="Arkham Knight"></a></div>
          <div class="item"><a href="gta5.html"><img src="img/nfs_banner-m.jpg" alt="Need For Speed"></a></div>
          <div class="item"><a href="gta5.html"><img src="img/witcher3-m.jpg" alt="The Wild Hunt"></a></div>
          <div class="item"><a href="gta5.html"><img src="img/gtabanner-m.jpg" alt="GTA5"></a></div>
          <div class="item"><a href="gta5.html"><img src="img/ghostrecon_banner-m.jpg" alt="Wildlands"></a></div>
        </div><!-- carousel-inner -->

        <a class="left carousel-control" href="#featured-home-mobile" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#featured-home-mobile" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div><!-- featured carousel -->

      <div class="carousel slide" data-ride="carousel" id="featured-home">
        <div class="carousel-inner">
          <div class="item active"><a href="gta5.html"><h3 class="banner-title"><span class="banner-type">&nbspNews&nbsp</span>&nbspBatman Arkham Knight PC sales suspended. Read more&nbsp<span class="glyphicon glyphicon-triangle-right" style="font-size:14px;color:#0091e4;"></h3></a><img src="img/batman_banner.jpg" alt="Arkham Knight"></div>
          <div class="item"><a href="gta5.html"><h3 class="banner-title"><span class="banner-type">&nbspTrailer&nbsp</span>&nbspNeed for Speed Gameplay trailer analysis &nbsp<span class="glyphicon glyphicon-triangle-right" style="font-size:14px;color:#0091e4;"></h3></a><img src="img/nfs_banner.jpg" alt="Need For Speed"></div>
          <div class="item"><a href="gta5.html"><h3 class="banner-title"><span class="banner-type">&nbspReview&nbsp</span>&nbspWitcher 3 : The Wild Hunt Review &nbsp<span class="glyphicon glyphicon-triangle-right" style="font-size:14px;color:#0091e4;"></h3></a><img src="img/witcher3.jpg" alt="The Wild Hunt"></div>
          <div class="item"><a href="gta5.html"><h3 class="banner-title"><span class="banner-type">&nbspReview&nbsp</span>&nbspGrand Theft Auto V review &nbsp<span class="glyphicon glyphicon-triangle-right" style="font-size:14px;color:#0091e4;"></h3></a><img src="img/gtabanner.jpg" alt="GTA5"></div>
          <div class="item"><a href="gta5.html"><h3 class="banner-title"><span class="banner-type">&nbspReveal&nbsp</span>&nbspGhost Recon going Open World in GR: Wildlands. Read More &nbsp<span class="glyphicon glyphicon-triangle-right" style="font-size:14px;color:#0091e4;"></h3></a><img src="img/ghostrecon_banner.jpg" alt="Wildlands"></div>
        </div><!-- carousel-inner -->

        <a class="left carousel-control" href="#featured-home" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#featured-home" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div><!-- featured carousel -->
    </div> <!-- slide-container -->
  </header>
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
              $query="SELECT * FROM articles_list where article_tag=\"news\" ORDER BY published_date ASC";
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
  <footer class="footer-style">
    <div class="content container">
      <div class="row">
        <div class="col-sm-4">
          <p>Feel free to contact us on <span class="email"><img src="img/mail.png" alt="Mail us" class="social">&nbspcontact@catalyst.com</span></p>
          <p>All contents &copy; 2015 <a href="http://lynda.com">projectcatalyst.com</a>. All rights reserved.</p>
        </div><!-- col-sm-4 -->
        <div class="col-sm-4 social-container">
          <p>Follow us on:</p>
          <a href="https://twitter.com/arnav_007"><img src="img/twitter.png" class="social"></a>&nbsp&nbsp&nbsp
      		<a href="https://twitter.com/arnav_007"><img src="img/facebook.png" class="social"></a>&nbsp&nbsp&nbsp
      		<a href="https://google+.com/arnav_007"><img src="img/gplus.png" class="social"></a>
        </div><!-- col-sm-4 social-->
        <div class="col-sm-4">
          <nav class="navbar navbar-inverse" role="navigation">
            <ul class="nav navbar-nav navbar-right navbar-footer">
              <li><a href="terms-of-use.html">Terms of use</a></li>
              <li><a href="#">Privacy policy</a></li>
              <li><a href="about-us.html">Read about us</a></li>
            </ul>
          </nav>
        </div><!-- col-sm-4 -->
      </div><!-- row -->
    </div><!-- content container -->
  </footer>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-hover-dropdown.min.js"></script>
  <script src="js/script.js"></script>

<!--
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
-->

</body>
</html>
