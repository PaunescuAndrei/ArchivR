<?php

class MyArchives extends Controller{
    public function index(){
        if(!isset($_SESSION["logged_in"])){
            header('location: /archivr-mvc/public/Auth/index');
            die();
        }
        $this->view('home/MyArchives');
    }
}

?>