<?php

    require_once './Controller/MusicController.php';
    require_once './Controller/LoginController.php';
    require_once './Controller/UsersController.php';


    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    define('SONGS_PER_PAGE', 10);


    if(!empty($_GET['action'])){
        $action = $_GET['action'];
    }
    else{
        $action = 'home';
    }

    $params = explode('/', $action);

    $musicController = new MusicController();
    $loginController = new LoginController();
    $usersController = new UsersController();
    $helper = new AuthHelper();

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

        //register
        case 'register':
            $loginController->viewRegister();
            break;
        case 'registercheck':
            $loginController->registerUser();
            break;

        //musica
        case 'home':
            $musicController->viewHome();
            break;

        case 'songs':
            //cuando toco en songs o paso url sin parametros de paginado
            if(!isset($params[1])){
              $musicController->viewSongs();
            }
            else if($params[1] == "pagina" && isset($params[2])){
              $musicController->viewPagedSongs($params[2]);
            }
            //parametro 1 seteado y no es "pagina" lo tomo como q me quiso pasar un id
            else{
              $musicController->viewSong($params[1]);
            }
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
            $musicController->editSong($params[1]);
            break;
        case 'deleteSong':
            $musicController->deleteSong($params[1]);
            break;
        case 'deleteArtist':
            $musicController->deleteArtist($params[1]);
            break;
        case 'addArtist':
            $musicController->addArtist();
            break;
        case 'editArtist':
            $musicController->editArtist($params[1]);
            break;
            
        //filter
        case 'search':
            $musicController->viewSearch();
            break;
        case 'results':
            $musicController->filterSongsXfields();//nueva funcion de filtrado
            break;

        //users
        case 'users':
            $usersController->viewUsers();
            break;
        case 'deleteUser':
            $usersController->deleteUser($params[1]);
            break;
        case 'changeRolUser':
            $usersController->changeRolUser($params[1]);
            break;
        default:
            echo '404 ERROR page not found';
            break;
    }
