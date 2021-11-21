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

    function showUsers($users, $log_state, $rol_user, $title){
        $this->smarty->assign('users', $users);
        $this->smarty->assign('log_state', $log_state);
        $this->smarty->assign('rol_user', $rol_user);
        $this->smarty->assign('title', $title);
        $this->smarty->display('templates/users.tpl');
    }

    function show_home_location(){
        header("Location: ".BASE_URL."home");
    }

    function show_Users_Location(){
        header("Location: ".BASE_URL."users");
    }



//$this->smarty->assign('rol', $mermelada);





}