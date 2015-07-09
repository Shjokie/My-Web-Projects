<?php
include ("session.php");
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
        <title>View Clients Page</title>
        <style type="text/css">
            p2{
                color: #ff0307;
                font-family: Cambria;
                font-size: 14px; 
                font-weight: bold;
                //text-align: center;
            }
        </style>
    </head>
    <body>
        <div id="tooplate_wrapper" >
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
                        <c1>Client Page</c1>
                        <ul>
                            <li>
                                <a href="new-client.php">New Client</a>
                            </li>
                            <li>
                                <a href="clients.php"><c1>View Clients</c1></a>
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
                <div id="tooplate_content" >
                    <div id="tooplate_contentusers" >
                        <div id="tooplate_contentusers" style="overflow-y: scroll; height:500px;" >  
                            <?php
                            include '../model/ClientModel.php';
                            $model = new ClientModel();
                            $model->viewClients();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tooplate_footer">    
                Copyright © 2015 <a href="http://www.eedadvisory.com" target="_blank">EED Advisory Limited </a> | Designed for Household Energy Data Aggregator (HEDA).
            </div>
        </div><!-- End of Wrapper-->

    </body>
</html>
