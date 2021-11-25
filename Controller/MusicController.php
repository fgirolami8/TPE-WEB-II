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

    public function __construct(){
        $this->model_categories = new CategoriesModel();
        $this->model_songs = new SongsModel();
        $this->view = new MusicView();
        $this->authHelper = new AuthHelper();
    }


    public function viewHome(){
        $this->view->showHome($this->authHelper->rol_state());
    }


    public function viewPagedSongs($page){
      //para q el no logeado no se haga el vivo
        if($this->authHelper->rol_state() == -1){
          return $this->view->show_SongList_Location();
        }
        $cantPaginas = ceil($this->model_songs->getSongsListSize()/SONGS_PER_PAGE);//para saber limite de pag
        //para no permitir la existencia de paginas mas alla de las necesarias lo retorno a pag 1
        if(!is_numeric($page)){
          return $this->view->show_pagedSongListStart_Location();
        }
        if($cantPaginas < $page){
          return $this->view->show_pagedSongListStart_Location();
        }
        $init = ($page-1)*SONGS_PER_PAGE;
        $artistasFromDB = $this->model_categories->getArtists();//agarro artistas de DB para q se muestren en select
        $songs = $this->model_songs->getPageSongs($init, SONGS_PER_PAGE);
        $this->view->showPagedSongs($songs, $artistasFromDB, $this->authHelper->rol_state(), $page, $cantPaginas);

    }

    public function viewSongs(){
      //(cunado escribe en url sin parametros de paginado y siendo usuario/admin) || (cuando toco songs xq x defecto me lleva a viewSongs)
      if($this->authHelper->rol_state() != -1){
        return $this->view->show_pagedSongListStart_Location();//muestro pag 1 de paginado
      }
      $songs = $this->model_songs->getSongs();
      $this->view->showSongs($songs, $this->authHelper->rol_state());
    }

    public function viewSong($id){
        $song = $this->model_songs->getSong($id);
        if($song)
          return $this->view->showSong($song, $this->authHelper->rol_state());
        else //si cancion no existe lo mando a songList (para cuando pone en url un id/palabra inventado)
          $this->view->show_SongList_Location();
    }

    public function viewArtists(){
        $artists = $this->model_categories->getArtists();
        $this->view->showArtists($artists, $this->authHelper->rol_state());
    }

    public function viewArtist($id){
        $id = str_replace("-", " ", $id);
        $artist = $this->model_categories->getArtist($id);
        if($artist){
          $this->view->showArtist($artist, $this->authHelper->rol_state());
        }else{
          $this->view->show_ArtistsList_Location();
        }
    }


    //ADD-------------

    public function addSong(){
        $this->authHelper->checkAdmin();
        //VERIFICO Q ME PASARON PARAMETROS
        if(!$this->validateSongParams())
          return $this->view->show_SongList_Location();     
        //cancion repetida
        if($this->get_repeated_song() != null)
          return $this->view->show_SongList_Location();    
        //con o sin img
        if($this->validateImageExtension())
            $this->model_songs->addSong($_POST['name'], $_POST['artist'], $_POST['genre'], $_POST['album'], $_POST['year'], $this->imagePath());
        else
            $this->model_songs->addSong($_POST['name'], $_POST['artist'], $_POST['genre'], $_POST['album'], $_POST['year']);

        return $this->view->show_SongList_Location();       
    }

    private function imagePath(){
        $path = 'images/songsImages/'. uniqid("", true) . "." . strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
        return $path;
    }



    public function addArtist(){
        $this->authHelper->checkAdmin();
        if(!$this->validateArtistParams())
          return $this->view->show_ArtistsList_Location();    
        //artista repetida
        if($this->get_repeated_artist() != null)
          return $this->view->show_ArtistsList_Location();    
        $this->model_categories->addArtist($_POST['name'], $_POST['beginnings'], $_POST['albums']);
        $this->view->show_ArtistsList_Location();
    }




    //------------DELETE---------//


    public function deleteSong($songID){
        $this->authHelper->checkAdmin();
        $song = $this->model_songs->getSong($songID);
        if(!$song){
          return $this->view->show_SongList_Location();  
        }
        $this->model_songs->deleteSong($songID);
        $this->view->show_SongList_Location();     
    }


    public function deleteArtist($artistName){
        $this->authHelper->checkAdmin();
        $artist = $this->model_categories->getArtist($artistName);
        if(!$artist){
          return $this->view->show_ArtistsList_Location();  
        }
        $this->model_categories->deleteArtist($artistName);
        $this->view->show_ArtistsList_Location();             
    }





    //-----------EDIT-----------//


    public function editSong($songID){
        $this->authHelper->checkAdmin();
        //si la cancion ya existia y no se refiere a la q se esta editando me voy
        if(!$this->validateSongParams())
          return $this->view->show_SongList_Location();
        $song = $this->model_songs->getSong($songID);
        if(!$song){
          return $this->view->show_SongList_Location();      
        }
        if($this->get_repeated_song()!=null && $this->get_repeated_song()->name != $song->name){
            return $this->view->show_SongList_Location();   
        }
        //IMG
        if($this->validateImageExtension()){
            $this->model_songs->editSong($songID, $_POST['name'], $_POST['artist'], $_POST['genre'], $_POST['album'], $_POST['year'], $_FILES['image']['tmp_name']);
        }
        //NO IMG
        else{
            $this->model_songs->editSong($songID, $_POST['name'], $_POST['artist'], $_POST['genre'], $_POST['album'], $_POST['year']);
        }
        return $this->view->show_SongList_Location();
    }



    public function editArtist($artistName){
        $this->authHelper->checkAdmin();
        if(!$this->validateArtistParams())
            return $this->view->show_ArtistsList_Location();  
        $artist = $this->model_categories->getArtist($artistName);
        if(!$artist){
           return $this->view->show_ArtistsList_Location();
        }
        //artista repetida
        if($this->get_repeated_artist() != null && $this->get_repeated_artist()->name != $artist->name)
            return $this->view->show_ArtistsList_Location();
        $this->model_categories->editArtist($artistName, $_POST['name'], $_POST['beginnings'], $_POST['albums']);
        $this->view->show_ArtistsList_Location();//q muestre datos de artista
    }





    //-----------SEARCH-----------//

    public function viewSearch(){
        $this->authHelper->checkLoggedIn();
        $artists = $this->model_categories->getArtists();//para el select del search form
        $this->view->showSearch($artists, null, $this->authHelper->rol_state(), "Complete any of the fields");
    }

    public function filterSongsXfields(){
        $this->authHelper->checkLoggedIn();
        if(!(isset($_POST['name']) && isset($_POST['artist']) && isset($_POST['genre']) && isset($_POST['album']) && isset($_POST['year']))){
          return $this->view->showSearch($artists, null, $this->authHelper->rol_state(), "faltan parametros");
        }
        $artists = $this->model_categories->getArtists();//para el select del search form
        $songs = $this->model_songs->filterSongsXfields($_POST['name'], $_POST['artist'], $_POST['genre'], $_POST['album'], $_POST['year']);
        //chequear si la funcion trajo algo o no 
        if($songs){
            $this->view->showSearch($artists, $songs, $this->authHelper->rol_state(), "Search results");
        }
        else{
            $this->view->showSearch($artists, null, $this->authHelper->rol_state(), "No results found, try again.");
        }
    }





    //------------------AUXILIARES----------------//


    public function validateSongParams(){
      return isset($_POST['name']) && isset($_POST['artist']) && isset($_POST['genre']) && isset($_POST['album']) && isset($_POST['year']) &&
       !empty($_POST['name']) && !empty($_POST['artist']) && !empty($_POST['genre']) && !empty($_POST['album']) && !empty($_POST['year']);
    }


    //retorna cancion repetida, si existe
    public function get_repeated_song(){
        $songs = $this->model_songs->getSongs();
        foreach($songs as $song){
            if(($_POST['name'] == $song->name) && ($_POST['artist'] == $song->artist)){
                return $song;
            }
        }
    }


    public function validateImageExtension(){
        return $_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png";
    }


    public function get_repeated_artist(){
        $artists = $this->model_categories->getArtists();
        foreach($artists as $artist){
            if($_POST['name'] == $artist->name){
                return $artist;
            }
        }
    }


    public function validateArtistParams(){
      return isset($_POST['name']) && isset($_POST['beginnings']) && isset($_POST['albums']) &&
       !empty($_POST['name']) && !empty($_POST['beginnings']) && !empty($_POST['albums']);
    }

}
