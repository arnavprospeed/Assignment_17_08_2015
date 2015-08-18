<!DOCTYPE html>
<html>
<head>
  <title>
    Course Authoring Tool
  </title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="js/jquery.js"></script>
  <script src="js/script.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <header>

      <h4>NOW AUTHORING COURSES IS A LOT EASIER</h4>
      <h3>THANKS TO THIS AWESOME TOOL</h3>
      <?php

      if(isset($_SESSION["username"]))
      {
        echo "<h5 class=\"greetings\">Hello, {$_SESSION['username']}!</h5>";
        echo "<br><form action=\"logout.php\">";
        echo "<input class=\"logout\" type=\"submit\" value=\"Log out\" id=\"submit\" name=\"submit\"></input></form>";
      }
      ?>


  </header>
