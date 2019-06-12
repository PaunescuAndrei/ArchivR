<?php

class ArchiveOps{
    public function logDelete($archive_name){
        $db_con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
        if($db_con === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $sql = "INSERT INTO log (user_id, username, archive_name, action_type, created_at) VALUES (?, ?, ?, ?, NOW())";
        if($stmt = mysqli_prepare($db_con, $sql)){
            mysqli_stmt_bind_param($stmt, "isss", $param_user_id, $param_username, $param_archive_name, $param_action_type);
            $param_user_id = $_SESSION['id'];
            $param_username = $_SESSION['username'];
            $param_archive_name = $archive_name;
            $param_action_type = "Delete";
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_close($stmt);
                mysqli_close($db_con); 
                return TRUE;
            } else {
                mysqli_stmt_close($stmt);
                mysqli_close($db_con); 
                return FALSE;
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($db_con); 
        return FALSE;  
    }

    public function logUpload($archive_name){
        $db_con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
        if($db_con === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $sql = "INSERT INTO log (user_id, username, archive_name, action_type, created_at) VALUES (?, ?, ?, ?, NOW())";
        if($stmt = mysqli_prepare($db_con, $sql)){
            mysqli_stmt_bind_param($stmt, "isss", $param_user_id, $param_username, $param_archive_name, $param_action_type);
            $param_user_id = $_SESSION['id'];
            $param_username = $_SESSION['username'];
            $param_archive_name = $archive_name;
            $param_action_type = "Upload";
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_close($stmt);
                mysqli_close($db_con); 
                return TRUE;
            } else {
                mysqli_stmt_close($stmt);
                mysqli_close($db_con); 
                return FALSE;
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($db_con); 
        return FALSE;  
    }
}

?>