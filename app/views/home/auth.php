<?php
$info = "";
if(isset($data['info'])){
    $info = $data['info'];
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <base href="/ArchivR/public/" />
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
                            <button type="submit" name=login_button class="button">Log in</button>
                        </div>
                        <div class="button-control">
                            <button type="submit" name=register_button class="button">Register</button>
                        </div>
                    </div>
                </form>
                <div class="error">
                    <span class="error"><?php echo $info?></span>
                </div>
            </div>
        </div>
    </body>
</html>