<?php

class SongsModel{

    private $db;
    function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_musica2021;charset=utf8', 'root', '');
    }

    //devuelve un arr con canciones en forma de objetos
    function getSongs(){
        $sentencia = $this->db->prepare("SELECT * FROM songs"); //seria mejor traer solo los nombre pero como?
        $sentencia->execute();
        $canciones = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $canciones;
    } 

    function getSong($id){
        $sentencia = $this->db->prepare("SELECT * FROM songs WHERE `id`=?");
        $sentencia->execute(array($id));
        $song = $sentencia->fetch(PDO::FETCH_OBJ);
        return $song;
    }
    
    //ABM

    function addSong($name, $artist, $genre, $album, $year){
        $sentencia = $this->db->prepare("INSERT INTO songs(`name`, artist, genre, album, `year`) VALUES(?, ?, ?, ?, ?)");
        $sentencia->execute(array($name, $artist, $genre, $album, $year));
    } 

    function deleteSong($id){
        $sentencia = $this->db->prepare("DELETE FROM `songs` WHERE `id`=?");
        $sentencia->execute(array($id));
    }

    function editSong($songToEdit, $name, $artist, $genre, $album, $year){
        $sentencia = $this->db->prepare("UPDATE songs SET `name`=?, artist=?, genre=?, album=?, `year`=? WHERE `name`=?");
        $sentencia->execute(array($name, $artist, $genre, $album, $year, $songToEdit));
    }

}