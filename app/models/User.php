<?php



class User{

    public function registerUser($username, $password){
        $db_con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
        if($db_con === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $sql = "SELECT id FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($db_con, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){    
                    mysqli_stmt_close($stmt);
                    mysqli_close($db_con);
                    return "This username is already taken.";
                }
            } else{   
                mysqli_stmt_close($stmt);
                mysqli_close($db_con);
                return "Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);

        $sql = "INSERT INTO users (username, password, user_path) VALUES (?, ?, ?)";         
        if($stmt = mysqli_prepare($db_con, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_path);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_path = '../app/user_dirs/'.$username;
            if (!file_exists($param_path)) {
                mkdir($param_path, 0777, true);
            } else { 
                mysqli_stmt_close($stmt);
                mysqli_close($db_con);
                return "Something went wrong. Please try again later.";
            }
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_close($stmt);
                mysqli_close($db_con); 
                return "Account created !";
            } else{
                mysqli_stmt_close($stmt);
                mysqli_close($db_con);
                return "Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($db_con);
        return "Something went wrong. Please try again later.";
    }
    
    public function loginUser($username, $password){
        $db_con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
        if($db_con === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($db_con, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){ 
                            mysqli_stmt_close($stmt);
                            mysqli_close($db_con);
                            return 1; // Correct password/username
                        } else {
                            mysqli_stmt_close($stmt);
                            mysqli_close($db_con);
                            return 0; // Wrong password/username
                        }
                    }
                } else{ 
                    mysqli_stmt_close($stmt);
                    mysqli_close($db_con);
                    return -1; // No username in db
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($db_con);
        return -1; 
    }

    public function getUserData($username){ 
        $db_con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        
        if($db_con === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $sql = "SELECT id, username, user_path, admin FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($db_con, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $user_path, $admin);
                    if(mysqli_stmt_fetch($stmt)){
                        $user_data = ['id' => $id, 'username' => $username, 'user_path' => $user_path, 'admin' => $admin];
                        mysqli_stmt_close($stmt);
                        mysqli_close($db_con);
                        return $user_data;
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($db_con);
        return [];
    }

    public function changePassword($user_id,$password){
        if(preg_match('/[^A-Za-z0-9]/', $password)){
            return "Password only need alphanumeric characters";
        } elseif(strlen($password) < 6){
            return "Pasword must have at least 6 characters";
        }

        $db_con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
        if($db_con === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $sql = "UPDATE users SET password= ? WHERE id= ?";
        if($stmt = mysqli_prepare($db_con, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_password,$param_user_id);
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_user_id = $user_id;
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_close($stmt);
                mysqli_close($db_con);
                return "Your password has been changed successfully!";
            }else{
                mysqli_stmt_close($stmt);
                mysqli_close($db_con);
                return "Something went wrong. Please try again later.";
            }
        }
    }
}

?>