<?php
class AuthHelper{

    //para restringir acceso a funciones ABM
    function checkLoggedIn(){
        session_start();
        if(!isset($_SESSION["user_name"])){
            header("Location: ".BASE_URL."login");
            die();
        }
    }
    // boolean(logeado) para saber si mostar login o logout como item de nav list 
    //lo paso al view como parametro
    function log_state(){
        session_start();
        return (isset($_SESSION["user_name"]))? "logout" : "login";
    }
    //podria hacer q checkloggedin retorne algo para luego usarlo para imprimir msg pero no pinta nada ejecutar logica de esta en showHome x ejemplo



}
