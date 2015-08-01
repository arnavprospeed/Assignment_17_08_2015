<?php function redirect($location){
    header("Location: ". $location);
  }
/************************** GENERIC FUNCTIONS *********************************/
  function mysql_prep($string){
    global $connection;
    $escaped_string=mysqli_real_escape_string($connection,$string);
    return $escaped_string;
  }

/************************** GENERIC FUNCTIONS *********************************/

/********************* LOG IN and SIGN UP functions ***************************/

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


  function check_free_username($username){
      global $connection;
      $safe_username=mysql_prep($username);

      //mysql query to select field username if it's equal to the username that we check '
      $query='select user_id from user_auth where user_id = "'. $safe_username .'"';
      //echo "$query";
      $result = mysqli_query($connection,$query);
      //if number of rows fields is bigger them 0 that means it's NOT available '
      //and we send 0 to the ajax request
      if (mysqli_num_rows($result)>0){
        return false;
      }
      //else if it's not bigger then 0, then it's available '
      //and we send 1 to the ajax request
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
/******************** LOG IN and SIGN UP functions **************************/


/******************** UPDATE HOME PAGE CMS **************************/

  function fetch_article_list($article_type,$limit){
    $query="SELECT * FROM articles_list where article_type=\"";
    $query.="{$article_type}";
    $query.="\" ORDER BY published_date DESC LIMIT ";
    $query.="{$limit}";
    //echo $query;
    global $connection;
    $result=mysqli_query($connection,$query);
    return $result;
  }

  function fetch_tile_css(){
    global $connection;
    $query="SELECT * FROM tile_css";
    $result=mysqli_query($connection,$query);
    if(!$result){
      echo "Query failed";
    }
    else
      return $result;
  }
  function fetch_article_tags(){
    global $connection;
    $query="SELECT * FROM article_tags_list";
    $result=mysqli_query($connection,$query);
    if(!$result){
      echo "Query failed";
    }
    else
      return $result;
  }

  function add_article($title,$article_type,$article_tag,$tile_css,$link,$icon_link){
    global $connection;
    $query="INSERT INTO articles_list (title,article_type,article_tag,css_class,link,icon_link,published_date) VALUES('";

    $query.="{$title}','{$article_type}','{$article_tag}','{$tile_css}','{$link}','{$icon_link}',now()";
    $query.=")";
    //echo $query;
    $result=mysqli_query($connection,$query);

    if($result){
				if(create_article_page(mysqli_insert_id($connection)))
          return true;
        else {
          return false;
        }
    }
    else{
      return false;
    }
  }

  function create_article_page($article_id){
    global $connection;
    $query="SELECT ";
    $query.="title,link FROM articles_list WHERE article_id='";
    $query.=$article_id;
    $query.="'";
    echo $query;
    $fetched_title=mysqli_query($connection,$query);
    $row=mysqli_fetch_assoc($fetched_title);
    $title=$row["title"];
    $link=$row["link"];
    echo $title;
    $myfile = fopen("{$link}", "w") or die("Unable to open file!");
    $txt = "<?php echo \"{$title}\"?>\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    return true;
  }

  function upload_image($type){
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["icon_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["icon_image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    }
    $icon_link=0;
    if($uploadOk==1){
      if (move_uploaded_file($_FILES["icon_image"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["icon_image"]["name"]). " has been uploaded.";
          $icon_link=$target_dir .$_FILES["icon_image"]["name"];
          echo $icon_link;
          return $icon_link;
      } else {
          echo "Sorry, there was an error uploading your file.";
          return $icon_link;
    }
  }
  else {
    echo "Sorry";
  }
}



/******************** UPDATE HOME PAGE CMS **************************/

?>
