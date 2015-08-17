<?php
  $host="localhost";
  $username="arnavnag";
  $password="chalkstreet";
  $db_name="chalk_street";
  global $connection;
  $connection=mysqli_connect($host,$username,$password,$db_name);
  if(mysqli_connect_errno()){
    die("failed to connect");
  }
  else{

  }
?>
