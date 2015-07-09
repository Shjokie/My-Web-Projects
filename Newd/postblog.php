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

   /* // Uploading the photo to the server
    $myPhoto = $_FILES["myPhoto"];
    if ($myPhoto["error"] !== UPLOAD_ERR_OK) {
        die (mysql_error());
        exit;
    }
    // verify the file type
    $fileType = exif_imagetype($_FILES["myPhoto"]["tmp_name"]);
    $allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
    if (!in_array($fileType, $allowed)) {
        echo "<p>File type is not permitted.</p>";
        exit;
    }
    // ensure a safe filename
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myPhoto["name"]);
    //$name = "Bettirose";
    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists(PHOTOUPLOAD_DIR . $name)) {
        $i++;
        $name = $picID ."." . $parts["extension"];
        //$parts["filename"]
    }
    // preserve file from temporary directory
    $success = move_uploaded_file($myPhoto["tmp_name"], PHOTOUPLOAD_DIR . $name);
    if (!$success) {
        echo "<p>Unable to save file.</p>";
        exit;
    }
    // set proper permissions on the new file
    chmod(PHOTOUPLOAD_DIR . $name, 0644);
    echo "<p>Uploaded file saved as " . $name . ".</p>";

    // Uploading an attachment 
   
   $myFile = $_FILES["myFile"];
    if ($myFile["error"] !== UPLOAD_ERR_OK) {
        echo "<p>An error occurred.</p>";
        exit;
    }
    // verify the file type
    $fileType = exif_imagetype($_FILES["myFile"]["tmp_name"]);
    $allowed = array(APPLICATION_PDF, APPLICATION_DOC, APPLICATION_DOCX);
    if (!in_array($fileType, $allowed)) {
        echo "<p>File type is not permitted.</p>";
        exit;
    }
    // ensure a safe filename
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
    //$name = "Bettirose";
    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists(FILEUPLOAD_DIR . $name)) {
        $i++;
        $name = $picID . "-" . $i . "." . $parts["extension"];
        //$parts["filename"]
    }
    // preserve file from temporary directory
    $success = move_uploaded_file($myFile["tmp_name"], FILEUPLOAD_DIR . $name);
    if (!$success) {
        echo "<p>Unable to save file.</p>";
        exit;
    }
    // set proper permissions on the new file
    chmod(FILEUPLOAD_DIR . $name, 0644);
    echo "<p>Uploaded file saved as " . $name . ".</p>";*/

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
 
