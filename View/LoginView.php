<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';

class LoginView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showLogin($rol_user, $msg = ""){
        $this->smarty->assign('msg', $msg);      
        $this->smarty->assign('rol_user', $rol_user);   //x defecto esta login   
        $this->smarty->display('templates/login.tpl');
    }

    function showRegister($rol_user, $msg = ""){
        $this->smarty->assign('msg', $msg);
        $this->smarty->assign('rol_user', $rol_user);
        $this->smarty->display('templates/register.tpl');
    }

    function show_home_location(){
        header("Location: ".BASE_URL."home");
    }

}