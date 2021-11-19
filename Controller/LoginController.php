<?php

require_once "./Model/LoginModel.php";
require_once "./View/LoginView.php";

class LoginController {

    private $loginModel;
    private $loginView;

    public function __construct(){
        $this->loginModel = new LoginModel();
        $this->loginView = new LoginView();
    }

    public function logout(){
        session_start();
        session_destroy();
        $this->loginView->showLogin("Te deslogueaste!");
    }

    public function viewLogin(){
        $this->loginView->showLogin();
    }

    public function authentify(){
        
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

    public function viewRegister(){
        $this->loginView->showRegister();
    }

    public function registerUser(){
        if(!empty($_POST['user_name'])&&!empty($_POST['user_password'])){
            $user = $_POST['user_name'];
            $passwordForm = $_POST['user_password'];
            $passwordLogueo = $passwordForm; //esto esta bien??
            $password = password_hash($passwordForm, PASSWORD_BCRYPT);
            $this->loginModel->setAdministrator($user, $password);
            $db_user = $this->loginModel->get_db_user($user);
            if ($db_user && password_verify($passwordLogueo, $db_user->password)) {
                session_start();
                $_SESSION["user_name"] = $user;
                $this->loginView->show_home_location();
            }
            else {
                $this->loginView->showRegister(""); //falta msj
            }

        }
        else{
            $this->loginView->showRegister("Completa todos los campos!");
        }   
    }

}