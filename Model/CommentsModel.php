<?php

class CommentsModel{

    private $db;

    public function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_musica2021;charset=utf8', 'root', '');
    }
    


    //-----------------GET------------------//

    public function getComments($songID, $filtro_orden, $mode){
        $query = $this->db->prepare("SELECT * FROM comments WHERE song = ? ORDER BY $filtro_orden $mode");
        $query->execute([$songID]);
        $comments_arr = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments_arr;
    }

    public function getFilteredComments($songID, $filtro_orden, $mode, $filtro_score){
        $query = $this->db->prepare("SELECT * FROM comments WHERE song = ? AND score = ? ORDER BY $filtro_orden $mode");
        $query->execute([$songID, $filtro_score]);
        $comments_arr = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments_arr;
    }

    public function getComment($commentID){
        $query = $this->db->prepare("SELECT * FROM comments WHERE id = ?");
        $query->execute([$commentID]);
        $comment = $query->fetch(PDO::FETCH_OBJ);
        return $comment;
    }



    //-------------------------POST----------------------------//

    public function addComment($comment, $score, $songID, $user){
        $query = $this->db->prepare("INSERT INTO `comments`(`comment`, `score`, `song`, `user`) VALUES(?,?,?, ?)");
        $query->execute(array($comment, $score, $songID, $user));
        return $this->db->lastInsertId();
    }



    //------------DELETE-------------//
    
    public function deleteComment($id){
        $query = $this->db->prepare("DELETE FROM comments WHERE id = ?");
        $query->execute([$id]);
    }



}
