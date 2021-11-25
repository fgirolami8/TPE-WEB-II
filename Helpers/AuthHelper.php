<?php
require_once "./Model/UsersModel.php";
class AuthHelper{
    
    private $usersModel;

    public function __construct(){
       $this->usersModel = New UsersModel(); 
    }

    //para restringir acceso a funciones ABM
    function checkLoggedIn(){
        if (session_status() != 2){//para comprobar q no hice session_start() antes
            session_start();
        }
        if(!isset($_SESSION["user_name"])){
            header("Location: ".BASE_URL."login");
            die();
        }
    }

    function checkAdmin(){
        if (session_status() != 2){//para comprobar q no hice session_start() antes
            session_start();
        }
        if( !(isset($_SESSION["user_rol"]) && $_SESSION["user_rol"] == 1) ){
            header("Location: ".BASE_URL."login");
            die();
        }
    }

    public function rol_state(){
        if (session_status() != 2){//para comprobar q no hice session_start() antes
            session_start();
        }
        if(isset($_SESSION["user_name"])){
            return $_SESSION["user_rol"];
        }
        return -1;
    }

}
