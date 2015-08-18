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

  function fetch_course_name($course_id){
    global $connection;
    $query="SELECT course_name FROM course_list WHERE course_id={$course_id}";
    $result=mysqli_query($connection,$query);

    if(!$result){

      echo "Query failed";
    }
    else{
      $row=mysqli_fetch_assoc($result);
      $result=$row["course_name"];
      return $result;
    }
  }
  function fetch_course_list(){
    global $connection;
    $query="SELECT * FROM course_list ORDER BY published_date DESC";

    //echo $query;

    $result=mysqli_query($connection,$query);
    if(!$result){
      echo "Query failed";
    }
    else
      return $result;
  }

  function fetch_section_list($course_name){
    global $connection;
    $query="SELECT * FROM {$course_name} ORDER BY position ASC";

    //echo $query;

    $result=mysqli_query($connection,$query);
    if(!$result){
      echo "Query failed";
    }
    else
      return $result;
  }

  function fetch_video_list($course_name,$section_name){
    global $connection;
    $query="SELECT * FROM {$course_name}_{$section_name} ORDER BY position ASC";

    //echo $query;

    $result=mysqli_query($connection,$query);
    if(!$result){
      echo "Query failed";
      return $result;
    }
    else
      return $result;
  }

  function add_section($course_name,$section_name,$position){
    global $connection;
    $query="INSERT INTO {$course_name} (name,position) VALUES('{$section_name}',{$position})";

    $query_video="CREATE TABLE {$course_name}_{$section_name} (name VARCHAR(20) NOT NULL,id INT(3) NOT NULL AUTO_INCREMENT,";
    $query_video.="position INT(3) NOT NULL, video_link VARCHAR(200) NOT NULL, video_format VARCHAR(5) NOT NULL,PRIMARY KEY(id))";
    //echo $query;
    if (!file_exists('courses/'.$course_name.'/'.$section_name)) {
    mkdir('courses/'.$course_name.'/'.$section_name, 0777, true);
    }
    $result=mysqli_query($connection,$query);
    if(!$result){
      echo "Query failed";
    }
    else{
      $result=mysqli_query($connection,$query_video);
      if(!$result){
        echo "Query failed";

      }
      else {
        return $result;
      }
    }
  }

  function fetch_course_category(){
    global $connection;
    $query="SELECT * FROM course_category ORDER BY category_id ASC";
    //echo $query;
    $result=mysqli_query($connection,$query);
    if(!$result){
      echo "Query failed";
    }
    else
      return $result;
  }

  function validate($title,$category_id,$author,$MRP,$SP){
    return true;
  }

  function add_course($title,$category_id,$author,$MRP,$SP){
    global $connection;
    $query="INSERT INTO course_list (course_name,category_id,author,published_date,MRP,SP) VALUES('";

    $query.="{$title}',{$category_id},'{$author}',now(),{$MRP},{$SP}";
    $query.=");";
    $query_section="CREATE TABLE {$title} (name VARCHAR(20) NOT NULL,id INT(3) NOT NULL AUTO_INCREMENT,";
    $query_section.="description VARCHAR(200), position INT(3) NOT NULL, PRIMARY KEY(id))";
    //echo $query;
    if (!file_exists('courses/'.$title)) {
    mkdir('courses/'.$title, 0777, true);
    }
    $result=mysqli_query($connection,$query);

    if($result){
      $result1=mysqli_query($connection,$query_section);
			   if($result1)
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


  function upload_video($course_name,$section_name){
    $target_dir = "videos/";
    $target_dir.=$course_name."/".$section_name."/";
    if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
    }
    echo $target_dir;
    $target_file = $target_dir . basename($_FILES["video"]["name"]);
    $uploadOk = 1;
    $videoFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    $fhandle = finfo_open(FILEINFO_MIME);
    $mime = finfo_file($fhandle,$_FILES["video"]["tmp_name"]);

    if(strstr($mime, "video/")) {
        echo "File is a video - " . $mime . ".";
        $uploadOk = 1;
    } else {
        echo "File is not a video.";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
    echo "Sorry, file already exists. Using existing video";
    $uploadOk = 0;
    }
    $video_link=$target_dir .$_FILES["video"]["name"];
    if($uploadOk==1){
      if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["video"]["name"]). " has been uploaded.";
          //echo $video_link;
          return $video_link;
      } else {
          echo "Sorry, there was an error uploading your file.";
          return $video_link;
    }
  }
  else {
    //echo "Sorry";
    return $video_link;
  }
}

  function add_video($course_name,$section_name,$video_link,$position){
    global $connection;
    $fhandle = finfo_open(FILEINFO_MIME);
    $video_format = finfo_file($fhandle,$_FILES["video"]["tmp_name"]);
    $arr=(explode(';',$video_format));
    $video_format=$arr[0];
    $query="INSERT INTO {$course_name}_{$section_name} (name,position,video_link,video_format) VALUES('";
    $query.=$_FILES["video"]["name"]."',{$position},'{$video_link}','{$video_format}')";
    echo $query;
    $result=mysqli_query($connection,$query);
    if($result){
      return true;
    }
    else {
      return false;
    }
  }

  function unserializeForm($str) {
    $returndata = array();
    $strArray = explode("&", $str);
    $i = 0;
    foreach ($strArray as $item) {
        $array = explode("=", $item);
        $returndata[$array[0]] = $array[1];
    }

    return $returndata;
  }

  function generate_article_preview($title,$article_tag,$tile_css){
    $icon_link=upload_image("preview");
    $preview="<div class=\"row\" style=\"height:220px;\"><hr><div class=\"tile col-md-4 col-sm-6 col-xs-12\" style=\"width:375px;\">
            <div class=\"tile {$tile_css}";
    $preview.= "\">";
    $preview.= "<h4 class=\"article-tag\">{$article_tag}</h4>";
    $preview.= "<a href=\"#\"><img src=\"{$icon_link}\" alt=\"img\" class=\"icon\"></a> <!--350px x 200px-->";
    $preview.= "<a href=\"#\"><p class=\"title\">{$title}</p></a>";
    $preview.= "</div> <!--tile second-column--></div> <!--column-->";
    //echo $preview;
    return $preview;
  }



/******************** UPDATE HOME PAGE CMS **************************/

/******************** DELETE ARTICLES PAGE CMS **************************/

  function generate_articles_list($article_type,$article_tag){
    global $connection;
    //echo "hey{$article_tag}{$article_type}";
    if($article_type=="Any"&&$article_tag=="Any")
    {
      $query="SELECT * FROM articles_list";
      $result=mysqli_query($connection,$query);
      //echo "$query";
    }
    else if($article_tag="Any"){
      $query="SELECT * FROM articles_list where article_type='{$article_type}'";
      $result=mysqli_query($connection,$query);
      //echo "$query";
    }
    else{
      $query="SELECT * FROM articles_list where article_tag='{$article_tag}'";
      $result=mysqli_query($connection,$query);
      //echo "$query";
    }
    if($result){
      return $result;
    }
    else{
      echo "articles list fetch failed";
    }
  }

  function delete_article($article_id){
    global $connection;
    $error="";

    //Article page to be deleted
    $query="SELECT link FROM articles_list WHERE article_id={$article_id}";
    //echo $query;
    $files=mysqli_query($connection,$query);
    $row=mysqli_fetch_assoc($files);
    if($files){
      if(delete_file($row['link'])){
        $error.="Page deletion successful.<br>";
      }
      else{
        $error.="Page deletion failed. File may not exist.<br>";
      }
    }
    else{
      $error.="Page link not available.<br>";
    }

    //Icon image to be deleted
    $query="SELECT icon_link FROM articles_list WHERE article_id={$article_id}";
    //echo $query;
    $files=mysqli_query($connection,$query);
    $row=mysqli_fetch_assoc($files);
    if($files){
      if(delete_file($row['icon_link'])){
        $error.="Icon image deletion successful.<br>";
      }
      else{
        $error.="Icon image deletion failed. File may not exist.<br>";
      }
    }
    else{
      $error.="Icon link not available.<br>";
    }

    $query="DELETE FROM articles_list WHERE article_id='";
    $query.=$article_id;
    $query.="'";
    //echo $query;
    $result=mysqli_query($connection,$query);
    if($result){
      $error.="Article entry deleted.<br>";
    }
    else{
      $error.="Article deletion failed.<br>";
    }
    return $error;

}

  function delete_file($link){
    if(unlink($link)){
      return true;
    }
    else{
      return false;
      }
  }

/******************** DELETE ARTICLES PAGE CMS **************************/

?>
