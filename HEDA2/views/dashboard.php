<!DOCTYPE html>
<?php
include ("session.php");

?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="../css/style.css" rel="stylesheet"  type="text/css">
        <link href="../css/demo.css" rel="stylesheet"  type="text/css">
        <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.css" />
        <meta charset="UTF-8">
        <style type="text/css">
            p2{
                color: #ff0307;
                font-family: Cambria;
                font-size: 14px; 
                font-weight: bold;
                //text-align: center;
            }
        </style>
        <title>Dash Board</title>
    </head>
    <body>
        <div id="tooplate_wrapper">
            <div id="">

                <nav id="colorNav">
                <ul>
                    <li class="green">
                        <a href="#" class="icon-home"></a>
                        <ul>
                            <li><a href="#">Home</a></li>
                            
                            <!-- More dropdown options -->
                        </ul>
                    </li>
                    <li class="red">
                        <a href="#" class="icon-user"></a>
                        <ul>
                            <li><a href="#">New User</a></li>
                            <li><a href="#">View Users</a></li>
                            <!-- More dropdown options -->
                        </ul>
                    </li>
                    <li class="blue">
                        <a href="#" class="icon-group"></a>
                        <ul>
                            <li><a href="#">New Client</a></li>
                            <li><a href="#">View Clients</a></li>
                            <li><a href="#">Map Clients</a></li>
                            <!-- More dropdown options -->
                        </ul>
                    </li>
                    <li class="yellow">
                        <a href="#" class="icon-bar-chart"></a>
                        <ul>
                            <li><a href="#">Household usage</a></li>
                            <li><a href="#">Kerosene</a></li>
                            <li><a href="#">Firewood</a></li>
                            <li><a href="#">Charcoal</a></li>
                            <!-- More dropdown options -->
                        </ul>
                    </li>
                    <li class="purple">
                        <a href="#" class="icon-envelope"></a>
                        <ul>
                            <li><a href="#">Send Message</a></li>
                            <li><a href="#">View Received Messages</a></li>
                            <li><a href="#">View Sent Messages</a></li>
                            
                            <!-- More dropdown options -->
                        </ul>
                    </li>
                    <li class="green">
                        <a href="#" class="icon-comments"></a>
                        <ul>
                            <li><a href="#">Talk to Us</a></li>
                            
                            <!-- More dropdown options -->
                        </ul>
                    </li>





                    <!-- More menu items -->

                </ul>
            </nav>
            </div><!-- End of Header-->
            <div id="tooplate_main">
                <div id="tooplate_content" >
                    <div id="header">COMPARISON GRAPH FOR FUEL USAGE</div>
                    
                        <?php
                    require_once "clientsGraph.php";
                     
                        ?>
                    <img src="clientsGraph.png">
                    <br>
                    <?php 
                    require_once 'fuelGraph.php';
                    require_once 'firewoodGraph.php';
                    require_once 'charcoalGraph.php';
                    require_once 'keroseneGraph.php';
                    ?>
                    <table>
                        <tr>
                            <td align="left"  style="padding-right: 30px">
                                <img src="fuel.png">
                            </td>
                            
                            <td align="right">
                                <img src="firewood.png">
                            </td>
                        </tr>
                        <tr>
                            <td align="left">
                                <img src="charcoal.png">
                            </td>
                           
                            <td align="right">
                                <img src="kerosene.png">
                            </td>
                        </tr>
                    </table>
                    
                </div>
            </div>
            <div id="tooplate_footer">    
                Copyright © 2015 <a href="http://www.eedadvisory.com" target="_blank">EED Advisory Limited </a> | Designed for Household Energy Data Aggregator (HEDA).
            </div> 
        </div><!-- End of Wrapper-->


    </body>
</html>
