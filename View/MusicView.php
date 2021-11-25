<?php
require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';

class MusicView {

    private $smarty;

    function __construct(){
       $this->smarty = new Smarty();
    }

    function showHome($rol_user) {
        $this->smarty->assign('rol_user', $rol_user);
        $this->smarty->display('templates/home.tpl');
    }

    function showPagedSongs($songs, $artists, $rol_user, $actual_page, $cant_pag) {
        $this->smarty->assign('titulo', 'Songs List');
        $this->smarty->assign('songs', $songs);
        $this->smarty->assign('rol_user', $rol_user);
        $this->smarty->assign('actual_page', $actual_page);
        $this->smarty->assign('cant_pag', $cant_pag);
        $this->smarty->assign('artists', $artists);
        $this->smarty->display('templates/songsList.tpl');
    }

    function showSongs($songs, $rol_user) {
        $this->smarty->assign('titulo', 'Songs List');
        $this->smarty->assign('songs', $songs);
        $this->smarty->assign('rol_user', $rol_user);
        $this->smarty->display('templates/songsList.tpl');
    }

    function showSong($song, $rol_user) {
        $this->smarty->assign('rol_user', $rol_user);
        $this->smarty->assign('song', $song);
        $this->smarty->assign('titulo', 'Songs details');
        $this->smarty->display('templates/songDetails.tpl');
    }

    function showArtists($artists, $rol_user) {
        $this->smarty->assign('titulo', 'Artists');
        $this->smarty->assign('rol_user', $rol_user);
        $this->smarty->assign('artists', $artists);
        $this->smarty->display('templates/artistsList.tpl');
    }

    function showArtist($artist, $rol_user) {
        $this->smarty->assign('rol_user', $rol_user);
        $this->smarty->assign('titulo', 'Artist data and songs');
        $this->smarty->assign('artist', $artist);
        $this->smarty->display('templates/artistSongs.tpl');
    }

    //ir a locaciones (para actualizar respectiva lista en la q se uso ABM)
    function show_SongList_Location(){
        header("Location: ".BASE_URL."songs");
    }

    //para q me muestre 1ra pag de paginado cuando x ej meto en url pag de paginado q no existe o cuando directamente no paso /pagina/n°
    function show_pagedSongListStart_Location(){
        header("Location: ".BASE_URL."songs/pagina/1");
    }

    function show_ArtistsList_Location(){
        header("Location: ".BASE_URL."artists");
    }

    // function showLoginLocation(){
    //     header("Location: ".BASE_URL."login");
    // }




    function showSearch($artists, $songs, $rol_user, $titulo) {
        $this->smarty->assign('artists', $artists);
        $this->smarty->assign('songs', $songs);
        $this->smarty->assign('rol_user', $rol_user);
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->display('templates/searchList.tpl');
    }


}
