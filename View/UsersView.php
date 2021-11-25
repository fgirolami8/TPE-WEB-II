<?php

require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';

class UsersView {
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showUsers($users, $rol_user, $title){
        $this->smarty->assign('users', $users);
        $this->smarty->assign('rol_user', $rol_user);
        $this->smarty->assign('title', $title);
        $this->smarty->display('templates/users.tpl');
    }

    function show_Users_Location(){
        header("Location: ".BASE_URL."users");
    }
}