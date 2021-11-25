<?php

class SongsModel{

    private $db;
    function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_musica2021;charset=utf8', 'root', '');
    }

    //devuelve un arr con canciones en forma de objetos
    function getPageSongs($init, $SONGS_PER_PAGE){
        $sentencia = $this->db->prepare("SELECT * FROM songs LIMIT $init, $SONGS_PER_PAGE");
        $sentencia->execute();
        $canciones = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $canciones;
    } 
    
    function getSongs(){
        $sentencia = $this->db->prepare("SELECT * FROM songs");
        $sentencia->execute();
        $canciones = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $canciones;
    } 

    function getSongsListSize(){
        $sentencia = $this->db->prepare("SELECT * FROM songs");
        $sentencia->execute();
        return $sentencia->rowCount();
    }


    function getSong($id){
        $sentencia = $this->db->prepare("SELECT * FROM songs WHERE `id`=?");
        $sentencia->execute(array($id));
        $song = $sentencia->fetch(PDO::FETCH_OBJ);
        return $song;
    }
    
    //ABM

    function addSong($name, $artist, $genre, $album, $year, $img = ""){
        $sentencia = $this->db->prepare("INSERT INTO songs(`name`, artist, genre, album, `year`, `image`) VALUES(?, ?, ?, ?, ?, ?)");
        $sentencia->execute(array($name, $artist, $genre, $album, $year, $img));
    }     

    function deleteSong($id){
        $sentencia = $this->db->prepare("DELETE FROM `songs` WHERE `id`=?");
        $sentencia->execute(array($id));
    }

    function editSong($songToEdit, $name, $artist, $genre, $album, $year, $img = ""){
        $sentencia = $this->db->prepare("UPDATE songs SET `name`=?, artist=?, genre=?, album=?, `year`=?, `image`=? WHERE `id`=?");
        $sentencia->execute(array($name, $artist, $genre, $album, $year, $img, $songToEdit));
    }


    // busqueda de canciones segun sus campos
    function filterSongsXfields($name, $artist, $genre, $album, $year){
        $sentencia = $this->db->prepare(
        "SELECT * FROM songs WHERE name LIKE '%' ? '%' AND artist LIKE ? AND genre LIKE '%' ? '%' 
        AND album LIKE '%' ? '%' AND year LIKE  '%' ? '%'");
        $sentencia->execute(array($name, $artist, $genre, $album, $year));
        $songs = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $songs;
    }



}