<?php
include ("session.php");
require_once  '../model/Messages.php';
require_once '../views/Excel.php';
$mod = new Messages();
$mod->printEnergyUsage();


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
        <title>HEDA - Household Energy Use</title>
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
                                    <a href="Map.php">Clients Map</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                        <c1>Fuel Data</c1>
                        <ul>
                            <li>
                                <a href="fuel-data.php"><c1>Household Usage</c1></a>
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
                        <li>
                            System Set Up
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
                    <div id="header">
                        List of Sent Household Fuel Usage
                    </div>
                    <div  style="float: right">
                        <?php
                        $file = 'List of Household energy use.pdf';
                        $excel = "Excel.xlsx";
                        ?>
                        <a href='../model/download-fuel-usage-excel.php?download_file=<?php echo $excel ?>' target="_blank"><img src='../images/File_type_Extension_71-24.png' alt='Download'></a>
                        <a href='../model/download-fuel-usage-excel.php?download_file=<?php echo $excel ?>' target="_blank">Excel</a>
                        <a href='../model/download-fuel-usage.php?download_file=<?php echo $file ?>' target="_blank"><img src='../images/pdf.png' alt='Download'></a>
                        <a href='../model/download-fuel-usage.php?download_file=<?php echo $file ?>' target="_blank">Download PDF</a>
                    </div>
                    <?php
                    $array = $mod->getTotalFuelConsumption();
                    $total = array_sum($array);
                    $size = count($array);
                    $mean = $total / $size;
                    $formattedNum = number_format($mean, 2);
                    ?>
                    <div style="float:left; padding-left: 10px; font-family: cambria; font-size: 30px;  font-weight: bold">
                        <table class="table_s1">
                            <th>Total</th>
                            <th>Mean</th>
                            <tr>
                                <td>
<?php echo $total . ' Kg' ?>
                                </td>
                                <td>
<?php
echo $formattedNum . ' Kg/household';
?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>                  

                    <div id="tooplate_contentusers" style="overflow-y: scroll; height:500px;" >                        
<?php
$mod->getEnergyUsage();
?>

                    </div>


                </div>
            </div>
            <div id="tooplate_footer">    
                Copyright © 2015 <a href="http://www.eedadvisory.com" target="_blank">EED Advisory Limited </a> | Designed for Household Energy Data Aggregator (HEDA).
            </div>
        </div><!-- End of Wrapper-->

    </body>
</html>
