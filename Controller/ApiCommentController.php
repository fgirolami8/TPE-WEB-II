<?php
require_once 'Controller/ApiController.php';
require_once 'Helpers/AuthHelper.php';//para verificar rol
require_once('Model/SongsModel.php');//para comprobar si existe musica
require_once('Model/CommentsModel.php');


class ApiCommentController extends ApiController{


    private $helper;
    private $song_model;
    private $comment_model;


    public function __construct() {
        parent:: __construct();
        $this->comment_model = new CommentsModel();
        $this->song_model = new SongsModel();
        $this->helper = new AuthHelper();
    }




    //-----------------POST------------------//


    public function addComment($params = []){
            //compruebo rol
            if($this->helper->rol_state() == -1){
                return $this->view->response("necesitas logiarte para agregar un comentario", 401);
            }
            //compruebo que meppaso parametros
            if(!isset($params[':ID']) || empty($params[':ID'])){
                return $this->view->response("no podemos identificar la cancion sin un parametro id", 400);
            }
            //compruebo q existe cancion
            $songID = $params[':ID'];
            $this->validateSongExistence($songID);
            //me guardo comment usuario 
            $newComment = $this->getData();
            $comment_text = $newComment->comment;
            $score = $newComment->score;
            session_start();
            $user = $_SESSION['user_name'];
            // verifico q me los haya pasado bien
            if(!$newComment || !$this->validateScore($score) || $comment_text == ""){
                return $this->view->response("no has enviado el comentario de la forma correcta", 400);
            }
            //agrego comentario
            $comment_id = $this->comment_model->addComment($comment_text, $score, $songID, $user);
            $comment =  $this->comment_model->getComment($comment_id);
            if(!$comment){
                return $this->view->response("No se ha podido completar tu solicitud", 500);
            }
            $this->view->response("comentario agregado con exito", 200);
    }



    


    //-----------------DELETE------------------//


    public function deleteComment($params = []){
            //compruebo rol
            if($this->helper->rol_state() != 1){
                return $this->view->response("necesitas ser admin para borrar un comentario", 401);
            }
            //compruebo que comment existe (ergo tmb existe cancion xq es fk con on delete cascade)
            $commentID = $params[':ID'];
            $comment = $this->comment_model->getComment($commentID);
            if(!$comment){
                return $this->view->response("no se encontro el comentario que quieres eliminar", 404);
            }
            //borro y compruebo si se borro
            $this->comment_model->deleteComment($commentID);
            if($this->comment_model->getComment($commentID)){
                return $this->view->response("No se ha podido borrar el comentario", 500);
            }
            $this->view->response("Eliminado con exito", 200);
    }




    //-----------------GET------------------//

    public function getComments($params = []){
            //corroboro si me pasa id de la cancion
            if(!(isset($params[':ID']) && !empty($params[':ID']))){
              return $this->view->response("no especificaste la cancion", 400);
            }
            //corroboro existencia de cancion
            $songID = $params[':ID'];
            $this->validateSongExistence($songID);
            //veo si me paso parametros de ordenamiento y me guardo los datos
            if(!( isset($params[':sort_filter']) && isset($params[':sort_mode']) ) || 
                !$this->validateOrder($params[':sort_filter'], $params[':sort_mode'])){
                return $this->view->response("no especificaste ordenamiento valido", 400);
            }
            $sort_filter = $params[':sort_filter'];
            $sort_mode = $params[':sort_mode'];

            //LISTA NO FILTRADA
            if(!isset($params[':score_filter'])){
                $comments_arr = $this->comment_model->getComments($songID, $sort_filter, $sort_mode);
            }
            //LISTA FILTRADA
            else{
                $score = $params[':score_filter'];
                if(!$this->validateScore($score)){
                    return $this->view->response("filtrado no valido", 400);
                }
                $comments_arr = $this->comment_model->getFilteredComments($songID, $sort_filter, $sort_mode, $score);
            }

            return $this->view->response($comments_arr, 200);
    }





    //----------------------AUXILIARES------------------------//

    private function validateScore($score){
        return $score == 1 || $score == 2 || $score == 3 || $score == 4 || $score == 5;
    }

    private function validateOrder($sort_filter, $sort_mode){
      return ($sort_filter == "id" || $sort_filter == "score") &&
          ($sort_mode == "ASC" || $sort_mode == "DESC");
    }

    private function validateSongExistence($songID){
        $song = $this->song_model->getSong($songID);
        if(!$song){
          $this->view->response("no encontramos la cancion", 404);
          die();
        }
    }

}
