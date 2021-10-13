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

    function __construct(){
        $this->model_categories = new CategoriesModel();
        $this->model_songs = new SongsModel();
        $this->view = new MusicView();
        $this->authHelper = new AuthHelper();
    }

    //ver home
    function viewHome(){
        $this->view->showHome($this->authHelper->log_state());
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
        $this->view->showArtists($artists, $this->authHelper->log_state());
    }
    function viewArtist($id){
        $artist = $this->model_categories->getArtist($id);
        $this->view->showArtist($artist, $this->authHelper->log_state());
        //else echo "error"; mostrar error
    }
    
    //ABM
    function addSong(){
            $this->authHelper->checkLoggedIn();
            $this->model_songs->addSong($_POST['name'], $_POST['artist'], $_POST['genre'], $_POST['album'], $_POST['year']);
            $this->view->show_SongList_Location();//muestra lista de canciones actualizada (cumpliria como showHomeLocation)     
    }
    function addArtist(){
        $this->authHelper->checkLoggedIn();
        $this->model_categories->addArtist($_POST['name'], $_POST['beginnings'], $_POST['albums']);
        $this->view->show_ArtistsList_Location();//muestra lista de artistas actualizada (cumpliria como showHomeLocation)       
    }
    //DELETE
    function deleteSong($song){
        $this->authHelper->checkLoggedIn();
        $this->model_songs->deleteSong($song);
        $this->view->show_SongList_Location();//muestra lista de canciones actualizada (cumpliria como showHomeLocation)     
    }
    function deleteArtist($artist){
        $this->authHelper->checkLoggedIn();
        $this->model_categories->deleteArtist($artist);
        $this->view->show_ArtistsList_Location();//muestra lista de artistas actualizada (cumpliria como showHomeLocation)       
    }
    //EDIT
    function editSong($song){
        $this->authHelper->checkLoggedIn();
        if(!empty($_POST['name'])&&!empty($_POST['artist'])&&!empty($_POST['genre'])&&!empty($_POST['album'])&&!empty($_POST['year'])){
            $this->model_songs->editSong($song, $_POST['name'], $_POST['artist'], $_POST['genre'], $_POST['album'], $_POST['year']);
            $this->view->show_SongList_Location();//q muestre datos de cancion 
        }
    }
    function editArtist($artist){
        $this->authHelper->checkLoggedIn();
        if(!empty($_POST['name'])&&!empty($_POST['beginnings'])&&!empty($_POST['albums'])){
            $this->model_categories->editArtist($artist, $_POST['name'], $_POST['beginnings'], $_POST['albums']);
            $this->view->show_ArtistsList_Location();//q muestre datos de artista
        }
    }
}