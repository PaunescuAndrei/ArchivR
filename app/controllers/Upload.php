<?php

class Upload extends Controller{
    protected $msg = "";

    public function index(){
        if(!isset($_SESSION["logged_in"])){
            header('location: /ArchivR/public/Auth/index');
            die();
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_FILES['files']['name'][0]))
                    $this->msg = "You need to select at least 1 file.";
                else{
                    $name = $_SESSION['username'] . date("Y_m_d-H_i_s");
                    switch ($_POST['type']) {
                        case "ZIP":
                            $this->createZip($name);
                            break;
                        case "TAR":
                            $this->createTar($name);
                            break;
                        case "GZIP":
                            $this->createGZ($name);
                            break;
                        case "BZIP2":
                            $this->createBZ2($name);
                            break;
                        default:
                            $this->createZip($name);
                            break;
                    }
                }
        }

        $this->view('home/Upload',['msg' => $this->msg]);
    }

    public function createZip($name){
        $zip = new ZipArchive();
        $zip_name = $_SESSION['user_path'] .'/'. $name . ".zip";
        
        // Create a zip target
        if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) {
            $this->msg .= "Sorry ZIP creation is not working currently.<br/>";
        }
        
        $fileCount = count($_FILES['files']['name']);
        for($i=0;$i<$fileCount;$i++) {
            if ($_FILES['files']['tmp_name'][$i] != '') {
                $zip->addFromString($_FILES['files']['name'][$i], file_get_contents($_FILES['files']['tmp_name'][$i]));
            }
            
        }
        $zip->close();
        $this->msg = "<a href=".$zip_name.">Download</a>";
    }


    public function createTar($name){
        $zip_name = $_SESSION['user_path'] .'/'. $name . ".tar";
        $archive = new PharData($zip_name);

        $fileCount = count($_FILES['files']['name']);
        for($i=0;$i<$fileCount;$i++) {
            if ($_FILES['files']['tmp_name'][$i] != '') {
                $archive->addFromString($_FILES['files']['name'][$i], file_get_contents($_FILES['files']['tmp_name'][$i]));
            }
        }
        $this->msg = "<a href=".$zip_name.">Download</a>";
    }

    public function createGZ($name){
        $zip_name = $_SESSION['user_path'] .'/'.$name.".tar";
        $archive = new PharData($zip_name);

        $fileCount = count($_FILES['files']['name']);
        for($i=0;$i<$fileCount;$i++) {
            if ($_FILES['files']['tmp_name'][$i] != '') {
                $archive->addFromString($_FILES['files']['name'][$i], file_get_contents($_FILES['files']['tmp_name'][$i]));
            }
        }
        $archive->compress(Phar::GZ);
        unset($archive);
        unlink($zip_name);
        $this->msg = "<a href=".$zip_name.".gz".">Download</a>";
    }

    public function createBZ2($name){
        $zip_name = $_SESSION['user_path'] .'/'.$name.".tar";
        $archive = new PharData($zip_name);

        $fileCount = count($_FILES['files']['name']);
        for($i=0;$i<$fileCount;$i++) {
            if ($_FILES['files']['tmp_name'][$i] != '') {
                $archive->addFromString($_FILES['files']['name'][$i], file_get_contents($_FILES['files']['tmp_name'][$i]));
            }
        }
        $archive->compress(Phar::BZ2);
        unset($archive);
        unlink($zip_name);
        $this->msg = "<a href=".$zip_name.".gz".">Download</a>";
    }
}

?>