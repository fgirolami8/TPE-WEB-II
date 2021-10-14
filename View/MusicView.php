<?php
require_once 'libs/smarty-3.1.39/libs/Smarty.class.php';

class MusicView {

    private $smarty;

    function __construct(){
       $this->smarty = new Smarty();
    }

    function showHome($log_state) {
        $this->smarty->assign('log_state', $log_state);
        $this->smarty->display('templates/home.tpl');
    }

    function showSongs($songs, $artists, $log_state) {
        $this->smarty->assign('titulo', 'Songs List');
        $this->smarty->assign('songs', $songs);
        $this->smarty->assign('log_state', $log_state);
        $this->smarty->assign('artists', $artists);
        $this->smarty->display('templates/songsList.tpl');
    }

    function showSong($song, $log_state) {
        $this->smarty->assign('log_state', $log_state);
        $this->smarty->assign('song', $song);
        $this->smarty->assign('titulo', 'Songs details');
        $this->smarty->display('templates/songDetails.tpl');
    }

    function showArtists($artists, $log_state) {
        $this->smarty->assign('titulo', 'Artists');
        $this->smarty->assign('log_state', $log_state);
        $this->smarty->assign('artists', $artists);
        $this->smarty->display('templates/artistsList.tpl');
    }

    function showArtist($artist, $log_state) {
        $this->smarty->assign('log_state', $log_state);
        $this->smarty->assign('titulo', 'Artist data and songs');
        $this->smarty->assign('artist', $artist);
        $this->smarty->display('templates/artistSongs.tpl');
    }

    //ir a locaciones (para actualizar respectiva lista en la q se uso ABM)
    function show_SongList_Location(){
        header("Location: ".BASE_URL."songs");
    }

    function show_ArtistsList_Location(){
        header("Location: ".BASE_URL."artists");
    }

    // function showLoginLocation(){
    //     header("Location: ".BASE_URL."login");
    // }
}