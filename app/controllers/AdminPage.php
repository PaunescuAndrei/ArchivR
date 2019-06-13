<?php

class AdminPage extends Controller{
    public function index(){
        $admin = $this->model("Admin");

        $this->view('home/AdminPage');
    }
}

?>