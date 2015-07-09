<?php
	
	// 1. Import the helper Gateway class and database connection

	// 2. Read in the received values
	$link = mysql_connect("localhost", "root", "", "heda_db");
	mysql_select_db("heda_db");
 
	// Check connection
	if(!$link)
	{
	    die("ERROR: Could not connect. " . mysql_error());
	}
	$phoneNumber = ($_POST["phonenumber"]); // sender's Phone Number
	//$shortCode = mysql_real_escape_string($_POST["to"],$db); // The short code that received the message
	$text = ($_POST["text"]); // Message text
	//$linkId = mysql_real_escape_string($_POST["linkId"],$db); // Used To bill the user for the response
	$date =($_POST["date"]); // The time we received the message
	//$id = mysql_real_escape_string($_POST["id"],$db); // A unique id for this message



	//3. Process the received data

	$textparts = preg_split ("/\,/",$text);//split the text at the commas to get index no, gender and marks
	$energy=trim($textparts[0]); //trim function to remove whitespace 
	$amount=trim($textparts[1]);
	//$rawmarks=trim($textparts[2]);
	//$marks=substr($rawmarks,0,3);// Incase the message includes a signature or a fullstop
	//$districtcode=substr($index,0,5);
	//$nationalmsg=null;
	//$xtramsg=null;
	//$countymsg=null;
	//$message=null;
	//echo $energy;
	//echo $amount;

	$sql = "INSERT INTO incoming_messages (MsgId,amount,sender_number,energy_id, date_received,deleted) VALUES (NULL,$amount,$phoneNumber,$energy,$date, 0)";
	$query = mysql_query($sql);
			if($query)
			{
				echo "records added succesfully";
			}
			else{
	    			echo "ERROR: Could not able to execute $sql. " . mysql_error();
				}

			
	

	/*// Create an instance of the gateway class
	//$username = "Nyangolo";
	//$apiKey = "335406d0cd962db8a083c05aa55138113d7fa3370840cb0f8f25e19e67348c6c";
	//$gateway = new AfricasTalkingGateway($username, $apiKey);
	try {
	// Send a response originating from the short code that received the message
	//$bulkSmsMode=0;
	//$options = array();
	//$options['linkId'] = $linkId;
	//$results = $gateway->sendMessage($phoneNumber,$message, $shortCode,$bulkSmsMode,$options);

	 //$sendingResult = sendMessage($to,$message,$from,$bulkSmsMode,$options);
	// Read in the gateway response and persist if necessary
	$response = $results[0];
	$status = $response->status;
	$cost = $response->cost;
	} catch ( AfricasTalkingGatewayException $e ) {
	// Log the error
	$errorMessage = $e->getMessage();
	}
	//Insert SMS details  in the takwimu database for monitoring
	$msglength=strlen($message);
	include_once("takwimu.php");*/
?>