<?php

require_once "./Model/UsersModel.php";
require_once "./View/LoginView.php";
require_once "./Helpers/AuthHelper.php";

class LoginController {

    private $usersModel;
    private $loginView;
    private $authHelper;

    public function __construct(){
        $this->usersModel = new UsersModel();
        $this->loginView = new LoginView();
        $this->authHelper = new AuthHelper();
    }

    public function logout(){
        session_start();
        session_destroy();
        $this->loginView->showLogin($this->authHelper->rol_state(), "Te deslogueaste!");
    }

    public function viewLogin(){
        $this->loginView->showLogin($this->authHelper->rol_state());
    }

    //al mandar form de log in
    public function authentify(){
        if (isset($_POST['user_name']) && isset($_POST['user_password']) && !empty($_POST['user_name']) && !empty($_POST['user_password'])) {
            $form_user = $_POST['user_name'];
            $form_password = $_POST['user_password'];
            //traigo a usuario de db q coincide con el del form
            $db_user = $this->usersModel->get_db_user($form_user);
            //si este usuario existe y sus contraseñas son iguales me guardo nombre y rol
            if ($db_user && password_verify($form_password, $db_user->password)) {
                session_start();
                $_SESSION["user_name"] = $db_user->user;
                $_SESSION["user_rol"] = $db_user->rol;
                $this->loginView->show_home_location();
            } else {
                $this->loginView->showLogin($this->authHelper->rol_state(), "No se han podido validar tus datos :)");
            }
        }else
            $this->loginView->showLogin($this->authHelper->rol_state(), "No completaste la forma ;)");        
    }

    public function viewRegister(){
        $this->loginView->showRegister($this->authHelper->rol_state());
    }

    public function registerUser(){
        if(isset($_POST['user_name']) && isset($_POST['user_password']) && !empty($_POST['user_name']) && !empty($_POST['user_password'])){
            $user = $_POST['user_name'];
            $passwordForm = $_POST['user_password'];//for hashing
            $passwordLogueo = $passwordForm; //guardo pass para usarla en pass_verify
            $password = password_hash($passwordForm, PASSWORD_BCRYPT);
            $this->usersModel->setUser($user, $password);
            
            //innecesario
            $db_user = $this->usersModel->get_db_user($user);
            if ($db_user && password_verify($passwordLogueo, $db_user->password)) {
                session_start();
                $_SESSION["user_name"] = $db_user->user;
                $_SESSION["user_rol"] = $db_user->rol;
                $this->loginView->show_home_location();
            }
            else {
                $this->loginView->showRegister($this->authHelper->rol_state(), "no pudimos registrarte");
            }
        }
        else{
            $this->loginView->showRegister($this->authHelper->rol_state(), "Completa todos los campos!");
        }   
    }

}
