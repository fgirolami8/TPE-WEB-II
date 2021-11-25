<?php

require_once "./Model/UsersModel.php";
require_once "./View/UsersView.php";
require_once "./Helpers/AuthHelper.php";

class UsersController {

    private $usersModel;
    private $loginModel;
    private $usersView;
    private $authHelper;

    public function __construct(){
        $this->usersModel = new UsersModel();
        $this->usersView = new UsersView();
        $this->authHelper = new AuthHelper();
    }


    public function viewUsers(){
        $this->authHelper->checkAdmin();
        $users = $this->usersModel->getAllUsers();
        $this->usersView->showUsers($users, $this->authHelper->rol_state(), "Lista de Usuarios logueados");
    }


    public function deleteUser($user_name){         //MSG show error si no puede borrarlo
        $this->authHelper->checkAdmin();
        if(isset($user_name) && !empty($user_name)){
            //si me trato de eliminar a mi mismo solo refresco la pag de usuarios
            if(!($user_name == $_SESSION['user_name'])){
                $user = $this->usersModel->get_db_user($user_name);
                if($user){
                    $this->usersModel->deleteUser($user_name);
                }
            }
        }
        $this->usersView->show_Users_Location();
    }


    public function changeRolUser($user_name){        //MSJ ERRORES
        $this->authHelper->checkAdmin();
        if(isset($user_name) && !empty($user_name)){
            //simetrato de cambiar el rol a mi mismo solo recargo pag (xq si me vuelvo user no podria ver user list)
            if(!($user_name == $_SESSION['user_name'])){
                $user = $this->usersModel->get_db_user($user_name);
                if($user){
                    if ($user->rol == 1) {
                        $this->usersModel->changeRolUser($user_name, 0);
                    }
                    else{
                        $this->usersModel->changeRolUser($user_name, 1);
                    }
                }
            }
        }
        $this->usersView->show_Users_Location();
    }

}
