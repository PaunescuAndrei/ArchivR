<?php

class MyArchives extends Controller{
    public function index(){

        $archiveOps = $user = $this->model('ArchiveOps');

        if(!isset($_SESSION["logged_in"])){
            header('location: /ArchivR/public/Auth/index');
            die();
        }

        if(isset($_POST['checkbox']) && isset($_POST['delete_button'])){ // Delete archives
            foreach($_POST['checkbox'] as $file){
                if(unlink($_SESSION['user_path']."/".$file)){
                    if($archiveOps->logDelete($file) === FALSE){
                        echo "Something went wrong. Try again later";
                    }
                }
            }
        } else { // Download archives

        }

        $this->view('home/MyArchives');
    }
}

?>