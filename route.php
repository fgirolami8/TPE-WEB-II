<?php

    require_once './Controller/MusicController.php';
    require_once './Controller/LoginController.php';


    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    
    
    if(!empty($_GET['action'])){
        $action = $_GET['action'];
    }
    else{
        $action = 'home';
    }
    
    $params = explode('/', $action);

    $musicController = new MusicController();
    $loginController = new LoginController();

    switch ($params[0]) {
        //login
        case 'login':
            $loginController->viewLogin();
            break;
        case 'authentify':
            $loginController->authentify();
            break;
        case 'logout':
            $loginController->logout();
            break;
        //musica
        case 'home':
            $musicController->viewHome();
            break;
        case 'songs':
            if(empty($params[1]))
                $musicController->viewSongs();
            else 
                $musicController->viewSong($params[1]);
            break;
        case 'artists':
            if(empty($params[1]))
                $musicController->viewArtists();
            else 
                $musicController->viewArtist($params[1]);
            break;
        case 'addSong':
            $musicController->addSong();
            break;
        case 'editSong':
            $musicController->editSong($params[1]);//
            break;
        case 'deleteSong':
            $musicController->deleteSong($params[1]);//
            break;
        case 'deleteArtist':
            $musicController->deleteArtist($params[1]);//
            break;
        case 'addArtist':
            $musicController->addArtist();
            break;
        case 'editArtist':
            $musicController->editArtist($params[1]);//
            break;
        // case 'register':
        //     $loginController->register();
        default:
            echo '404 ERROR page not found';
            break;
    }