<?php $username = mysqli_real_escape_string($_POST['username']);
global $connection;
//mysql query to select field username if it's equal to the username that we check '
$query='select user_id from user_auth where username = "'. $username .'"';
$result = mysqli_query($connection,$query);
echo $query;

//if number of rows fields is bigger them 0 that means it's NOT available '
if(mysqli_num_rows($result)>0){
    //and we send 0 to the ajax request
    echo "<span class='status-not-available'> Username Not Available.</span>";;
}
else{
    //else if it's not bigger then 0, then it's available '
    //and we send 1 to the ajax request
    echo "<span class='status-available'> Username Available.</span>";;
}
 ?>
