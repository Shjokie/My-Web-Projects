<?php
include ("session.php");
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include '../model/Messages.php';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$message =$id = $description = $date_added = "";
$messageErr = $descriptionErr = "";
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['edit-system-message'])){
        $id = $_POST['id'];
        $message = $_POST['message'];
        $description = $_POST['description'];
        $date_added = $_POST['date_added'];
    }
    if (isset($_POST['submit-system-message'])) {
        $id = $_POST['id'];
        $date_added = str_replace('/', '-', $_POST['date_added']);
        if (empty($_POST['message'])) {
            $messageErr = "Message is Required !";
        } else {
            $message = test_input($_POST['message']);
        }
        if (empty($_POST['description'])) {
            $descriptionErr = "Description is Required !";
        } else {
            $description = test_input($_POST['description']);
        }
        if (!empty($message) && !empty($description)) {
            $model = new Messages();
            if (($model->editSystemMessage($id, $message, $description, $date_added) > 0)) {
                header("location: system-messages.php");
            } else {
                $error = "Addition of new Message Failed !";
            }
        }
    }
}
?>
<html>
    <head>
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="../js/Date.js"></script>
        <style type="text/css">
            p2{
                color: #ff0307;
                font-family: Cambria;
                font-size: 14px; 
                font-weight: bold;
                //text-align: center;
            }
        </style>


        <meta charset="UTF-8">
        <title>Edit System Message</title>
        <script type="text/javascript">
            function getDate() {
                document.forms["system-message-form"][ "date_added"].value = getDateTime();
            }</script>
    </head>
    <body>
        <div id="tooplate_wrapper">
            <div id="tooplate_header">

                <div id="tooplate_menu">
                    <ul>
                        <li>
                            <a href="dashboard.php" >Dashboard</a>
                        </li>
                        <li><c1>User Page</c1>
                        <ul>
                            <li>
                                <a href="new-user.php"><c1>New User</c1></a>
                            </li>
                            <li>
                                <a href="users.php">View Users</a>
                            </li>
                        </ul>
                        </li>

                        <li>
                            Client Page
                            <ul>
                                <li>
                                    <a href="new-client.php">New Client</a>
                                </li>
                                <li>
                                    <a href="clients.php">View Clients</a>
                                </li>
                                <li>
                                    <a href="Map.php"><c1>Clients Map</c1></a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            Fuel Data
                            <ul>
                                 <li>
                                    <a href="fuel-data.php">Household Usage</a>
                                </li>
                                <li>
                                    <a href="">Kerosene</a>
                                </li>
                                <li>
                                    <a href="">Fire Wood</a>
                                </li>
                                <li>
                                    <a href="">Charcoal</a>
                                </li>
                            </ul>
                        </li>
                        <li>System Set Up
                            <ul>
                                <li>
                                    <a href="system-messages.php">System Messages</a>
                                </li>
                                <li>
                                    <a href="sent-messages.php">Sent Messages</a>
                                </li>

                            </ul>
                        </li>
                        <li>Contact</li>
                    </ul>
                    <div id="toolplate_session">
                        <b><p1>Welcome</p1> </style>:<p2> <i><?php echo $login_session; ?></i></p2></b>
                        <b id="logout"><a href="logout.php"><p1>Log Out</p1></a></b>&nbsp; &nbsp;
                    </div>
                </div>
            </div><!-- End of Header-->
            <div id="tooplate_main">
                <div id="tooplate_content_new_client" >
                    <br>
                    <br>
                    <br>
                    <p2>Edit Details of System Message. Mandatory Fields are marked <span class="error">*</span></p2>
                </div>
                <div id="tooplate_content" >
                    <div id="tooplate_contentusers" >

                        <form name="system-message-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="getDate()">
                            <table border="0" cellspacing="10" cellpadding="10" align="center" width="600">
                                <tbody>
                                    <tr>
                                        <td bgcolor="#F0F8FF" valign="top">
                                <p1>Message <span class="error">*</span></p1>
                                </td>
                                <td  bgcolor="#F0F8FF">
                                    <textarea name="message" rows="5" style="width: 95%;"><?php echo $message; ?></textarea>
                                    <br><span class="error"> <?php echo $messageErr; ?></span>
                                    
                                </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                       
                                <p1>Description <span class="error">*</span></p1>
                                </td>
                                <td>
                                     <textarea name="description" rows="5" cols="60"><?php echo $description; ?></textarea>
                                    <br><span class="error"> <?php echo $descriptionErr; ?></span>
                                </td>
                                </tr>

                                <tr>
                                    <td>

                                    </td>
                                    <td>
                                        <input type="hidden" name="id" value="<?php echo $id; ?>" size="50" />
                                        <input type="text" name="date_added" id="date_added" value="" size="50" hidden />
                                        <input type="submit" value="Save" name="submit-system-message" class="button" />
                                        <br><span class="error"> <?php echo $error; ?></span>
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                        </form>
                    </div>
                </div>
            </div>
            <div id="tooplate_footer">    
                Copyright © 2015 <a href="http://www.eedadvisory.com" target="_blank">EED Advisory Limited </a> | Designed for Household Energy Data Aggregator (HEDA).
            </div> 
        </div><!-- End of Wrapper-->

    </body>
</html>
