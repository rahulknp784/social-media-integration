<?php

//Include Configuration File
include('config.php');

$login_button = '';


if (isset($_GET["code"])) {

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


    if (!isset($token['error'])) {

        $google_client->setAccessToken($token['access_token']);


        $_SESSION['access_token'] = $token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);


        $data = $google_service->userinfo->get();


        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        }

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
    }
}


if (!isset($_SESSION['access_token'])) {

    $login_button = '<a href="' . $google_client->createAuthUrl() . '">' . '<i class="fab fa-google"></i>' . '</a>';
} else {
    header('location:profile.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://kit.fontawesome.com/9db744b116.js" crossorigin="anonymous"></script>
    <script src="init.js"></script>
    
    <title>Login</title>

</head>
<!-- '287903229728083' -->
<body>

   
    <div id="status" class="center">
    </div>

    <div id="contener">
        <div class="togle-button">
            <button id="login" onclick="login()">Login</button>
            <button id="resister" onclick='resister()'>Resister</button>

        </div>
        <br>
        <span id='social-icon'>

            <a id="loginfb"><i class="fab fa-facebook"></i></a>
            <?php
            // echo $facebook_login_url.'&nbsp';
            echo $login_button;
             
            ?>
        </span>
        <br>
        <form action="" id="form1">

            <input type="text" id="Username" class='input' value="Username">
            <br>
            <input type="text" id="password" class='input' value="password">
            <br>
            <input type="checkbox" id='rem'>
            <label for="rem" id="lab-rem">Remember me</label>
            <br>
            <input type="submit" id='login-end' value="Login">
        </form>
        <form action="" id="form2">
            <input type="text" id="email" class='input' value="Email">
            <input type="text" id="Username" class='input' value="Username">
            <br>
            <input type="text" id="password" class='input' value="password">
            <br>
            <input type="checkbox" id='adu'>
            <label for="adu" id="ad">I am 12+</label>
            <br>
            <input type="submit" id='resister-end' value="Resister">
        </form>
    </div>
    <script>
        function login() {
            var login = document.getElementById('login');
            login.style.background = ' rgba(0, 0, 128, 0.692)'
            login.style.boxShadow = '0px 0px 10px 10px rgba(0, 0, 128, 0.356)'
            login.style.color = 'white'
            var resister = document.getElementById('resister');
            resister.style.background = 'transparent'
            resister.style.boxShadow = '0px 0px 0px 0px rgba(0, 0, 128, 0.356)'
            resister.style.color = 'black'
            var form1 = document.getElementById('form1')
            form1.style.left = '0'
            var form1 = document.getElementById('form2')
            form1.style.left = '500px'
        };

        function resister() {
            var login = document.getElementById('login')
            login.style.background = ' transparent'
            login.style.boxShadow = '0px 0px 0px 0px rgba(0, 0, 128, 0.356)'
            login.style.color = 'black'
            var resister = document.getElementById('resister');
            resister.style.background = ' rgba(0, 0, 128, 0.692)'
            resister.style.boxShadow = '0px 0px 10px 10px rgba(0, 0, 128, 0.356)'
            resister.style.color = 'white'
            var form1 = document.getElementById('form1')
            form1.style.left = '-500px'
            var form1 = document.getElementById('form2')
            form1.style.left = '0'
        };
    </script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="script.js"></script>
</html>