<?php

class CategoriesModel{

    private $db;
    function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_musica2021;charset=utf8', 'root', '');
    }

    function getArtists(){
        $sentencia = $this->db->prepare("SELECT * FROM artists");
        $sentencia->execute();
        $artistas = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $artistas;
    }
    
    function getArtist($id){
        $sentencia = $this->db->prepare( "SELECT a.*, b.* FROM artists a LEFT JOIN songs b ON a.artist = b.artist WHERE a.artist =?");
        $sentencia->execute(array($id));
        $artista = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $artista;
    }

    //ABM
    function addArtist($artista, $año, $albumes){
        $sentencia = $this->db->prepare("INSERT INTO artists(artist, beginnings, albums) VALUES(?, ?, ?)");
        $sentencia->execute(array($artista, $año, $albumes));
    } 
 
    function deleteArtist($artist){
        $sentencia = $this->db->prepare("DELETE FROM artists WHERE artist=?");
        $sentencia->execute(array($artist));
    } 

    function editArtist($artista, $name, $albums, $año){
        $sentencia = $this->db->prepare("UPDATE artists SET `artist`=?, beginnings=?, `albums`=? WHERE `artist`=?");
        $sentencia->execute(array($name, $año, $albums, $artista));
    }
}