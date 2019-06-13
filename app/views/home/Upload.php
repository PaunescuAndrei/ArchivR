<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Upload</title>
        <base href="/ArchivR/public/" />
        <link rel='stylesheet' type='text/css' href='css/style.css'/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/upload.js"></script>

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
                        <li><a href="/ArchivR/public/Upload/index" class="active">Upload</a></li>
                        <li><a href="/ArchivR/public/MyArchives/index">My archives</a></li>
                    </ul>
                    <p class="menu-label">Configuration</p>
                    <ul class="menu-list">
                        <li><a href="myaccount.html">Change your password</a></li>
                        <li><a href="/ArchivR/public/Auth/logout">Logout</a></li>
                    </ul>
                </nav>
                <article>
                    <form id="UploadForm" action="" onreset="$('#zipList').empty();" method="post" enctype="multipart/form-data">
                    	<div id="step1" class="fieldset" style="margin-top:0;">
                            <h3 style="margin-bottom:0;">1. Select files to archive</h3>
                            <p class="text-muted">You can also drop files here.</p>
                            <input type="file" id="fileUploader" style="display: none;" name="files[]" multiple onchange="javascript:updateList()">
                            <input type="button" class="btn btn-gray" value="Browse..." onclick="document.getElementById('fileUploader').click();" />
                        </div>
                        
                        <div id="step2" class="fieldset" style="margin-top:30px;">
                            <h3>2. Files in archive</h3>
                            <div id="zipList">

                            </div>
                            <div id = "uploadButtons">
                                    <div id="archiveType">
                                        Archive type: 
                                        <label><input type="radio" name="type" value="ZIP" checked="checked">ZIP</label> 
                                        <label><input type="radio" name="type" value="TAR">TAR</label>
                                        <label><input type="radio" name="type" value="GZIP">GZIP</label>  
                                        <label><input type="radio" name="type" value="BZIP2">BZIP2</label>
                                    </div>
                                <div style="text-align: right">
                                    <input type="submit" class="btn btn-blue" value="Archive it!">		
                                    <input type="reset" class="btn btn-red" value="Cancel">
                                </div>
                            </div>
                        </div>
                        <p class="text-muted"><?php echo $data['msg']; ?></p>
                    </form>
                </article>
            </div>
        </section>
    </body>
</html>