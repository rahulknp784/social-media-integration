<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <title>Document</title>
</head>
<body>
    <?php
    include("config.php");
    echo ' <div class="center">
    <h1>'.$_SESSION['user_first_name'].'  '.$_SESSION["user_last_name"].'</h1>
    <img src="'.$_SESSION["user_image"].'" alt="Profile pic" >
    <h2>'.$_SESSION['user_email_address'].'</h2>
    
    <br>
    <br>
    <div class="logout"><a href="logout.php">Logout</a></div>
    
    </div>';
    ?>
   
</body>
</html>