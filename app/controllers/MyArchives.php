<?php

class MyArchives extends Controller{

    protected $msg = "";

    public function index(){

        $archiveOps = $user = $this->model('ArchiveOps');
        $files = [];
        if(!isset($_SESSION["logged_in"])){
            header('location: /ArchivR/public/Auth/index');
            die();
        }

        if(isset($_POST['checkbox'])){
            $files = $_POST['checkbox'];
        }

        if(isset($_POST['delete_button']) && !empty($files)){ // Delete archives
            foreach($files as $file){
                if(unlink($_SESSION['user_path']."/".$file) === TRUE){
                    if($archiveOps->logDelete($file) === FALSE){
                        $this->msg = "Something went wrong. Try again later";
                    }
                } else{
                    $this->msg = "Error deleting files";
                }
            }
        } else { // Download archives
            if(!empty($files)){
                $zip = new ZipArchive();
                $zip_name = date("Y_m_d-H_i_s").".zip";
                if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE){
                    $this->msg = "Error Downloading";
                } else {
                    foreach($files as $file){
                        $download_file = $_SESSION['user_path']."/".$file;
                        $zip->addFile($download_file, $file);
                    }
                    $zip->close();
                    if(file_exists($zip_name)){
                        header('Content-Description: File Transfer');
                        header('Content-Type: application/zip');
                        header('Content-Disposition: attachment; filename='.basename($zip_name));
                        header('Content-Transfer-Encoding: binary');
                        header('Content-Length: '.filesize($zip_name));
                        readfile($zip_name);
                        unlink($zip_name);
                    } else {
                        $this->msg = "Error downloading";
                    }
                }
            }
        }
        $this->view('home/MyArchives', ['msg' => $this->msg]);
    }
}
?>