<?php

class Admin{
    protected $data = array();

    function __construct() {
        $textSettings = file_get_contents('../app/core/serverSettings.json');
        $this->data = json_decode($textSettings,true);
    }


    public function getLogs(){
        $db_con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $logs_array = array();
 
        if($db_con === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $sql = "SELECT user_id, username, archive_name, action_type, created_at FROM log";

        if ($result = $db_con->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                array_push($logs_array, $row);
            }
            $result->free();
        }
        $db_con->close();
        return $logs_array;
    }

    public function getMaxFileSize(){
        return $this->data['maxFileSize'];
    }
    public function setMaxFileSize($MB){
        $this->data['maxFileSize'] = $MB;
        $json_data = json_encode($this->data);
        file_put_contents('../app/core/serverSettings.json', $json_data);
    }

    public function getMaxArchiveSize(){
        return $this->data['maxArchiveSize'];
    }
    public function setMaxArchiveSize($MB){
        $this->data['maxArchiveSize'] = $MB;
        $json_data = json_encode($this->data);
        file_put_contents('../app/core/serverSettings.json', $json_data);
    }

    public function getMaxFiles(){
        return $this->data['maxFiles'];
    }
    public function setMaxFiles($MB){
        $this->data['maxFiles'] = $MB;
        $json_data = json_encode($this->data);
        file_put_contents('../app/core/serverSettings.json', $json_data);
    }

    public function getName(){
        return $this->data['name'];
    }
    public function setName($name_type){
        $this->data['name'] = $name_type;
        $json_data = json_encode($this->data);
        file_put_contents('../app/core/serverSettings.json', $json_data);
    }
}

?>