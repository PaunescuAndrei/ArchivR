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
                        <li><a href="/ArchivR/public/MyArchives/index" class="active">My archives</a></li>
                    </ul>
                    <p class="menu-label">Configuration</p>
                    <ul class="menu-list">
                        <li><a href="/ArchivR/public/MyAccount/index">Change your password</a></li>
                        <li><a href="/ArchivR/public/Auth/logout">Logout</a></li>
                    </ul>
                </nav>
                <article>
                        <div id="step2" class="fieldset" style="margin-top:30px;">
                            <h3>Your files</h3>
                            <div id="zipList">
                                <div class="bin" onclick=""></div>
                                <div class="progress" style="margin-left:24px">
                                    <div><input type="checkbox">file1.tar<span class="fileSize">49.8KB</span></div>
                            </div>
                            <div class="bin" onclick=""></div>
                                <div class="progress" style="margin-left:24px">
                                    <div><input type="checkbox">file2.zip<span class="fileSize">105.4KB</span></div>
                                </div>
                            </div>
                                <div style="text-align: right">
                                    <button type="button" class="btn btn-blue" onclick="" disabled>Download</button>			
                                    <button type="button" class="btn btn-red" onclick="">Delete</button>
                                </div>
                        </div>
                </article>
            </div>
        </section>
    </body>
</html>