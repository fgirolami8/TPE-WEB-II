<?php

require_once "./Model/SongsModel.php";
require_once "./Model/CategoriesModel.php";
require_once "./View/MusicView.php";
require_once "./Helpers/AuthHelper.php";

class MusicController {

    private $model_categories;
    private $model_songs;
    private $view;
    private $authHelper;
    private $model_login;

    function __construct(){
        $this->model_categories = new CategoriesModel();
        $this->model_songs = new SongsModel();
        $this->model_login = New LoginModel();
        $this->view = new MusicView();
        $this->authHelper = new AuthHelper();
    }

    //ver home
    function viewHome(){
        $this->view->showHome($this->authHelper->log_state());
    }
    function comprobar_existencia_cancion(){
        //verifico q no halla 2 canciones con igual artista y titulo 
        $songs = $this->model_songs->getSongs();
        foreach($songs as $song){
            if(($_POST['name'] == $song->name) && ($_POST['artist'] == $song->artist)){
                $this->view->show_SongList_Location();//q muestre datos de cancion 
                die();
            }
        }
    }
    //ver canciones
    function viewSongs(){
        $artistasFromDB = $this->model_categories->getArtists();//agarro artistas de DB para q se muestren en selesct
        $songs = $this->model_songs->getSongs();
        $this->view->showSongs($songs, $artistasFromDB, $this->authHelper->log_state());
        
    }
    function viewSong($id){
        $song = $this->model_songs->getSong($id);
        $this->view->showSong($song, $this->authHelper->log_state());
    }

    //ver artistas
    function viewArtists(){
        $artists = $this->model_categories->getArtists();
        //$user = $_SESSION["user_name"]; //esto esta mal ???
        //$rol = $this->model_login->get_db_rol($user); //traigo de DB al rol del usuario
        $this->view->showArtists($artists, /*$rol*/ $this->authHelper->log_state());
    }
    function viewArtist($id){
        $artist = $this->model_categories->getArtist($id);
        $this->view->showArtist($artist, $this->authHelper->log_state());
        //else echo "error"; mostrar error
    }
    
    //ABM
    function addSong(){
        $this->authHelper->checkLoggedIn();
        $user = $_SESSION["user_name"]; //esta mal ??
        $rol = $this->model_login->get_db_rol($user); //traigo usuario con su rol
        if ($rol->rol == true) { //admin == true / user == false
                $this->comprobar_existencia_cancion();
                $this->model_songs->addSong($_POST['name'], $_POST['artist'], $_POST['genre'], $_POST['album'], $_POST['year']);
                $this->view->show_SongList_Location();//muestra lista de canciones actualizada (cumpliria como showHomeLocation)      
                die();
        }
        else {
            $this->view->show_SongList_Location();//consultar a fran
        }
    }
    function addArtist(){
        $this->authHelper->checkLoggedIn();
        $user = $_SESSION["user_name"]; //esta mal ???
        $rol = $this->model_login->get_db_rol($user); //traigo usuario con su rol
        if ($rol->rol == true) { //admin == true / user == false
            $this->model_categories->addArtist($_POST['name'], $_POST['beginnings'], $_POST['albums']);       
            $this->view->show_ArtistsList_Location();//muestra lista de artistas actualizada (cumpliria como showHomeLocation)
            die();
        }
        else {
            $this->view->show_ArtistsList_Location(); //consultar a fran
        }
    }
    //DELETE
    function deleteSong($song){
        $this->authHelper->checkLoggedIn();
        $user = $_SESSION["user_name"]; //esta mal ??
        $rol = $this->model_login->get_db_rol($user); //traigo usuario con su rol
        if ($rol->rol == true) { //admin == true / user == false
            $this->model_songs->deleteSong($song);
            $this->view->show_SongList_Location();//muestra lista de canciones actualizada (cumpliria como showHomeLocation)     
            die();
        }
        else {
            $this->view->show_SongList_Location(); //consultar a fran
        }
    }
    function deleteArtist($artist){
        $this->authHelper->checkLoggedIn();
        $user = $_SESSION["user_name"]; //esta mal ??
        $rol = $this->model_login->get_db_rol($user); //traigo usuario con su rol
        if ($rol->rol == true) { //admin == true / user == false
            $this->model_categories->deleteArtist($artist);
            $this->view->show_ArtistsList_Location();//muestra lista de artistas actualizada (cumpliria como showHomeLocation)       
            die();
        }
        else {
            $this->view->show_ArtistsList_Location(); //consultar a fran
        }
    }
    //EDIT
    function editSong($song){
        $this->authHelper->checkLoggedIn();
        //verifico q no halla 2canciones con igual artista ytitulo
        $user = $_SESSION["user_name"]; //esta mal ?
        $rol = $this->model_login->get_db_rol($user); //traigo usuario con su rol
        if ($rol->rol == true) { //admin == true / user == false
            $this->comprobar_existencia_cancion();
            $this->model_songs->editSong($song, $_POST['name'], $_POST['artist'], $_POST['genre'], $_POST['album'], $_POST['year']);
            $this->view->show_SongList_Location();//q muestre datos de cancion 
            die();
        }
        else {
            $this->view->show_SongList_Location(); //consultar a fran
        }
    }
    function editArtist($artist){
        $this->authHelper->checkLoggedIn();
        $user = $_SESSION["user_name"]; //esta mal ?
        $rol = $this->model_login->get_db_rol($user); //traigo usuario con su rol
        if ($rol->rol == true) { //admin == true / user == false
            $this->model_categories->editArtist($artist, $_POST['name'], $_POST['beginnings'], $_POST['albums']);
            $this->view->show_ArtistsList_Location();//q muestre datos de artista
            die();
        }
        else {
            $this->view->show_ArtistsList_Location();
        }
    }
    
}