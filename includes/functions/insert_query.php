<?php
  $host="localhost";
  $username="catalyst_admin";
  $password="catalyst_password";
  $db_name="catalyst_cms";
  global $connection;
  $connection=mysqli_connect($host,$username,$password,$db_name);
  if(mysqli_connect_errno()){
    die("failed to connect");
  }
  else{

  }
?>
