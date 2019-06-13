<?php

class AdminPage extends Controller{

    private $msg = "";

    public function index(){
        $logs = array();
        $admin = $this->model("Admin");
        $logs = $admin->getLogs();
        if(count($logs)){
            if(isset($_POST['download_xml'])){
                $this->downloadXML($logs, 'logs.xml');
            } elseif(isset($_POST['download_csv'])){
                $this->downloadCSV($logs, 'logs.csv');
            } elseif(isset($_POST['download_html'])){
                $this->downloadHTML($logs, 'logs.html');
            }
        }
        $this->view('home/AdminPage', ['msg' => $this->msg]);

    }

    private function downloadXML($logs_array, $file_name){
        $xml_file = $file_name;
        $dom = new DOMDocument('1.0', 'utf-8'); 
        $root = $dom->createElement('Archives'); 
        for($i=0; $i<count($logs_array); $i++){
            //user_id, username, archive_name, action_type, created_at
            $user_id = $logs_array[$i]['user_id'];  
            $username = $logs_array[$i]['username'];
            $archive_name = htmlspecialchars($logs_array[$i]['archive_name']);
            $action_type = $logs_array[$i]['action_type']; 
            $created_at = $logs_array[$i]['created_at'];

            $entry = $dom->createElement('user_id');
            $entry->setAttribute('user_id', $user_id);

            $xml_username = $dom->createElement('username', $username); 
            $entry->appendChild($xml_username);

            $xml_archive_name = $dom->createElement('archive_name', $archive_name); 
            $entry->appendChild($xml_archive_name);

            $xml_action_type = $dom->createElement('action_type', $action_type); 
            $entry->appendChild($xml_action_type); 

            $xml_created_at = $dom->createElement('created_at', $created_at); 
            $entry->appendChild($xml_created_at); 
            $root->appendChild($entry);
        }
        $dom->appendChild($root); 
        $dom->save($xml_file);
        if(file_exists($xml_file)){
            header('Content-Description: File Transfer');
            header('Content-Type: application/xml');
            header('Content-Disposition: attachment; filename='.basename($xml_file));
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: '.filesize($xml_file));
            readfile($xml_file);
            unlink($xml_file);
        } else {
            $this->msg = "Error downloading";
        } 
    }

    private function downloadCSV($logs_array, $file_name){

    }
    private function downloadHTML($logs_array, $file_name){
        
    }
}

?>