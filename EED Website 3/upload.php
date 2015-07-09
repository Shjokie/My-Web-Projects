<?php
/*$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}*/
//target_dir = "uploads/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$allowedExts = array("doc", "docx", "pdf", "gif", "jpeg", "jpg", "png");
$ext = explode(".", $_FILES["fileToUpload"]["name"]);
$extension = end($ext);
$filename = $_FILES["fileToUpload"]["name"];
$filepath = "attachments/" . $_FILES["fileToUpload"]["name"];
$filetype = $_FILES["fileToUpload"]["type"];
$filesize = ($_FILES["fileToUpload"]["size"] / 200000) . " kB";
if (($_FILES["fileToUpload"]["type"] == "application/pdf")
|| ($_FILES["fileToUpload"]["type"] == "image/gif")
|| ($_FILES["fileToUpload"]["type"] == "image/jpeg")
|| ($_FILES["fileToUpload"]["type"] == "image/jpg")
|| ($_FILES["fileToUpload"]["type"] == "application/msword")
|| ($_FILES["fileToUpload"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
|| ($_FILES["fileToUpload"]["type"] == "image/pjpeg")
|| ($_FILES["fileToUpload"]["type"] == "image/x-png")
|| ($_FILES["fileToUpload"]["type"] == "image/png")
&& ($_FILES["fileToUpload"]["size"] < 2000000)
&& in_array($extension, $allowedExts))
{
if ($_FILES["fileToUpload"]["error"] > 0)
{
echo "Return Code: " . $_FILES["fileToUpload"]["error"] . "<br>";
}
else
{


if (file_exists("upload/" . $_FILES["fileToUpload"]["name"]))
  {
  echo $_FILES["fileToUpload"]["name"] . " already exists. ";
  }
else
  {
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],
  "attachments/" . $_FILES["fileToUpload"]["name"]);
  echo "Upload: " . $_FILES["fileToUpload"]["name"] . "<br>";
echo "Type: " . $_FILES["fileToUpload"]["type"] . "<br>";
echo "Size: " . ($_FILES["fileToUpload"]["size"] / 200000) . " kB<br>";
echo "Temp file: " . $_FILES["fileToUpload"]["tmp_name"] . "<br>";
  echo "Stored in: " . "attachments/" . $_FILES["fileToUpload"]["name"];
  


require_once("connect.php");
$query="INSERT INTO file_details (file_id, file_name, file_path, file_type, file_size) VALUES (NULL, '$filename', '$filepath', '$filetype', '$filesize')";
$result = mysql_query($query);

  }
 }
 }
else
{
echo "Invalid file";
 }
?> 