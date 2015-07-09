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
include '../model/SystemUsers.php';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$first_name = $middle_name = $last_name = $appointment = $email = $username = $role = "";
$first_nameErr = $middle_nameErr = $last_nameErr = $appointmentErr = $emailErr = $usernameErr = $roleErr = "";
$error = "";
$pass = "12345678";
$password = md5($pass);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = test_input($_POST['first_name']);
    $middle_name = test_input($_POST['middle_name']);
    $last_name = test_input($_POST['last_name']);
    $appointment = test_input($_POST['appointment']);
    $email = test_input($_POST['email']);
    $username = test_input($_POST['username']);
    $role = test_input($_POST['role']);
    if (empty($first_name)) {
        $first_nameErr = "First Name is Required !";
    }
    if (empty($middle_name)) {
        $middle_nameErr = "Second Name is Required !";
    }
    if (empty($appointment)) {
        $appointmentErr = "Appointment is Required !";
    }
    if (empty($email)) {
        $emailErr = "Email is Required !";
    }
    if (empty($username)) {
        $usernameErr = "User Name is Required !";
    }
    if (empty($role)) {
        $roleErr = "Role is Required !";
    }
    if (!empty($first_name) && !empty($middle_name) && !empty($appointment) && !empty($email) && !empty($username) && !empty($role)) {
        $model = new SystemUsersModel();
        if ($model->fetch($username, $email)== 0){
        if (($model->addUser($first_name, $middle_name, $last_name, $appointment, $email, $username, $password, $role) > 0)) {
            header("location : users.php");
        } else {
            $error = "Addition of new User Failed !";
        }
        }
        
        else{
            $error = "Username or email already exists";
        }
    }
}
?>
<html>
    <head>
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
            p2{
                color: #33CC33;
                font-family: Cambria;
                font-size: 14px; 
                font-weight: bold;
                //text-align: center;
            }
        </style>
        
        <meta charset="UTF-8">
        <title>New User Registration</title>
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
                <div id="tooplate_content_new_client" >
                    <p2>Fill in Details of New User. Mandatory Fields are marked <span class="error">*</span></p2>
                </div>
                <div id="tooplate_content" >

                    <form name="user-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <table border="0" cellspacing="10" cellpadding="10" align="center" width="600">
                            <tbody>
                                <tr>
                                    <td class="content" bgcolor="#F0F8FF">
                            <p1>First Name <span class="error">*</span></p1>
                            </td>
                            <td  bgcolor="#F0F8FF">
                                <input type="text" name="first_name"  placeholder="Type Here" required size="50" class="heighttext" value="<?php echo $first_name; ?>"/>
                                <br><span class="error"> <?php echo $first_nameErr; ?></span>
                            </td>
                            </tr>
                            <tr>
                                <td class="content">
                            <p1>Second Name <span class="error">*</span></p1>
                            </td>
                            <td>
                                <input type="text" name="middle_name" size="50"  placeholder="Type Here" required class="heighttext" value="<?php echo $middle_name; ?>" />
                                <br><span class="error"> <?php echo $middle_nameErr; ?></span>
                            </td>
                            </tr>
                            <tr>
                                <td class="content" bgcolor="#F0F8FF">
                            <p1>Last Name <span class="error">*</span></p1>
                            </td>
                            <td bgcolor="#F0F8FF">
                                <input type="text" name="last_name"  placeholder="Type Here" required size="50" class="heighttext" value="<?php echo $last_name; ?>" />

                            </td>
                            </tr>
                            <tr>
                                <td class="content">
                            <p1>Appointment <span class="error">*</span></p1>
                            </td>
                            <td>
                                <input type="text" name="appointment"  placeholder="Type Here" required size="50" class="heighttext" value="<?php echo $appointment; ?>"/>
                                <br><span class="error"> <?php echo $appointmentErr; ?></span>
                            </td>
                            </tr>
                            <tr>
                                <td class="content" bgcolor="#F0F8FF">
                            <p1>Email Address <span class="error">*</span></p1>
                            </td>
                            <td bgcolor="#F0F8FF">
                                <input type="text" name="email"  placeholder="Type Here" required size="50" class="heighttext" value="<?php echo $email; ?>"/>
                                <br><span class="error"> <?php echo $emailErr; ?></span>
                            </td>
                            </tr>
                            <tr>
                                <td class="content">
                            <p1>User Name <span class="error">*</span></p1>
                            </td>
                            <td >
                                <input type="text" name="username" value="" placeholder="Type Here" required size="50" class="heighttext" value="<?php echo $username; ?>" />
                                <br><span class="error"> <?php echo $usernameErr; ?></span>
                            </td>
                            </tr>
                            <tr>
                                <td class="content" bgcolor="#F0F8FF">
                            <p1>Role <span class="error">*</span></p1>
                            </td>
                            <td bgcolor="#F0F8FF">
                                <select name="role" class="heighttext" value="<?php echo $role; ?>">

                                    <option value="" >--Select--</option>
                                    <option>Super Admin</option>
                                    <option>Admin</option>
                                    <option>Clerk</option>
                                </select>
                                <br><span class="error"> <?php echo $roleErr; ?></span>
                            </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>
                                    <input type="submit" value="Save" name="submit" class="button" />
                                    <br><span class="error"> <?php echo $error; ?></span>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                    </form>
                </div>
            </div>
            <div id="tooplate_footer">    
                Copyright © 2015 <a href="http://www.eedadvisory.com" target="_blank">EED Advisory Limited </a> | Designed for Household Energy Data Aggregator (HEDA).
            </div> 
        </div><!-- End of Wrapper-->

    </body>
</html>
