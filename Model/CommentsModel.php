<?php

class CommentsModel{

    private $db;

    public function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_musica2021;charset=utf8', 'root', '');
    }

    // SORTED
    public function getComments($songID, $filtro, $mode){
        
        //veo como ordeno
        if($mode == "ASC"){    
            if($filtro == "id")
                $query = $this->db->prepare("SELECT * FROM comments WHERE song = ? ORDER BY id ASC");
            else if($filtro == "score")
                $query = $this->db->prepare("SELECT * FROM comments WHERE song = ? ORDER BY score ASC");
        }
        else if($mode == "DESC"){
            if($filtro == "id")
            $query = $this->db->prepare("SELECT * FROM comments WHERE song = ? ORDER BY id DESC");
            else if($filtro == "score")
            $query = $this->db->prepare("SELECT * FROM comments WHERE song = ? ORDER BY score DESC");
        }

        $query->execute([$songID]);
        $comments_arr = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments_arr;
    }



    public function getComment($commentID){
        $query = $this->db->prepare("SELECT * FROM comments WHERE id = ?");
        $query->execute([$commentID]);
        $comment = $query->fetch(PDO::FETCH_OBJ);
        return $comment;
    }

    //ABM

    public function addComment($comment, $score, $songID){
        $query = $this->db->prepare("INSERT INTO `comments`(`comment`, `score`, `song`) VALUES(?,?,?)");
        $query->execute(array($comment, $score, $songID));
        return $this->db->lastInsertId();
    }

    public function deleteComment($id){
        $query = $this->db->prepare("DELETE FROM comments WHERE id = ?");
        $query->execute([$id]);
    }
}