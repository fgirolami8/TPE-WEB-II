<?php
require_once 'libs/Router.php';
require_once 'Controller/ApiCommentController.php';

$router = new Router();

//pongo songs/id xq necesito saber a q cancion meterle el comment
$router->addRoute('comments/songs/:ID', 'POST', 'ApiCommentController', 'addComment');
$router->addRoute('comments/songs/:ID', 'GET', 'ApiCommentController', 'getComments');
$router->addRoute('comments/:ID', 'DELETE', 'ApiCommentController', 'deleteComment');
//sorting
$router->addRoute('comments/songs/:ID/sort_best_score', 'GET', 'ApiCommentController', 'getComments_best_score');
$router->addRoute('comments/songs/:ID/sort_worst_score', 'GET', 'ApiCommentController', 'getComments_worst_score');
$router->addRoute('comments/songs/:ID/sort_newest_id', 'GET', 'ApiCommentController', 'getComments_newest_id');
$router->addRoute('comments/songs/:ID/sort_oldest_id', 'GET', 'ApiCommentController', 'getComments_oldest_id');

$resource = $_GET['resource'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($resource, $method);
