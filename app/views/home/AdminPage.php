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
                        <div id="step2" class="fieldset" style="margin-top:30px;">
                            <h3>Admin Page</h3>
                                <div style="text-align: right">
                                    <button type="button" class="btn btn-blue" onclick="">Download XML</button>
                                    <button type="button" class="btn btn-blue" onclick="">Download CSV</button>			
                                    <button type="button" class="btn btn-blue" onclick="">Download HTML</button>			
                                </div>
                        </div>
                </article>
            </div>
        </section>
    </body>
</html>