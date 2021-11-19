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
    //ADMIN/USER
    public function get_db_rol($user){
        $sentencia = $this->db->prepare('SELECT * FROM users WHERE `user`= ? AND `rol` = ?');
        $sentencia->execute(array($user, true));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

}