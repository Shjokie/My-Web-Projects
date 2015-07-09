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
include '../model/ClientModel.php';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$model = new ClientModel();
$error = "";
$id = $first_name = $second_name = $last_name = $gender = $passport = $country = $region = $province = $county = $district = $division = $location = $nearest_town = $postal_address = $postal_town = $mobile = $email = $marital_status = $family_size = $rooms = $connected = $distance = $energy_source = $gps = $household_head = $household_category = $building_materials = $income_sources = $main_income_source = $monthly_income = $cooking_methods = $cooking_frequency = $cooking_type = $lighting_methods = $lighting_duration = $rooms_lit = "";
$first_nameErr = $second_nameErr = $last_nameErr = $genderErr = $passportErr = $countryErr = $regionErr = $provinceErr = $countyErr = $districtErr = $divisionErr = $locationErr = $nearest_townErr = $postal_addressErr = $postal_townErr = $mobileErr = $emailErr = $marital_statusErr = $family_sizeErr = $roomsErr = $connectedErr = $distanceErr = $energy_sourceErr = $gpsErr = $household_headErr = $household_categoryErr = $building_materialsErr = $income_sourcesErr = $main_income_sourceErr = $monthly_incomeErr = $cooking_methodsErr = $cooking_frequencyErr = $cooking_typeErr = $lighting_methodsErr = $lighting_durationErr = $rooms_litErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit-client'])) {
        $id = $_POST['id'];
        $first_name = test_input($_POST["first_name"]);
        $second_name = test_input($_POST["second_name"]);
        $last_name = test_input($_POST['last_name']);
        $gender = $_POST['gender'];
        $passport = $_POST['passport'];
        $country = $_POST['country'];
        $province = $_POST['region'];
        $county = $_POST['county'];
        $district = $_POST["district"];
        $division = $_POST["division"];
        $location = $_POST["location"];
        $nearest_town = $_POST["nearest_town"];
        $postal_address = $_POST['postal_address'];
        $postal_town = $_POST['postal_town'];
        $mobile = $_POST["mobile"];
        $email = $_POST["email"];
        $marital_status = $_POST['marital_status'];
        $family_size = $_POST["family_size"];
        $rooms = $_POST["rooms"];
        $connected = $_POST['connected'];
        $distance = $_POST['distance'];
        $energy_source = $_POST['fuel'];
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
    } else if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        if (empty($_POST["first_name"])) {
            $first_nameErr = "First name is Required !";
        } else {
            $first_name = test_input($_POST["first_name"]);
// check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
                $first_nameErr = "Only letters and white space Allowed !";
            }
        }

        if (empty($_POST["second_name"])) {
            $second_nameErr = "Second name is Required !";
        } else {
            $second_name = test_input($_POST["second_name"]);
// check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $second_name)) {
                $second_nameErr = "Only letters and white space Allowed !";
            }
        }
        if (!empty($_POST['last_name'])) {
            $last_name = test_input($_POST['last_name']);
            if (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
                $last_nameErr = "Only letters and white space Allowed !";
            }
        }

        $gender = $_POST['gender'];
        if (empty($gender)) {
            $genderErr = "Gender is Required !";
        }
        $passport = $_POST['passport'];
        if (empty($passport)) {
            $passportErr = "National ID/Passport No is Required !";
        }
        $country = $_POST['country'];
        if (empty($country)) {
            $countryErr = "Country is Required !";
        }

        $province = $_POST['region'];
        if (empty($province)) {
            $provinceErr = "Province is Required !";
        }
        $county = $_POST['county'];
        if (empty($county)) {
            $countyErr = "County is Required !";
        }

        if (empty($_POST["district"])) {
            $districtErr = "District is required !";
        } else {
            $district = test_input($_POST["district"]);
// check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $district)) {
                $districtErr = "Only letters and white space Allowed !";
            }
        }

        if (empty($_POST["division"])) {
            $divisionErr = "Division is required !";
        } else {
            $division = test_input($_POST["division"]);
// check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $division)) {
                $divisionErr = "Only letters and white space Allowed !";
            }
        }

        if (empty($_POST["location"])) {
            $locationErr = "Location is required !";
        } else {
            $location = test_input($_POST["location"]);
// check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $location)) {
                $locationErr = "Only letters and white space Allowed ";
            }
        }

        if (empty($_POST["nearest_town"])) {
            $nearest_townErr = "Nearest Town is required !";
        } else {
            $nearest_town = test_input($_POST["nearest_town"]);
// check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $nearest_town)) {
                $nearest_townErr = "Only letters and white space allowed !";
            }
        }

        if (empty($_POST["gps"])) {
            $gpsErr = "GPS Location is required !";
        } else {
            $gps = test_input($_POST["gps"]);
        }

        $postal_address = test_input($_POST['postal_address']);

        if (!empty($_POST['postal_town'])) {
            $postal_town = test_input($_POST['postal_town']);
            if (!preg_match("/^[a-zA-Z ]*$/", $postal_town)) {
                $postal_townErr = "Only letters and white space Allowed !";
            }
        }

        if (empty($_POST["mobile"])) {
            $mobileErr = "Mobile Number is required !";
        } else {
            $mobile = test_input($_POST["mobile"]);
// check if name only contains letters and whitespace
            if (!preg_match("/^[0-9]*$/", $mobile)) {
                $mobileErr = "Only Numbers allowed !";
            }
        }
        if (empty($_POST["email"])) {
            $email = "";
        } else {
            $email = test_input($_POST["email"]);
// check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format !";
            }
        }

        $marital_status = $_POST['marital_status'];
        if (empty($marital_status)) {
            $marital_statusErr = "Marital Status is Required !";
        }

        if (empty($_POST["family_size"])) {
            $family_sizeErr = "Number of Family members is required !";
        } else {
            $family_size = test_input($_POST["family_size"]);
// check if name only contains letters and whitespace
            if (!preg_match("/^[0-9]*$/", $family_size)) {
                $family_sizeErr = "Only Numbers Allowed ! ";
            }
        }
        if (empty($_POST["rooms"])) {
            $roomsErr = "Number of Rooms is Required !";
        } else {
            $rooms = test_input($_POST["rooms"]);
// check if name only contains letters and whitespace
            if (!preg_match("/^[0-9]*$/", $rooms)) {
                $roomsErr = "Only Numbers Allowed !";
            }
        }
        $connected = $_POST['connected'];

        if (empty($_POST["distance"])) {
            $distanceErr = "Distance from Grid is Required !";
        } else {
            $distance = test_input($_POST["distance"]);
// check if name only contains letters and whitespace
            if (!preg_match("/^[0-9]*$/", $distance)) {
                $distanceErr = "Only Numbers Allowed !";
            }
        }
        if (empty($_POST["energy_source"])) {
            $energy_sourceErr = "Energy Source is Required !";
        } else {
            $energy_source = test_input($_POST["energy_source"]);
        }

        if (empty($_POST["household_head"])) {
            $household_headErr = "Household Head is Required !";
        } else {
            $household_head = test_input($_POST["household_head"]);
// check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $household_head)) {
                $household_headErr = "Only letters and white space Allowed !";
            }
        }

        if (empty($_POST["household_category"])) {
            $household_categoryErr = "Household Category is Required !";
        } else {
            $household_category = test_input($_POST["household_category"]);
        }

        if (empty($_POST["building_materials"])) {
            $building_materialsErr = "Building Materials is Required !";
        } else {
            $building_materials = test_input($_POST["building_materials"]);
        }

        if (empty($_POST["income_sources"])) {
            $income_sourcesErr = "Sources of Income is Required !";
        } else {
            $income_sources = test_input($_POST["income_sources"]);
        }

        if (empty($_POST["main_income_source"])) {
            $main_income_sourceErr = "Main Income Source is Required !";
        } else {
            $main_income_source = test_input($_POST["main_income_source"]);
        }

        if (empty($_POST["monthly_income"])) {
            $monthly_incomeErr = "Monthly Income is Required !";
        } else {
            $monthly_income = test_input($_POST["monthly_income"]);
        }

        if (empty($_POST["cooking_methods"])) {
            $cooking_methodsErr = "Cooking method is Required !";
        } else {
            $cooking_methods = test_input($_POST["cooking_methods"]);
        }
        if (empty($_POST["cooking_frequency"])) {
            $cooking_frequencyErr = "Cooking Frequency is Required !";
        } else {
            $cooking_frequency = test_input($_POST["cooking_frequency"]);
        }

        if (empty($_POST["cooking_type"])) {
            $cooking_typeErr = "Cooking Type is Required !";
        } else {
            $cooking_type = test_input($_POST["cooking_type"]);
        }

        if (empty($_POST["lighting_methods"])) {
            $lighting_methodsErr = "Lighting method is Required !";
        } else {
            $lighting_methods = test_input($_POST["lighting_methods"]);
        }

        if (empty($_POST["lighting_duration"])) {
            $lighting_durationErr = "Lighting Duration is Required !";
        } else {
            $lighting_duration = test_input($_POST["lighting_duration"]);
        }

        if (empty($_POST["rooms_lit"])) {
            $rooms_litErr = "Number of lit rooms is Required !";
        } else {
            $rooms_lit = test_input($_POST["rooms_lit"]);
        }
        
        if (!empty($first_name) && (!empty($second_name) || !empty($last_name)) && !empty($gender) && !empty($passport) && !empty($country) && !empty($province) && !empty($district) && !empty($county) && !empty($division) && !empty($location) && !empty($gender) && !empty($nearest_town) && !empty($gps) && !empty($mobile) && !empty($marital_status) && !empty($family_size) && !empty($rooms) && !empty($connected) && !empty($distance) && !empty($energy_source) && !empty($cooking_methods) && !empty($cooking_frequency) && !empty($cooking_type) && !empty($lighting_methods) && !empty($lighting_duration) && !empty($rooms_lit) && !empty($household_head) && !empty($household_category) && !empty($building_materials) && !empty($income_sources) && !empty($main_income_source) && !empty($monthly_income)) {
            if (($model->editClient($id, $first_name, $second_name, $last_name, $gender, $passport, $country, $province, $county, $district, $division, $location, $nearest_town, $gps, $postal_address, $postal_town, $mobile, $email, $marital_status, $household_head, $household_category, $building_materials, $income_sources, $main_income_source, $monthly_income, $family_size, $rooms, $connected, $distance, $energy_source, $cooking_methods, $cooking_frequency, $cooking_type, $lighting_methods, $lighting_duration, $rooms_lit)) > 0) {
                header("location: clients.php");
            } else {
                $error = "Updating Client Details Failed !";
            }
        } else {
            $error = "You did not fill all the required fields !";
        }
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="../local/webfxlayout.js"></script>
        <link id="luna-tab-style-sheet" type="text/css" rel="stylesheet" href="../css/luna/tab.css" disabled="disabled" />
        <link id="webfx-tab-style-sheet" type="text/css" rel="stylesheet" href="../css/tab.webfx.css" disabled="disabled" />
        <link id="winclassic-tab-style-sheet" type="text/css" rel="stylesheet" href="../css/tab.winclassic.css"  disabled="disabled" />
        <script type="text/javascript" src="../js/tabpane.js"></script>
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <title>Client Details Edit</title>
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
        <script>
            function selectCounty() {
                var select = document.getElementById('county');
                document.getElementById('county').options.length = 0;
                var itemSelected = province.value;
                if (itemSelected == "Nyanza") {
                    var city = ["Kisumu", "Homa Bay", "Kisii", "Nyamira", "Migori", "Siaya"];
                    for (var i = 0; i < city.length; i++) {
                        var option = document.createElement("option");
                        option.text = city[i];
                        select.add(option, i);
                    }

                } else if (itemSelected == "Nairobi") {
                    var city = ["Nairobi"];
                    for (var i = 0; i < city.length; i++) {
                        var option = document.createElement("option");
                        option.text = city[i];
                        select.add(option, i);
                    }
                } else if (itemSelected == "Coast") {
                    var city = ["Lamu", "Mombasa", "Taita Taveta", "Kwale", "Kilifi", "Tana River"];
                    for (var i = 0; i < city.length; i++) {
                        var option = document.createElement("option");
                        option.text = city[i];
                        select.add(option, i);
                    }
                } else if (itemSelected == "Central") {
                    var city = ["Nyandarua", "Nyeri", "Kirinyaga", "Murang'a", "Kiambu"];
                    for (var i = 0; i < city.length; i++) {
                        var option = document.createElement("option");
                        option.text = city[i];
                        select.add(option, i);
                    }
                } else if (itemSelected == "Eastern") {
                    var city = ["Marsabit", "Isiolo", "Meru", "Tharaka Nithi", "Embu", "Kitui", "Machakos", "Makueni"];
                    for (var i = 0; i < city.length; i++) {
                        var option = document.createElement("option");
                        option.text = city[i];
                        select.add(option, i);
                    }
                } else if (itemSelected == "Western") {
                    var city = ["Kakamega", "Vihiga", "Bungoma", "Busia"];
                    for (var i = 0; i < city.length; i++) {
                        var option = document.createElement("option");
                        option.text = city[i];
                        select.add(option, i);
                    }
                } else if (itemSelected == "North Eastern") {
                    var city = ["Garissa", "Wajir", "Mandera"];
                    for (var i = 0; i < city.length; i++) {
                        var option = document.createElement("option");
                        option.text = city[i];
                        select.add(option, i);
                    }
                } else if (itemSelected == "Rift Valley") {
                    var city = ["Uasin Gishu", "Turkana", "West Pokot", "Samburu", "Trans Nzoia", "Nandi", "Elgeyo Marakwet", "Baringo", "Laikipia", "Nakuru", "Narok", "Kajiado", "Kericho", "Bomet"];
                    for (var i = 0; i < city.length; i++) {
                        var option = document.createElement("option");
                        option.text = city[i];
                        select.add(option, i);
                    }
                }
                else {
                    var option = document.createElement("option");
                    option.text = "Empty";
                    select.add(option, 0);


                }
            }
            function checkForChange() {

                var itemSelected = selectCountry.value;
                document.getElementById('province').options.length = 0;
                var select = document.getElementById('province');
                if (itemSelected == "kenya") {

                    var city = ["Nairobi", "Nyanza", "Coast", "Rift Valley", "Western", "Central", "Eastern", "North Eastern"];
                    for (var i = 0; i < city.length; i++) {
                        var option = document.createElement("option");
                        option.text = city[i];
                        option.value = city[i];
                        select.add(option, i + 1);

                    }

                } else {
                    var option = document.createElement("option");
                    for (var i = 0; i < select.length; i++) {
                        select.remove(select[i]);
                    }
                    option.text = "Empty";
                    select.add(option, 0);


                }
            }
        </script>
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
    <body onLoad="hideMe()">
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
                        <c1>Client Page</c1>
                        <ul>
                            <li>
                                <a href="new-client.php">New Client</a>
                            </li>
                            <li>
                                <a href="clients.php"><c1>View Clients</c1></a>
                            </li>
                            <li>
                                <a href="Map.php">Clients Map</a>
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
                        Edit Details of Client and click "SAVE" button. Mandatory Fields are marked <span class="error">*</span>
                    </div>
                    <div id="tooplate_contentusers" >
                        <form name="form2" action="edit-client.php" method="POST" width="500">
                            <div class="tab-pane" id="tabPane1">
                                <script type="text/javascript">
                                    tp1 = new WebFXTabPane(document.getElementById("tabPane1"));
                                </script>
                                <div class="tab-page" id="tabPage1">
                                    <h2 class="tab" >General Info</h2>
                                    <script type="text/javascript">tp1.addTabPage(document.getElementById("tabPage1"));</script>
                                    <table border="0" cellspacing="5" cellpadding="5" align="center" width="600">
                                        <tr>
                                            <td bgcolor="#F0F8FF">
                                        <p1 style="font-size: 18px"><strong>Basic Information</strong></p1>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                        <p1>First Name <span class="error">*</span></p1>
                                        <br>
                                        <input type="text" name="first_name" value="<?php echo $first_name ?>" size="50" class="heighttext" />
                                        <br><span class="error"> <?php echo $first_nameErr; ?></span>
                                        </td>                            

                                        <td>
                                        <p1>Second Name <span class="error">*</span></p1>
                                        <br>
                                        <input type="text" name="second_name" value="<?php echo $second_name ?>" size="50" class="heighttext"/>
                                        <br><span class="error"> <?php echo $second_nameErr; ?></span>
                                        </td>
                                        <td>
                                        <p1>Last Name </p1>
                                        <br>
                                        <input type="text" name="last_name" value="<?php echo $last_name ?>" size="50" class="heighttext" />
                                        <br><span class="error"> <?php echo $last_nameErr; ?></span>
                                        </td>
                                        </tr>
                                        <tr>

                                            <td >
                                        <p1>Gender <span class="error">*</span></p1>
                                        <br>
                                        <select name="gender" class="heighttext" value="<?php echo $gender ?>" >
                                            <option selected="<?php echo $gender ?>"><?php echo $gender ?></option>
                                            <option value="">--Select--</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <br><span class="error"> <?php echo $genderErr; ?></span>
                                        </td>
                                        <td>
                                        <p1>National ID/Passport No <span class="error">*</span></p1><br>
                                        <input type="text" name="passport" value="<?php echo $passport ?>" size="50" class="heighttext" />
                                        <br><span class="error"> <?php echo $passportErr; ?></span>
                                        </td>
                                        </tr>

                                        <tr>

                                            <td bgcolor="#F0F8FF">
                                        <p1 style="font-size: 16px"><strong>Physical Location Information</strong></p1>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                        <p1>Country of Residence <span class="error">*</span></p1>
                                        <br>
                                        <select name="country" class="heighttext" id="selectCountry" onChange="checkForChange()" value="<?php echo $country ?>" >
                                            <option selected="<?php echo $country ?>"><?php echo $country ?></option>
                                            <option value="">--Select--</option>
                                            <option value="kenya">Kenya</option>
                                            <option value="uganda">Uganda</option>
                                            <option value="tanzania">Tanzania</option>
                                            <option value="rwanda">Rwanda</option>
                                            <option value="burundi">Burundi</option>
                                            <option value="south sudan">South Sudan</option>
                                        </select>
                                        <br><span class="error"> <?php echo $countryErr; ?></span>
                                        </td>
                                        <td>                                  
                                        <p1>Region/Province <span class="error">*</span></p1>
                                        <br>
                                        <select name="region" value="<?php echo $province ?>"  class="heighttext" id="province" onchange="selectCounty()" >
                                            <option selected="<?php echo $province ?>"><?php echo $province ?></option>
                                            <option>--Select--</option>
                                        </select>
                                        <br><span class="error"> <?php echo $provinceErr; ?></span>

                                        </td>
                                        <td>
                                        <p1>County <span class="error">*</span></p1>
                                        <br>
                                        <select name="county" value="<?php echo $county; ?>" class="heighttext" id="county"  >
                                            <option selected="<?php echo $county ?>"><?php echo $county ?></option>
                                            <option value="">--Select--</option>
                                        </select>
                                        <br><span class="error"> <?php echo $countyErr; ?></span>

                                        </td>
                                        </tr>
                                        <tr>                                           

                                            <td>
                                        <p1>District <span class="error">*</span></p1>
                                        <br>
                                        <input type="text" name="district" value="<?php echo $district ?>" size="50" class="heighttext"/>
                                        <br><span class="error"> <?php echo $districtErr; ?></span>
                                        </td>
                                        <td>
                                        <p1>
                                            Division <span class="error">*</span>
                                        </p1>
                                        <br>
                                        <input type="text" name="division" value="<?php echo $division ?>" size="50"  class="heighttext"/>
                                        <br><span class="error"> <?php echo $divisionErr; ?></span>
                                        </td>

                                        <td >
                                        <p1>
                                            Location <span class="error">*</span>
                                        </p1>
                                        <br>
                                        <input type="text" name="location" value="<?php echo $location ?>" size="50"  class="heighttext"/>
                                        <br><span class="error"> <?php echo $locationErr; ?></span>
                                        </td>
                                        </tr>

                                        <tr>
                                            <td >
                                        <p1>
                                            Nearest Town <span class="error">*</span>
                                        </p1>
                                        <br>
                                        <input type="text" name="nearest_town" value="<?php echo $nearest_town ?>" size="50"  class="heighttext"/>
                                        <br><span class="error"> <?php echo $nearest_townErr; ?></span>
                                        </td>
                                        <td >
                                        <p1>
                                            GPS Location <span class="error">*</span>
                                        </p1>
                                        <br>
                                        <input type="text" name="gps" value="<?php echo $gps ?>" size="50"  class="heighttext"/>
                                        <br><span class="error"> <?php echo $gpsErr; ?></span>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#F0F8FF">
                                        <p1 style="font-size: 18px"><strong>Contact Information</strong></p1>
                                        </td> 
                                        </tr>
                                        <tr>
                                            <td valign="top">
                                        <p1>
                                            Postal Address
                                        </p1>
                                        <br>
                                        <input type="text" name="postal_address" value="<?php echo $postal_address ?>" size="50" class="heighttext" />
                                        <br><span class="error"> <?php echo $postal_addressErr; ?></span>
                                        </td>
                                        <td valign="top">
                                        <p1>
                                            Town
                                        </p1>
                                        <br>
                                        <input type="text" name="postal_town" value="<?php echo $postal_town ?>" size="50" class="heighttext" />
                                        <br><span class="error"> <?php echo $postal_townErr; ?></span>
                                        </td>
                                        <td valign="top">

                                        <p1>
                                            Mobile Number <span class="error">*</span>
                                        </p1><br>
                                        <input type="text" name="mobile" value="<?php echo $mobile ?>" size="50" class="heighttext"/>
                                        <br><p style="font-size: 11px;color: black; font-family: cambria;">e.g 254714...........</p>
                                        <br><span class="error"> <?php echo $mobileErr; ?></span>
                                        </td>
                                        </tr>
                                        <tr>                                           
                                            <td>
                                        <p1>
                                            Email Address
                                        </p1><br>
                                        <input type="text" name="email" value="<?php echo $email ?>" size="50" class="heighttext"/>
                                        <br><span class="error"> <?php echo $emailErr; ?></span>
                                        </td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="tab-page" id="tabPage2" style="height: 600px; " >
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
                                        <br><span class="error"> <?php echo $marital_statusErr; ?></span>
                                        </td>
                                        <td>
                                        <p1>Household Head <span class="error">*</span></p1>
                                        <br>
                                        <input type="text" name="household_head" value="<?php echo $household_head ?>" size="50" class="heighttext"/>
                                        <br><span class="error"> <?php echo $household_headErr; ?></span>
                                        </td>
                                        <td>
                                        <p1>Size of Family <span class="error">*</span></p1><br>
                                        <input type="text" name="family_size" value="<?php echo $family_size ?>" size="50" class="heighttext"/>
                                        <br><span class="error"> <?php echo $family_sizeErr; ?></span>
                                        </td>

                                        </tr>
                                        <tr>                                           
                                            <td valign="top">
                                        <p1>Number of Rooms <span class="error">*</span></p1>
                                        <br>
                                        <input type="text" name="rooms" value="<?php echo $rooms ?>" size="50" class="heighttext"/>
                                        <br><span class="error"> <?php echo $roomsErr; ?></span>
                                        </td>
                                        <td valign="top">
                                        <p1>Household Category <span class="error">*</span></p1>
                                        <br>
                                        <br>
                                        <label><p1>Rural </p1></label><input type="radio" name="household_category" value="rural" <?php if (isset($household_category) && $household_category == 'rural') echo 'checked'; ?> />
                                        <label><p1>Urban </p1></label><input type="radio" name="household_category" value="urban" <?php if (isset($household_category) && $household_category == 'urban') echo 'checked'; ?>/>
                                        <label><p1>Peri - Urban </p1></label><input type="radio" name="household_category" value="peri-urban" <?php if (isset($household_category) && $household_category == 'peri-urban') echo 'checked'; ?>/>
                                        <br><span class="error"> <?php echo $household_categoryErr; ?></span>
                                        </td>
                                        <td>
                                        <p1>Materials used for building <span class="error">*</span></p1><br>
                                        <textarea name="building_materials" rows="5" cols="30"><?php echo $building_materials; ?></textarea>
                                        <br><span class="error"> <?php echo $building_materialsErr; ?></span>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                        <p1>Sources of Livelihood/Income <span class="error">*</span></p1><br>
                                        <textarea name="income_sources" rows="5" cols="30"><?php echo $income_sources; ?></textarea>
                                        <br><span class="error"> <?php echo $income_sourcesErr; ?></span>
                                        </td>
                                        <td valign="top">
                                        <p1>Main Source of Livelihood/Income <span class="error">*</span></p1><br>
                                        <input type="text" name="main_income_source" value="<?php echo $main_income_source; ?>" size="50" class="heighttext" />
                                        <br><span class="error"> <?php echo $main_income_sourceErr; ?></span>
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
                                        <br><span class="error"> <?php echo $monthly_incomeErr; ?></span>
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
                                        <p1>Connected to the grid ? <span class="error">*</span></p1><br>
                                        <p1>Yes <input type="radio" name="connected" value="Yes" <?php if (isset($connected) && $connected == 'Yes') echo 'checked' ?> />
                                            No </p1><input type="radio" name="connected" value="No" <?php if (isset($connected) && $connected == 'No') echo 'checked' ?>/>
                                        <br><span class="error"> <?php echo $connectedErr; ?></span>
                                        </td>
                                        <td>
                                        <p1>
                                            Distance from main grid to house (Metres) <span class="error">*</span>
                                        </p1><br>
                                        <input type="text" name="distance" value="<?php echo $distance; ?>" size="50" class="heighttext"/>
                                        <br><span class="error"> <?php echo $distanceErr; ?></span>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td valign="top">
                                        <p1><strong>Energy Sources Used <span class="error">*</span></strong></p1><br><br>
                                        <textarea name="energy_source" rows="15" cols="40"><?php echo $energy_source; ?></textarea>
                                        <br><span class="error"> <?php echo $energy_sourceErr; ?></span>
                                        </td>
                                        <td>
                                        <p1><strong>Frequency of Use in Cooking <span class="error">*</span></strong></p1><br><br>
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
                                        <p1><strong>Methods of Cooking used <span class="error">*</span></strong></p1><br><br>
                                        <textarea name="cooking_methods" rows="10" cols="40"><?php echo $cooking_methods; ?></textarea>
                                        <br><span class="error"> <?php echo $cooking_methodsErr; ?></span>
                                        </td>
                                        <td valign="top">
                                        <p1><strong>Cooking Frequency <span class="error">*</span></strong></p1><br>
                                        <select name="cooking_frequency" class="heighttext">
                                            <option selected="<?php echo $cooking_frequency; ?>"><?php echo $cooking_frequency; ?></option>
                                            <option value="">--Select--</option>
                                            <option value="Once">Once</option>
                                            <option value="Twice">Twice</option>
                                            <option value="Thrice">Thrice</option>
                                            <option value="Four Times">Four Times</option>
                                            <option value="Five Times">Five Times</option>
                                        </select>
                                        <br><span class="error"> <?php echo $cooking_frequencyErr; ?></span>
                                        </td>
                                        <td valign="top">
                                        <p1><strong>Cooking Type <span class="error">*</span></strong></p1><br>
                                        <select name="cooking_type" class="heighttext">
                                            <option selected="<?php echo $cooking_type; ?>"><?php echo $cooking_type; ?></option>
                                            <option value="">--Select--</option>
                                            <option value="Communal">Communal</option>
                                            <option value="Individual">Individual</option>
                                        </select>
                                        <br><span class="error"><?php echo $cooking_typeErr; ?></span>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                        <p1><strong>Lighting Methods <span class="error">*</span></strong></p1><br>
                                        <textarea name="lighting_methods" rows="7" cols="40"><?php echo $lighting_methods; ?></textarea>
                                        <br><span class="error"> <?php echo $lighting_methodsErr; ?></span>
                                        </td>
                                        <td valign="top">
                                        <p1><strong>Lighting Duration per Day <span class="error">*</span></strong></p1><br>
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
                                        <br><span class="error"> <?php echo $lighting_durationErr; ?></span>
                                        </td>
                                        <td valign="top">
                                        <p1><strong>Number of lit Rooms <span class="error">*</span></strong></p1><br>
                                        <input type="text" name="rooms_lit" value="<?php echo $rooms_lit; ?>" size="50" class="heighttext" />
                                        <br><span class="error"><?php echo $rooms_litErr; ?></span>
                                        </td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="tab-page" id="tabPage4" style="height: 500px; ">
                                    <h2 class="tab">Verify and Submit</h2>

                                    <script type="text/javascript">tp1.addTabPage(document.getElementById("tabPage4"));</script>
                                    <table border="0" cellspacing="5" cellpadding="5" align="center" >
                                        <tr>
                                            <td bgcolor="#F0F8FF">
                                        <p1 style="font-size: 18px"><strong>Verification and Submission</strong></p1>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <br>
                                                <br>
                                        <p1 style="font-size: 16px">Please verify that the information provided is correct and that ALL mandatory fields marked (<span class="error">*</span>) are filled before clicking "SUBMIT" button.</p1>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <br>
                                                <input type="text" name="id" value="<?php echo $id; ?>" hidden/>
                                                <br>
                                                <input type="submit" value="SUBMIT" name="submit" class="button" />
                                        <br><p1><span class="error"> <?php echo $error; ?></span></p1>
                                        </td>

                                        </tr>
                                    </table>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="tooplate_footer">    
            Copyright © 2015 <a href="http://www.eedadvisory.com" target="_blank" >EED Advisory Limited </a> | Designed for Household Energy Data Aggregator (HEDA).
        </div> 
    </div>
    <script type="text/javascript">
        setupAllTabs();
    </script>
</body>
</html>
