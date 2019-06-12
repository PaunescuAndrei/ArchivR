<?php

class Auth extends Controller{
    public function index(){
        if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true){
            header('location: /ArchivR/public/MyArchives/index');
            die();
        }
        $info = "";
        $user = $this->model('User');
        if(isset($_POST["register_button"])){ // Register stuff
            $info = $this->checkFields();
            if($info == ""){
                $info = $user->registerUser($_POST['username'], $_POST['password']);
            }
        } else { // Login stuff
            if(isset($_POST['username']) && isset($_POST['password'])){
                $id = $user->loginUser($_POST['username'], $_POST['password']);
                if($id == -1){
                    $info = "Username does not exist!";
                } elseif($id == 0){
                    $info = "Wrong password";
                } elseif($id == 1){
                    $user_data = $user->getUserData($_POST['username']);
                    if(!empty($user_data)){
                        $_SESSION['id'] = $user_data['id'];
                        $_SESSION['username'] = $user_data['username'];
                        $_SESSION['user_path'] = $user_data['user_path'];
                        $_SESSION['admin'] = $user_data['admin'];
                        $_SESSION['logged_in'] = TRUE;
                        header('location: /ArchivR/public/MyArchives/index');
                        die();
                    }
                }
            }
        }
        $this->view('home/auth', ['info' => $info]);
    }

    private function checkFields(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['username'])){
                if(isset($_POST['password'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                }
            }
            if($username != ""){
                if(preg_match('/[^A-Za-z0-9]/', $password)){
                    return "Password only need alphanumeric characters";
                } elseif(strlen($password) < 6){
                    return "Pasword must have at least 6 characters";
                }
                return "";
            }else {
                return "Please insert username";
            }
        }
    }
}

?>