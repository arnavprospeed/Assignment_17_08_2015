/************* LOG IN and SIGN UP functions **************/

<?php
  function redirect($location){
    header("Location: ". $location);
  }

  function mysql_prep($string){
    global $connection;
    $escaped_string=mysql_prep_escape_string($connection,$string);
    return $escape_string;
  }

  function validate_user($username,$password){
    global $connection;
    $safe_username=mysql_prep($username);
    $query="SELECT password FROM user_auth WHERE user_id = '{$username}' LIMIT 1";

    $password_set=mysqli_query($connection,$query);
    $fetched_password=mysqli_fetch_assoc($password_set);

    if(isset($fetched_password))
    {

      if(password_check($password,$fetched_password['password']))
        return true;
      else {
         return false;
      }
    }
    else{
      return false;
    }
  }

  function check_available($username){
      global $connection;
      $safe_username=mysql_prep($username);
      $query="SELECT user_id FROM user_auth WHERE user_id = '{$safe_username}'";
      $checkUserID=mysqli_query($connection,$query);
      if (mysqli_num_rows($checkUserID)>0){
        return false;
      }
      else{
        return true;
      }
  }

  function validateCred($username,$password){
    if(strlen($username)>6&&strlen($username)<=30&&strlen($password)>=8&&strlen($password)<=30)
    {
      return true;
    }
    else {
      return false;
    }

  }
  function generate_salt($length){
    //Generating salt for salted password
    //Unique random string from mt_random and md5 hashing
    //returns 32 characters
    $unique_random_string=md5(uniqid(mt_rand(),true));
    //Valid characters only [a-zA-Z0-9./]
    $base64_string=base64_encode($unique_random_string);
    //Replace '+' with '.'
    $modified_base64_string=str_replace('+','.',$base64_string);
    //first 22 characters
    $salt=substr($modified_base64_string,0,$length);
    return $salt;
  }

  function password_check($password,$existing_hash){
      $hash=crypt($password,$existing_hash);
      echo "{$hash} <br>{$existing_hash}";
      if($hash===$existing_hash){
        return true;
      }
      else{
        return false;
      }
  }

  function password_encrypt($password){
    $hash_format="$2y$10$";
    $length=22;
    //generate salt function of length 22
    $salt=generate_salt($length);
    $format_and_salt = $hash_format . $salt;
    $hashed_password=crypt($password,$format_and_salt);
    return $hashed_password;
  }

  function createUser($username,$password,$name,$phone_no,$email){
    global $connection;
    $safe_username=mysql_prep($username);
    $safe_email=mysql_prep($email);
    $hashed_password=password_encrypt($password);
    $query="INSERT INTO ";
    $query.="user_auth (user_id,password) ";
    $query.="VALUES (";
    $query.=" '{$safe_username}','{$hashed_password}'";
    $query.="); ";
    //$result=mysqli_query($connection,$query);
    //echo "$query";

    $query.="INSERT INTO ";
    $query.="user_details (user_id,full_name,phone_no,email) ";
    $query.="VALUES (";
    $query.=" '{$username}','{$name}','{$phone_no}','{$safe_email}'";
    $query.=");";
    //echo "$query";
    $result=mysqli_multi_query($connection,$query);
    if(!$result)
      echo "Query failed";
    return $result;
  }

  function logged_in(){
    return isset($_SESSION['username']);
  }
  function confirm_logged_in(){
    if(!logged_in()){
      redirect("index.php");
    }
  }


?>
