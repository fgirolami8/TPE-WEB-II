<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';

class LoginView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showLogin($msg = ""){
        $this->smarty->assign('msg', $msg);      
        $this->smarty->assign('log_state', 'login');   //x defecto esta login   
        $this->smarty->display('templates/login.tpl');
    }

    function showRegister($msg = ""){
        $this->smarty->assign('msg', $msg);
        $this->smarty->assign('log_state', 'login');
        $this->smarty->display('templates/register.tpl');
    }

    function show_home_location(){
        header("Location: ".BASE_URL."home");
    }









}