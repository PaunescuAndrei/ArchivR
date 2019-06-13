<?php

class MyAccount extends Controller{
    public function index(){

        $user = $this->model('User');
        $msg = "";

        if(!isset($_SESSION["logged_in"])){
            header('location: /ArchivR/public/Auth/index');
            die();
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo $_POST['password'];
            echo $_POST['passwordConfirm'];
            if(isset($_POST['password']) && isset($_POST['passwordConfirm'])){
                echo "test";
                if($_POST['password'] != $_POST['passwordConfirm']){
                    $msg = "Passwords do not match.";
                }else{
                    $msg = $user->changePassword($_SESSION['id'],$_POST['password']);
                }
            }
        }

        $this->view('home/MyAccount',['msg' => $msg]);
    }
}

?>