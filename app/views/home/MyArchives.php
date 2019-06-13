<?php

$user_files = [];
$user_path = "";
if(isset($_SESSION['user_path'])){
    $user_path = $_SESSION['user_path'];
    if (is_dir($user_path)) {
        if ($dir = opendir($user_path)) {
            $files = array_diff(scandir($user_path), array('.', '..'));
            closedir($dir);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My archives</title>
        <base href="/ArchivR/public/" />
        <link rel='stylesheet' type='text/css' href='css/style.css'/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
    </head>
    <body>
        <section class = "section" style="display: block;">
            <header>
                <h1 class="title">
                    ArchivR
                </h1>
                <h1 class="subtitle">
                    A simple app to archive your files.
                </h1>
                <hr>
            </header>
            <div id="main">
                <nav>
                    <p class="menu-label">General</p>
                    <ul class="menu-list">
                        <li><a href="/ArchivR/public/Upload/index">Upload</a></li>
                        <li><a href="/ArchivR/public/MyArchives/index" class="active">My archives</a></li>
                    </ul>
                    <p class="menu-label">Configuration</p>
                    <ul class="menu-list">
                        <?php
                            if($_SESSION['admin'] === "Y"){
                                echo "<li><a href=\"/ArchivR/public/AdminPage/index\">Admin Config</a></li>";
                            }
                        ?>
                        <li><a href="/ArchivR/public/MyAccount/index">Change your password</a></li>
                        <li><a href="/ArchivR/public/Auth/logout">Logout</a></li>
                    </ul>
                </nav>
                <article>
                <form action="" method="POST">
                        <div id="step2" class="fieldset" style="margin-top:30px;">
                            <h3>Your files</h3>
                            <div id="zipList">
                            <?php
                            foreach($files as $file){
                                $size = filesize($user_path."/".$file)/1024;
                                $size = number_format((float)$size, 2, '.', '');
                                echo "<form action=\"\" method=\"POST\">";
                                echo "<div><input class=\"bin\" type=\"submit\" name=\"file_name\" id=".$file." value=".$file."></div>";
                                echo "</form>";
                                echo "<div class=\"progress\" style=\"margin-left:24px\">";
                                echo "<div><input type=\"checkbox\" value=".$file." name=\"checkbox[]\" />".$file."<span class=\"fileSize\"> ".$size." KB</span></div>";
                                echo "</div>";
                            }
                            ?>
                            </div>
                            <div style="text-align: right">
                                <input type="submit" class="btn btn-blue" value="Download" name="download_button">			
                                <input type="submit" class="btn btn-red" value="Delete" name="delete_button">
                            </div>
                        </div>
                    </form>
                    <p class="text-muted">
                    <?php 
                        echo $data['msg']; 
                    ?>
                    </p>
                </article>
            </div>
        </section>
    </body>
</html>