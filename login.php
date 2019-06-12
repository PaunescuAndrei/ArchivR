<?php
require_once "config.php";

$username = $password = "";
$error = " ";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Set password
    if(empty(trim($_POST["password"]))){
        $error = "Please enter a password";
    } elseif(strlen((trim($_POST["password"]))) < 6) {
        $error = "Password must have at least 6 characters";
    } else {
        $password = trim($_POST["password"]);
    }

    // Set username
    if(empty(trim($_POST["username"]))){
        $error = "Please enter an username";
    } else {
        $username = $_POST["username"];
    }

    if(isset($_POST["login_button"])){
        echo "Login";
    } else {
        echo "Register";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="container">
            <div class="column">
                <h1 class="title">ArchivR access</h1>
                <h2 class="subtitle">Login or register</h2>
                <form action="" method="POST">
                    <div class="field">
                        <div class="input-box">
                            <input id="user" name="username" class="input" type="text" placeholder="Your username">
                        </div>
                    </div>
                    <div class="field">
                        <div class="input-box">
                            <input name="password" class="input" type="password" placeholder="Your password">
                        </div>
                    </div>
                    <div class="buttons-right">
                        <div class="button-control">
                            <button type="submit" name=register_button class="button">Register</button>
                        </div>
                        <div class="button-control">
                            <button type="submit" name=login_button class="button">Log in</button>
                        </div>
                    </div>
                </form>
                <div class="error">
                    <span class="error"><?php echo $error; ?></span>
                </div>
            </div>
        </div>
    </body>
</html>
