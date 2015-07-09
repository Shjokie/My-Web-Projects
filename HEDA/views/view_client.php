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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['view_client'])) {
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $second_name = $_POST['second_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $passport = $_POST['passport'];
        $country = $_POST['country'];
        $province = $_POST['province'];
        $county = $_POST['county'];
        $district = $_POST['district'];
        $division = $_POST['division'];
        $location = $_POST['location'];
        $nearest_town = $_POST['nearest_town'];
        $postal_address = $_POST['postal_address'];
        $postal_town = $_POST['postal_town'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $marital_status = $_POST['marital_status'];
        $family_size = $_POST['family_size'];
        $rooms = $_POST['rooms'];
        $connect_grid = $_POST['connected'];
        
        $distance = $_POST['distance'];
        $energy = $_POST['fuel'];
        $gps = $_POST['gps'];
        $household_head = $_POST['household_head'];
        $household_category = $_POST['household_category'];
        $building_materials = $_POST['building_materials'];
        $income_sources = $_POST['income_sources'];
        $main_income_source = $_POST['main_source'];
        $monthly_income = $_POST['monthly_income'];
        $cooking_methods = $_POST['cooking_methods'];
        $cooking_frequency = $_POST['cooking_frequency'];
        $cooking_type = $_POST['cooking_type'];
        $lighting_methods = $_POST['lighting_methods'];
        $rooms_lit = $_POST['rooms_lit'];
        $lighting_duration = $_POST['lighting_duration'];
    }
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="../local/webfxlayout.js"></script>
        <link id="luna-tab-style-sheet" type="text/css" rel="stylesheet" href="../css/luna/tab.css" disabled="disabled" />
        <link id="webfx-tab-style-sheet" type="text/css" rel="stylesheet" href="../css/tab.webfx.css" disabled="disabled" />
        <link id="winclassic-tab-style-sheet" type="text/css" rel="stylesheet" href="../css/tab.winclassic.css"  disabled="disabled" />
        <script type="text/javascript" src="../js/tabpane.js"></script>
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <title>Details for <?php echo $first_name . ' ' . $second_name . ' ' . $last_name; ?></title>
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
            //<![CDATA[
            function setLinkSrc(sStyle) {
                document.getElementById("luna-tab-style-sheet").disabled = sStyle != "luna";
                document.getElementById("webfx-tab-style-sheet").disabled = sStyle != "webfx"
                document.getElementById("winclassic-tab-style-sheet").disabled = sStyle != "winclassic"

                document.documentElement.style.background =
                        document.body.style.background = sStyle == "webfx" ? "white" : "ThreeDFace";
            }

            setLinkSrc("luna");

            //]]>
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
                                    <a href="users.php">View Users</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            Households Page
                            <ul>
                                <li>
                                    <a href="new-client.php">New Household</a>
                                </li>
                                <li>
                                    <a href="clients.php">View Household</a>
                                </li>
                                <li>
                                    <a href="Map.php">Household Map</a>
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
                    <div id="header">
                        Details of <?php echo $first_name . ' ' . $second_name . ' ' . $last_name ?>
                    </div>
                    <div id="tooplate_contentusers" >
                        <div style="float: top">
                            <a href="../model/Profile.php?mobile=<?php echo $mobile ?>" target="_blank"><img src="../images/pdf.png"></a>
                            <a href="../model/Profile.php?mobile=<?php echo $mobile ?>" target="_blank">Download Profile</a>
                        </div>
                        <div class="tab-pane" id="tabPane1">
                            <script type="text/javascript">
                                tp1 = new WebFXTabPane(document.getElementById("tabPane1"));
                            </script>
                            <div class="tab-page" id="tabPage1">
                                <h2 class="tab" >General Info</h2>
                                <script type="text/javascript">tp1.addTabPage(document.getElementById("tabPage1"));</script>
                                <table border='0' cellspacing='5' cellpadding='5' align='center' width='600'>
                                    <tbody>
                                        <tr>
                                            <td bgcolor='#F0F8FF'>
                                                <strong>Basic Information</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                    <p1>First Name</p1>
                                    <br>
                                    <input type='text' name='first_name' value='<?php echo $first_name ?>' size='50' class='heighttext' />
                                    </td>                            

                                    <td>
                                    <p1>Second Name</p1>
                                    <br>
                                    <input type='text' name='second_name' value='<?php echo $second_name ?>' size='50' class='heighttext'/>
                                    </td>
                                    <td>
                                    <p1>Last Name </p1>
                                    <br>
                                    <input type='text' name='last_name' value='<?php echo $last_name ?>' size='50' class='heighttext' />

                                    </td>
                                    </tr>
                                    <tr>   
                                        <td >
                                    <p1>Gender</p1>
                                    <br>
                                    <input type='text'  name='gender' class='heighttext' value='<?php echo $gender ?>' size="50" />

                                    </td>
                                    <td>
                                    <p1>National ID/Passport No </p1><br>
                                    <input type='text' name='passport' value='<?php echo $passport ?>' size='50' class='heighttext' />

                                    </td>
                                    </tr>
                                    <tr>

                                        <td bgcolor='#F0F8FF'>
                                            <strong>Physical Location Information</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                    <p1>Country of Residence </p1>
                                    <br>
                                    <input type='text' name='country' class='heighttext' value='<?php echo $country ?>' size='50'/>

                                    </td>
                                    <td>                                  
                                    <p1>Region/Province</p1>
                                    <br>
                                    <input type='text' name='region' class='heighttext' value='<?php echo $province ?>' size='50'/>
                                    </td>
                                    <td>
                                    <p1>County</p1>
                                    <br>
                                    <input type='text' name='county' class='heighttext' value='<?php echo $county ?>' size='50'/>
                                    </td>
                                    </tr>
                                    <tr>                                  
                                        <td>
                                    <p1>District </p1>
                                    <br>
                                    <input type='text' name='district' value='<?php echo $district ?>' size='50' class='heighttext' />

                                    </td>
                                    <td>
                                    <p1>
                                        Division 
                                    </p1>
                                    <br>
                                    <input type='text' name='division' value='<?php echo $division ?>' size='50'  class='heighttext'/>
                                    </td>
                                    <td >
                                    <p1>
                                        Location 
                                    </p1>
                                    <br>
                                    <input type='text' name='location' value='<?php echo $location ?>' size='50'  class='heighttext'/>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td >
                                    <p1>
                                        Nearest Town 
                                    </p1>
                                    <br>
                                    <input type='text' name='nearest_town' value='<?php echo $nearest_town ?>' size='50'  class='heighttext'/>
                                    </td>
                                    <td >
                                    <p1>
                                        GPS Location
                                    </p1>
                                    <br>
                                    <input type='text' name='gps' value='<?php echo $gps; ?>' size='50'  class='heighttext'/>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor='#F0F8FF'>
                                            <strong>Contact Information</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                    <p1>
                                        Postal Address
                                    </p1>
                                    <br>
                                    <input type = 'text' name = 'postal_address' value = '<?php echo $postal_address ?>' size = '50' class = 'heighttext' />

                                    </td>
                                    <td>
                                    <p1>
                                        Town
                                    </p1>
                                    <br>
                                    <input type='text' name='postal_town' value='<?php echo $postal_town ?>' size='50' class='heighttext' />
                                    </td>
                                    <td>
                                    <p1>
                                        Mobile Number 
                                    </p1><br>
                                    <input type='text' name='mobile' value='<?php echo $mobile ?>' size='50' class='heighttext'/>
                                    </td>                                   
                                    </tr>
                                    <tr>
                                        <td>
                                    <p1>
                                        Email Address
                                    </p1><br>
                                    <input type='text' name='email' value='<?php echo $email ?>' size='50' class='heighttext'/>
                                    </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-page" id="tabPage2" >
                                <h2 class="tab">Household Info</h2>

                                <script type="text/javascript">tp1.addTabPage(document.getElementById("tabPage2"));</script>
                                <table border="0" cellspacing="5" cellpadding="5" align="center" width="600">
                                    <tr>
                                        <td bgcolor="#F0F8FF">
                                    <p1 style="font-size: 18px"><strong>Household Information</strong></p1>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>
                                    <p1>Marital Status <span class="error">*</span></p1>
                                    <br>
                                    <select name="marital_status" class="heighttext" value="<?php echo $marital_status ?>" >
                                        <option selected="<?php echo $marital_status ?>"><?php echo $marital_status ?></option>
                                        <option value="">--Select--</option>
                                        <option>Single</option>
                                        <option>Married</option>
                                        <option>Divorced</option>
                                        <option>Widowed</option>
                                    </select>
                                    </td>
                                    <td>
                                    <p1>Household Head <span class="error">*</span></p1>
                                    <br>
                                    <input type="text" name="household_head" value="<?php echo $household_head ?>" size="50" class="heighttext"/>
                                    </td>
                                    <td>
                                    <p1>Size of Family <span class="error">*</span></p1><br>
                                    <input type="text" name="family_size" value="<?php echo $family_size ?>" size="50" class="heighttext"/>
                                    </td>

                                    </tr>
                                    <tr>                                           
                                        <td valign="top">
                                    <p1>Number of Rooms <span class="error">*</span></p1>
                                    <br>
                                    <input type="text" name="rooms" value="<?php echo $rooms ?>" size="50" class="heighttext"/>
                                    </td>
                                    <td valign="top">
                                    <p1>Household Category <span class="error">*</span></p1>
                                    <br>
                                    <br>
                                    <label><p1>Rural </p1></label><input type="radio" name="household_category" value="rural" <?php if (isset($household_category) && $household_category == 'rural') echo 'checked'; ?> />
                                    <label><p1>Urban </p1></label><input type="radio" name="household_category" value="urban" <?php if (isset($household_category) && $household_category == 'urban') echo 'checked'; ?>/>
                                    <label><p1>Peri - Urban </p1></label><input type="radio" name="household_category" value="peri-urban" <?php if (isset($household_category) && $household_category == 'peri-urban') echo 'checked'; ?>/>

                                    </td>
                                    <td>
                                    <p1>Materials used for building <span class="error">*</span></p1><br>
                                    <textarea name="building_materials" rows="5" cols="30"><?php echo $building_materials; ?></textarea>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>
                                    <p1>Sources of Livelihood/Income <span class="error">*</span></p1><br>
                                    <textarea name="income_sources" rows="5" cols="30" ><?php echo $income_sources; ?></textarea>
                                    </td>
                                    <td valign="top">
                                    <p1>Main Source of Livelihood/Income <span class="error">*</span></p1><br>
                                    <input type="text" name="main_income_source" value="<?php echo $main_income_source; ?>" size="50" class="heighttext" />

                                    </td>
                                    <td>

                                    </td>
                                    </tr>
                                    <tr>
                                        <td>
                                    <p1><u>Monthly Income (Ksh)</u><span class="error">*</span></p1><br>
                                    <label>Below 5000 </label> <input type="radio" name="monthly_income" value="below 5000" <?php if (isset($monthly_income) && $monthly_income == 'below 5000') echo 'checked'; ?> />
                                    <label>5000-20000 </label> <input type="radio" name="monthly_income" value="5000-20000" <?php if (isset($monthly_income) && $monthly_income == '5000-20000') echo 'checked'; ?>/><br>
                                    <label>21000-50000</label> <input type="radio" name="monthly_income" value="21000-50000" <?php if (isset($monthly_income) && $monthly_income == '21000-50000') echo 'checked'; ?>/>
                                    <label>51000-100000</label> <input type="radio" name="monthly_income" value="51000-100000" <?php if (isset($monthly_income) && $monthly_income == '51000-100000') echo 'checked'; ?>/><br>
                                    <label>101000-300000</label> <input type="radio" name="monthly_income" value="101000-300000" <?php if (isset($monthly_income) && $monthly_income == '101000-300000') echo 'checked'; ?>/>
                                    <label>Above 300000</label> <input type="radio" name="monthly_income" value="Above 300000" <?php if (isset($monthly_income) && $monthly_income == 'Above 300000') echo 'checked'; ?>/>

                                    </td>
                                    </tr>
                                </table>

                            </div>
                            <div class="tab-page" id="tabPage3">
                                <h2 class="tab">Energy System & Use Info</h2>

                                <script type="text/javascript">tp1.addTabPage(document.getElementById("tabPage3"));</script>
                                <table border="0" cellspacing="5" cellpadding="5" >
                                    <tr>
                                        <td bgcolor="#F0F8FF">
                                    <p1 style="font-size: 18px"><strong>Energy Access Information</strong></p1>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>
                                    <p1>Yes </p1> <input type="radio" name="connect_grid" value="Yes" <?php if (isset($connect_grid) && $connect_grid == 'Yes') echo 'checked'; ?> />
                                    <p1> No </p1><input type="radio" name="connect_grid" value="No" <?php if (isset($connect_grid) && $connect_grid == 'No') echo 'checked'; ?>/>
                                    </td>
                                    <td>
                                    <p1>
                                        Distance from main grid to house (Metres
                                    </p1><br>
                                    <input type="text"  value="<?php echo $distance; ?>" size="50" class="heighttext"/>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td valign="top">
                                    <p1><strong>Energy Sources Used </strong></p1><br><br>
                                    <textarea  rows="15" cols="40"><?php echo $energy; ?></textarea>
                                    </td>
                                    <td>
                                    <p1><strong>Frequency of Use in Cooking </strong></p1><br><br>
                                    <table border="1" class="table_s0" cellpadding="2" >
                                        <tr>
                                            <th><p1><strong>FUEL</strong></p1></th>
                                        <td><p1><strong>RANK</strong></p1></td>
                                        </tr>
                                        <tr>
                                            <th>
                                        <p1>Wood Fuel </p1></th><td> <label>1 </label><input type="radio" name="frequency-wood" value="1" /><label>2 </label><input type="radio" name="frequency-wood" value="2" /><label>3 </label><input type="radio" name="frequency-wood" value="3" /><label>4 </label><input type="radio" name="frequency-wood" value="4" /><label>5 </label><input type="radio" name="frequency-wood" value="5" /></td>
                                        </tr>
                                        <tr>
                                            <th>
                                        <p1>Charcoal</p1>
                                        </th>
                                        <td>
                                            <label>1 </label><input type="radio" name="frequency-charcoal" value="1" /><label>2 </label><input type="radio" name="frequency-charcoal" value="2" /><label>3 </label><input type="radio" name="frequency-charcoal" value="3" /><label>4 </label><input type="radio" name="frequency-charcoal" value="4" /><label>5 </label><input type="radio" name="frequency-charcoal" value="5" />
                                        </td>
                                        </td>
                                        </tr>
                                        <tr>
                                            <th>
                                        <p1>LPG </p1></th><td> <label>1 </label><input type="radio" name="frequency-LPG" value="1" /><label>2 </label><input type="radio" name="frequency-LPG" value="2" /><label>3 </label><input type="radio" name="frequency-LPG" value="3" /><label>4 </label><input type="radio" name="frequency-LPG" value="4" /><label>5 </label><input type="radio" name="frequency-LPG" value="5" /></td>
                                        </tr>
                                        <tr>
                                            <th>
                                        <p1>Stalks</p1>
                                        </th>
                                        <td>
                                            <label>1 </label><input type="radio" name="frequency-stalks" value="1" /><label>2 </label><input type="radio" name="frequency-stalks" value="2" /><label>3 </label><input type="radio" name="frequency-stalks" value="3" /><label>4 </label><input type="radio" name="frequency-stalks" value="4" /><label>5 </label><input type="radio" name="frequency-stalks" value="5" />
                                        </td>
                                        </td>
                                        </tr>
                                        <tr>
                                            <th>
                                        <p1>Cobs </p1></th><td> <label>1 </label><input type="radio" name="frequency-cobs" value="1" /><label>2 </label><input type="radio" name="frequency-cobs" value="2" /><label>3 </label><input type="radio" name="frequency-cobs" value="3" /><label>4 </label><input type="radio" name="frequency-cobs" value="4" /><label>5 </label><input type="radio" name="frequency-cobs" value="5" /></td>
                                        </tr>
                                        <tr>
                                            <th>
                                        <p1>Saw Dust</p1>
                                        </th>
                                        <td>
                                            <label>1 </label><input type="radio" name="frequency-saw-dust" value="1" /><label>2 </label><input type="radio" name="frequency-saw-dust" value="2" /><label>3 </label><input type="radio" name="frequency-saw-dust" value="3" /><label>4 </label><input type="radio" name="frequency-saw-dust" value="4" /><label>5 </label><input type="radio" name="frequency-saw-dust" value="5" />
                                        </td>
                                        </td>
                                        </tr>
                                        <tr>
                                            <th>
                                        <p1>Dung </p1></th><td> <label>1 </label><input type="radio" name="frequency-dung" value="1" /><label>2 </label><input type="radio" name="ffrequency-dung" value="2" /><label>3 </label><input type="radio" name="frequency-dung" value="3" /><label>4 </label><input type="radio" name="frequency-dung" value="4" /><label>5 </label><input type="radio" name="frequency-dung" value="5" /></td>
                                        </tr>
                                        <tr>
                                            <th>
                                        <p1>Electricity</p1>
                                        </th>
                                        <td>
                                            <label>1 </label><input type="radio" name="frequency-electricity" value="1" /><label>2 </label><input type="radio" name="frequency-electricity" value="2" /><label>3 </label><input type="radio" name="frequency-electricity" value="3" /><label>4 </label><input type="radio" name="frequency-electricity" value="4" /><label>5 </label><input type="radio" name="frequency-electricity" value="5" />
                                        </td>
                                        </td>
                                        </tr>
                                        <tr>
                                            <th>
                                        <p1>Others</p1>
                                        </th>
                                        <td>
                                            <label>1 </label><input type="radio" name="frequency-others" value="1" /><label>2 </label><input type="radio" name="frequency-others" value="2" /><label>3 </label><input type="radio" name="frequency-others" value="3" /><label>4 </label><input type="radio" name="frequency-others" value="4" /><label>5 </label><input type="radio" name="frequency-others" value="5" />
                                        </td>
                                        </td>
                                        </tr>
                                    </table>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td >
                                    <p1><strong>Methods of Cooking used </strong></p1><br><br>
                                    <textarea name="cooking_methods" rows="10" cols="40"><?php echo $cooking_methods; ?></textarea>
                                    </td>
                                    <td valign="top">
                                    <p1><strong>Cooking Frequency </strong></p1><br>
                                    <select name="cooking_frequency" class="heighttext">
                                        <option selected="<?php echo $cooking_frequency; ?>"><?php echo $cooking_frequency; ?></option>
                                        <option value="">--Select--</option>
                                        <option value="Once">Once</option>
                                        <option value="Twice">Twice</option>
                                        <option value="Thrice">Thrice</option>
                                        <option value="Four Times">Four Times</option>
                                        <option value="Five Times">Five Times</option>
                                    </select>
                                    </td>
                                    <td valign="top">
                                    <p1><strong>Cooking Type </strong></p1><br>
                                    <select name="cooking_type" class="heighttext">
                                        <option selected="<?php echo $cooking_type; ?>"><?php echo $cooking_type; ?></option>
                                        <option value="">--Select--</option>
                                        <option value="Communal">Communal</option>
                                        <option value="Individual">Individual</option>
                                    </select>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>
                                    <p1><strong>Lighting Methods </strong></p1><br>
                                    <textarea name="lighting_methods" rows="7" cols="40"><?php echo $lighting_methods; ?></textarea>

                                    </td>
                                    <td valign="top">
                                    <p1><strong>Lighting Duration per Day </strong></p1><br>
                                    <select name="lighting_duration" class="heighttext">
                                        <option selected="<?php echo $lighting_duration; ?>"><?php echo $lighting_duration; ?></option>
                                        <option value="">--Select--</option>
                                        <option value="1 Hour">1 Hour</option>
                                        <option value="2 Hours">2 Hours</option>
                                        <option value="3 Hours">3 Hours</option>
                                        <option value="4 Hours">4 Hours</option>
                                        <option value="5 Hours">5 Hours</option>
                                        <option value="6 Hours">6 Hours</option>
                                        <option value="7 Hours">7 Hours</option>
                                        <option value="8 Hours">8 Hours</option>
                                        <option value="9 Hours">9 Hours</option>
                                        <option value="10 Hours">10 Hours</option>
                                        <option value="11 Hours">11 Hours</option>
                                        <option value="12 Hours">12 Hours</option>
                                    </select>
                                    </td>
                                    <td valign="top">
                                    <p1><strong>Number of lit Rooms</strong></p1><br>
                                    <input type="text" name="rooms_lit" value="<?php echo $rooms_lit; ?>" size="50" class="heighttext" />

                                    </td>
                                    </tr>

                                </table>
                            </div>

                            <div class="tab-page" id="tabPage4">
                                <h2 class="tab">Energy Data</h2>

                                <script type="text/javascript">tp1.addTabPage(document.getElementById("tabPage4"));</script>
                                <div style="overflow-y: scroll; height:500px;">
                                    <?php
                                require_once '../model/Messages.php';
                                $model = new Messages();
                                $model->getClientEnergyUsage($mobile);
                                ?>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div id="tooplate_footer">    
                Copyright © 2015 <a href="http://www.eedadvisory.com" target="_blank">EED Advisory Limited </a> | Designed for Household Energy Data Aggregator (HEDA).
            </div>
        </div><!-- End of Wrapper-->
        <script type="text/javascript">
            setupAllTabs();
        </script>
    </body>
</html>
