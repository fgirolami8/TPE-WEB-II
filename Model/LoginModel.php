<?php

class LoginModel{

    private $db;

    public function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_musica2021;charset=utf8', 'root', '');
    }
    //LOGIN
    public function get_db_user($user){
        $sentencia = $this->db->prepare('SELECT * FROM users WHERE `user` = ?');
        $sentencia->execute([$user]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    //REGISTER
    public function setAdministrator($user, $pass){
        $sentencia = $this->db->prepare("INSERT INTO `users`(`user`, `password`, `rol`) VALUES(?,?,?)");
        $sentencia->execute(array($user, $pass, false));
    }
    //users
    public function getAllUsers(){
        $sentencia = $this->db->prepare('SELECT * FROM users');
        $sentencia->execute(array());
        $users = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }
    //delete user
    public function deleteUser($user){
        $sentencia = $this->db->prepare("DELETE FROM `users` WHERE `user`=?");
        $sentencia->execute(array($user));
    }
    //change rol admin/user
    public function changeRolUser($user, $rol){
        $sentencia = $this->db->prepare("UPDATE users SET `rol`=? WHERE `user`=?");
        $sentencia->execute(array($rol, $user));
    }
}