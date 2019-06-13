<?php

class Admin{
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
}

?>