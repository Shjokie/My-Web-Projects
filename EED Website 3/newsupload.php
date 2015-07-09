<?php
$title = $_POST["postTitle"];
$post = $_POST["content"];


// New Timezone Object 
$date = new DateTime(null, new DateTimeZone('Africa/Nairobi'));
$postingdate = $date->format('Y-m-d H:i:s') . "\n";

//echo $postingdate;

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
							  	/*echo "Upload: " . $_FILES["fileToUpload"]["name"] . "<br>";
								echo "Type: " . $_FILES["fileToUpload"]["type"] . "<br>";
								echo "Size: " . ($_FILES["fileToUpload"]["size"] / 200000) . " kB<br>";
								echo "Temp file: " . $_FILES["fileToUpload"]["tmp_name"] . "<br>";
							  	echo "Stored in: " . "attachments/" . $_FILES["fileToUpload"]["name"];
							  //echo $title, $post,$filename, $filepath, $filesize, $filetype;*/

								require_once("connect.php");
								$query= "INSERT INTO news_updates(news_id, news_title, news_body, date_posted, file_name, file_path, file_size, file_type) 
								             VALUES(NULL, '$title', '$post', '$postingdate', '$filename', '$filepath', '$filesize', '$filetype')";
								$result = mysql_query($query) or die(mysql_error());

								if($result)
								{
									echo "Great";
								}
								else{
									echo "Too bad";
								}

					  }
				 }
		 }
	else
		{
			echo "Invalid file";
		}
?>