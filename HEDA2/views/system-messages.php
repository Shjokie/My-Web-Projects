<?php
include ("session.php");
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {    
    if (isset($_POST['send-system-message'])) {
        require_once '../model/Messages.php';
        $message_id = $_POST['id'];  
        $model = new Messages();
        if ($model->sendMessageToAll($message_id) > 0) {
            $message = "Messages Sent! ";
            header("location: system-messages.php");
        } else {
            $message = "Messages Not Sent";
        }
        
    }
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="../js/Date.js"></script>
        <title>HEDA - System Messages</title>
        <style type="text/css">
            p2{
                color: #ff0307;
                font-family: Cambria;
                font-size: 14px; 
                font-weight: bold;
                //text-align: center;
            }
        </style>
        <script type="text/javascript">
            function getDate() {
                document.forms["system-messages-form"][ "date_sent"].value = getDateTime();
            }
        </script>
    </head>
    <body>
        <div id="tooplate_wrapper">
            <div id="tooplate_header">

                <div id="tooplate_menu">
                    <ul>
                        <li>
                            <a href="dashboard.php" >Dashboard</a>
                        </li>
                        <li>User Page
                            <ul>
                                <li>
                                    <a href="new-user.php">New User</a>
                                </li>
                                <li>
                                    <a href="users.php"><c1>View Users</c1></a>
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
                        <li><c1>System Set Up</c1>
                        <ul>
                            <li>
                                <a href="system-messages.php"><c1>System Messages</c1></a>
                            </li>
                            <li>
                                <a href="sent-messages.php">System Messages</a>
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
                <div id="tooplate_content" >
                    <div id="header">
                        List of System Messages
                    </div>
                    <form name="create" action="create-system-message.php" method="POST">
                        <input type="submit" value="Add System Message" name="add-message" class="button1" />
                    </form>
                    <div id="tooplate_contentusers" >

                        <?php
                        require_once  '../model/Messages.php';
                        $model = new Messages();
                        $model->viewSystemMessages();
                        
                        ?>
                        <p1><?php echo $message; ?></p1>
                    </div>
                </div>
            </div>
            <div id="tooplate_footer">    
                Copyright © 2015 <a href="http://www.eedadvisory.com" target="_blank">EED Advisory Limited </a> | Designed for Household Energy Data Aggregator (HEDA).
            </div>
        </div><!-- End of Wrapper-->

    </body>
</html>
