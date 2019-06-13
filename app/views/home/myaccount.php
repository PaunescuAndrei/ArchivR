<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My account</title>
        <base href="/ArchivR/public/" />
        <link rel='stylesheet' type='text/css' href='css/style.css'/>
        <link rel='stylesheet' type='text/css' href='css/myaccount.css'/>

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
                        <li><a href="/ArchivR/public/MyAccount/index" class="active">Change your password</a></li>
                        <li><a href="/ArchivR/public/Auth/logout">Logout</a></li>
                    </ul>
                </nav>
                <article>
                    <form id="ChangePW" action="" method="post">
                        <div id="step2" class="fieldset" style="margin-top:30px;">
                            <h3>Change password</h3>
                            <div class="field">
                                <label class="label">New password:</label>
                                <div class="control">
                                    <input name="password" class="input" type="password">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Re-type new password:</label>
                                <div class="control">
                                  <input name="passwordConfirm" class="input" type="password">
                                </div>
                            </div>
                            <div style="text-align: center">
                                <input type="submit" class="btn btn-blue" value="Change Password!">		
                            </div>
                            <p class="label"><?php echo $data['msg']; ?></p>
                        </div>
                        
                    </form>
                </article>
            </div>
        </section>
    </body>
</html>