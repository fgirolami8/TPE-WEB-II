<?php

require_once "./Model/LoginModel.php";
require_once "./View/LoginView.php";

class LoginController {

    private $loginModel;
    private $loginView;

    function __construct(){
        $this->loginModel = new LoginModel();
        $this->loginView = new LoginView();
    }

    function logout(){
        session_start();
        session_destroy();
        $this->loginView->showLogin("Te deslogueaste!");
    }

    function viewLogin(){
        $this->loginView->showLogin();
    }

    function authentify(){
        
        if (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {
            $form_user = $_POST['user_name'];
            $form_password = $_POST['user_password'];

            //traigo a usuario de db q coincide con el del form
            $db_user = $this->loginModel->get_db_user($form_user);

            //si esteusuario existe y sus contraseñas son iguales
            if ($db_user && password_verify($form_password, $db_user->password)) {
                session_start();
                $_SESSION["user_name"] = $form_user;
                $this->loginView->show_home_location();
            } else {
                $this->loginView->showLogin("No se han podido validar tus datos :)");
            }
        }else
            $this->loginView->showLogin("No completaste la forma ;)");

            
    }

     //function register(){//completar si se implementa
     //    if(!empty($_POST['user_name'])&&!empty($_POST['user_password'])){
     //        $user = $_POST['user_name'];
     //        $password = password_hash($_POST['user_password'], PASSWORD_BCRYPT);
     //        $this->loginModel->setAdministrator($user, $password);
     //    }   
     //}

}