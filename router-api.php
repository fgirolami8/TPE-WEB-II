<?php

require_once 'libs/Router.php';
require_once 'Controller/ApiCommentController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');



$router = new Router();



$router->addRoute('comments/songs/:ID', 'POST', 'ApiCommentController', 'addComment');
$router->addRoute('comments/:ID', 'DELETE', 'ApiCommentController', 'deleteComment');

//get sorted comments
$router->addRoute('comments/songs/:ID/:sort_filter/:sort_mode', 'GET', 'ApiCommentController', 'getComments');

//filtering
$router->addRoute('comments/songs/:ID/:sort_filter/:sort_mode/:score_filter', 'GET', 'ApiCommentController', 'getComments');


$resource = $_GET['resource'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($resource, $method);
