<?php

namespace mvcobjet\Models\Entities;

class Comment {
    private $id;
    private $author;
    private $mark;
    private $content;
    private $movie_id;
    
      
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
        return $this;
    }


    public function getAuthor(){
        return $this->author;
    }
    public function setAuthor($author){
        $this->author = $author;
        return $this;
    }


    public function getMark(){
        return $this->mark;
    }
    public function setMark($mark){
        $this->mark = $mark;
        return $this;
    }

    
      
    public function getContent(){
        return $this->content;
    }
    public function setContent($content){
        $this->content = $content;
        return $this;
    }
      
      
    public function getMovie_id(){
        return $this->movie_id;
    }
    public function setMovie_id($movie_id){
        $this->movie_id = $movie_id;
        return $this;
    }
}


?>