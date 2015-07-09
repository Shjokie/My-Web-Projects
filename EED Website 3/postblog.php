<?php
define("PHOTOUPLOAD_DIR", "uploads/");
define("FILEUPLOAD_DIR", "attachment/");

$title = $_POST["postTitle"];
$intro = $_POST["intro"];
$post = $_POST["content"];

// New Timezone Object 
$date = new DateTime(null, new DateTimeZone('Africa/Nairobi'));
$postingdate = $date->format('Y-m-d H:i:s') . "\n";


require_once("connect.php");

$query = "INSERT INTO blog(postID,postTitle,intro,content,datePosted,author_id,pic_id) 
			VALUES(NULL,'$title','$intro','$post','$postingdate',NULL,NULL)";
$result = mysql_query($query) or die(mysql_error());
 if($result)
 {
 	echo "DOne $ done";

 }
 else 
 {
 	echo "try again";
 }


 $query2 = mysql_query("SELECT postID FROM blog WHERE postTitle ='$title'");
 while($row = mysql_fetch_array($query2)) {

     // Write the value of the column FirstName (which is now in the array $row)
    $post_id = $row['postID'];
    //echo $picID;

    }

    if(isset($_FILES['files'])){
    $errors= array();
    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
        $file_name = $post_id.$_FILES['files']['name'][$key];
        $file_size =$_FILES['files']['size'][$key];
        $file_tmp =$_FILES['files']['tmp_name'][$key];
        $file_type=$_FILES['files']['type'][$key];  
        if($file_size > 2097152){
            $errors[]='File size must be less than 2 MB';
        }       
        $query="INSERT into upload_data (data_id, post_id, file_name, file_size, file_type) VALUES(NULL,'$post_id','$file_name','$file_size','$file_type'); ";
        $desired_dir="uploads";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);        // Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{                                  // rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;               
            }
         mysql_query($query);           
        }else{
                print_r($errors);
        }
    }
    if(empty($error)){
        echo "Success";
    }
}
 ?>
 
