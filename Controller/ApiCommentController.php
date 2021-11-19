<?php
require_once 'Controller/ApiController.php';

class ApiCommentController extends ApiController{

    public function __construct() {
        parent:: __construct();
        $this->model = new CommentsModel();
    }

    //POST
    //add comment to song. retorna lista de comentarios
    //comentarios/songs/:ID
    public function addComment($params = []){
        //id de cancion
        $songID = $params[':ID'];
        //comment del fetch
        $newComment = $this->getData();
        $comment_text = $newComment->comment;
        $score = $newComment->score;
        //agrega comm y retorna su id
        $commentID = $this->model->addComment($comment_text, $score, $songID);
        //traigo comm con ese id para devolverlo como cuerpo de response 
        $comment = $this->model->getComment($commentID);
        $this->view->response($comment, 200);
    }
     
    //DELETE
    public function deleteComment($params = []){
        $commentID = $params[':ID'];
        //para saber a q cancion le actualizo los comentarios
        $comment = $this->model->getComment($commentID);
        $songID = $comment->song;
        //borro y traigo comentarios de cancion
        $this->model->deleteComment($commentID);
        $this->view->response("Eliminado con exito", 200);
    }

    //CREO Q HAY Q SACARLA PARA DAR DISTINTOS POSIBLES ERRORES 404, 300, ...
    public function getComments_newest_id($params = []){
        $songID = $params[':ID'];
        $comments_arr = $this->model->getComments($songID, "id", "DESC");
        $this->view->response($comments_arr, 200);//esta bien q retorne la lista de comments? (es para q se actualice lista cuando agrego comm)
    }

    public function getComments_oldest_id($params = []){
        $songID = $params[':ID'];
        $comments_arr = $this->model->getComments($songID, "id", "ASC");
        $this->view->response($comments_arr, 200);
    }

    public function getComments_best_score($params = []){
        $songID = $params[':ID'];
        $comments_arr = $this->model->getComments($songID, "score", "DESC");
        $this->view->response($comments_arr, 200);
    }

    public function getComments_worst_score($params = []){
        $songID = $params[':ID'];
        $comments_arr = $this->model->getComments($songID, "score", "ASC");
        $this->view->response($comments_arr, 200);
    }
    
}
  