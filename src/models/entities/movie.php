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
    private $genre;
    private $director;
    private $casting;
    private $comments;


    public function getId ():int {
        return $this ->id;
    }
    public function setId(int $id):Movie {
        $this ->id = $id;
        return $this;
    }

    
    public function getTitle():string {
        return $this->title;
    }
    public function setTitle(string $title):Movie {
        $this ->title = $title;
        return $this;
    }

    
    public function getDescription():string {
        return $this->description;
    }
    public function setDescription(string $description):Movie {
        $this ->description = $description;
        return $this;
    }

    
    public function getDuration():string {
        return $this ->duration;
    }
    public function setDuration(string $duration):Movie {
        $this ->duration = $duration;
        return $this;
    }

    
    public function getDate():\DateTime {
        return $this->date;
    } 
    public function setDate(DateTime $date):Movie {
        $this ->date = $date;
        return $this;
    }

     
    public function getCover_image():string {
        return $this ->cover_image;
    } 
    public function setCover_image(string $cover_image):Movie {
        $this ->cover_image = $cover_image;
        return $this;
    }

     
    public function getGenre(): Genre{
        return $this->genre;
    }
    public function setGenre(Genre $genre):Movie {
        $this ->genre = $genre;
        return $this;
    } 


    public function getDirector(): Director{
        return $this->director;
    }
    public function setDirector(Director $director):Movie {
        $this ->director = $director;
        return $this;
    }


    public function getCasting() {
        return $this ->casting;
    }
    public function setCasting($casting) {
        $this ->casting = $casting;
        return $this;
    }
    public function addActor(Actor $actor): void{ 
        $this ->casting[] = $actor;
    }

    
    public function getComments() {
        return $this->comments;
    }
    public function setComments($comments) {
        $this->comments = $comments;
        return $this;
    }
    public function addComment(Comment $comment): void{ 
        $this ->comments[] = $comment;
    }
}




?>