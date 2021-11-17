<?php
require_once 'libs/Router.php';
require_once 'Controller/ApiSongController.php';

$router = new Router();

$router->addRoute('songs', 'GET', 'ApiSongController', 'getSongs');
$router->addRoute('songs/:ID', 'GET', 'ApiSongController', 'getSong');
// $router->addRoute('songs/:ID', 'DELETE', 'ApiSongController', 'deleteSong');
// $router->addRoute('songs', "POST", 'ApiSongController', 'addSong');
// $router->addRoute('songs/:ID', "PUT", 'ApiSongController', 'updateSong');

$resource = $_GET['resource'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($resource, $method);
