<?php
session_start();
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
// put your code here
include 'model/SystemUsers.php';
$username = $password = $usernameErr = $passwordErr = $loginErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST['username']);
    if (empty($username)) {
        $usernameErr = "Email or User Name is Required!";
    }
    $password = test_input($_POST['password']);
    if (empty($password)) {
        $passwordErr = "Password is Required !";
    }
    $model = new SystemUsersModel();
    if (!empty($username) && !empty($password)) {
        if (($model->login($username, $password) == 1)) {
            $_SESSION['login_user'] = $username; // Initializing Session
            header("location: views/dashboard.php");
        } else {
            $loginErr = "Login Failed !";
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<html>
    <head>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
        <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <meta charset="UTF-8">
        <title>Log In Page </title>
    </head>
    <body>
        <div id="tooplate_wrapper">
            <div id="tooplate_header"></div>
            <div id="tooplate_main">
                <div id="tooplate_content" >
                    <div id="tooplate_content_login" 
                      <div id="login_form">
                             
                        <form name="login" action="index.php" method="POST">
                            <fieldset>
                                <legend>Login Form</legend>
                                <table border="0" align="center" cellspacing="10" cellpadding="20">
                                    <tbody>
                                        <tr>
                                            <td bgcolor="">
                                    <p2>Username/Email <span class="error">*</span></p2><br>
                                    <input type="text" name="username" value="" size="70" class="heighttext" Required placeholder="Username or Email" value="<?php echo $username; ?>" />
                                    <br><span class="error"> <?php echo $usernameErr; ?></span>
                                    </td>
                                    </tr>

                                    <tr>
                                        <td bgcolor="">
                                    <p2>Password <span class="error">*</span></p2><br>
                                    <input type="password" name="password" value="" size="70" class="heighttext" placeholder="Password" value="<?php echo $password; ?>" />
                                    <br><span class="error"> <?php echo $passwordErr; ?></span>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="">
                                            <input type="submit" value="Log In" name="submit" class="button-link"/>
                                            <br><span class="error"> <?php echo $loginErr; ?></span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                        </form>
                             </div>
                    </div>
                </div>
            </div>
            <div id="tooplate_footer">    
                Copyright © 2015 <a href="http://www.eedadvisory.com" target="_blank">EED Advisory Limited </a> | Designed for Household Energy Data Aggregator (HEDA).
            </div> 

        </div>
    </body>
</html>
