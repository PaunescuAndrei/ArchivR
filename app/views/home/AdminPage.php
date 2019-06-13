<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My archives</title>
        <link rel='stylesheet' type='text/css' href='../css/style.css'/>

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
                        <li><a href="/ArchivR/public/MyArchives/index">My archives</a></li>
                    </ul>
                    <p class="menu-label">Configuration</p>
                    <ul class="menu-list">
                        <?php
                            if($_SESSION['admin'] === "Y"){
                                echo "<li><a class=\"active\" href=\"/ArchivR/public/AdminPage/index\">Admin Config</a></li>";
                            }
                        ?>
                        <li><a href="/ArchivR/public/MyAccount/index">Change your password</a></li>
                        <li><a href="/ArchivR/public/Auth/logout">Logout</a></li>
                    </ul>
                </nav>
                <article>
                <form id="Settings" action="" method="post">
                        <div id="step2" class="fieldset">
                            <h3>Settings</h3>
                            <div class="settings">
                                <label class="label">Max File Size (<?php echo "Current: ".$data['MaxFileSize']." MB"; ?>)</label>
                                <div class="control">
                                    <input name="maxFileSize" class="input" type="number" min="0">
                                </div>
                            </div>
                            <div class="settings">
                                <label class="label">Max Archive Size (<?php echo "Current: ".$data['MaxArchiveSize']." MB"; ?>)</label>
                                <div class="control">
                                  <input name="maxArchiveSize" class="input" type="number" min="0">
                                </div>
                            </div>
                            <div class="settings">
                                <label class="label">Max Number of Files (<?php echo "Current: ".$data['MaxFiles']." Files"; ?>)</label>
                                <div class="control">
                                  <input name="maxFiles" class="input" type="number" min="0">
                                </div>
                            </div>
                            <div style="text-align: center">
                                <input type="submit" class="btn btn-blue" value="Submit">		
                            </div>
                            <p class="label"><?php echo $data['msg']; ?></p>
                        </div>
                        
                    </form>
                    <form id="adminForm" action="" method="post">
                        <div id="step2" class="fieldset" style="margin-top:30px;">
                            <h3>Logs</h3>
                                <div>
                                    <input type="submit" class="btn btn-blue" name="download_xml" value="Download XML">
                                    <input type="submit" class="btn btn-blue" name="download_csv" value="Download CSV">	
                                    <input type="submit" class="btn btn-blue" name="download_html" value="Download HTML">			
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