<?php

class LoginModel{

    private $db;

    function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_musica2021;charset=utf8', 'root', '');
    }

    function get_db_user($user){
        $sentencia = $this->db->prepare('SELECT * FROM users WHERE `user` = ?');
        $sentencia->execute([$user]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
   
    // function setAdministrator($user, $pass){
    //     $sentencia = $this->db->prepare("INSERT INTO `users`(`user`, `password`) VALUES(?,?)");
    //     $sentencia->execute(array($user, $pass));
    // }

}