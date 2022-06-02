<?php

namespace mvcobjet\Models\Entities;
use DateTime;

class Movie {
    private $id;
    private $title;
    private $description;
    private $duration;
    private $date;
    private $cover_image;
    private $genre_id;
    private $director_id;


    public function getId () {
        return $this -> id;
    }
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    
    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title;
        return $this;
    }

    
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
        return $this;
    }

    
    public function getDuration(){
        return $this->duration;
    }
    public function setDuration($duration){
        $this->duration = $duration;
        return $this;
    }

    
    public function getDate(){
        return $this->date;
    } 
    public function setDate($date){
        $this->date = $date;
        return $this;
    }

     
    public function getCover_image(){
        return $this->cover_image;
    } 
    public function setCover_image($cover_image){
        $this->cover_image = $cover_image;
        return $this;
    }

     
    public function getGenre_id(){
        return $this->genre_id;
    }
    public function setGenre_id($genre_id)
    {
        $this->genre_id = $genre_id;
        return $this;
    } 


    public function getDirector_id(){
        return $this->director_id;
    }
    public function setDirector_id($director_id){
        $this->director_id = $director_id;
        return $this;
    }
}




?>