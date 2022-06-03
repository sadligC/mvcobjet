<?php

namespace mvcobjet\models\services;

use DateTime;
use mvcobjet\models\daos\MovieDao;
use mvcobjet\models\daos\ActorDao;
use mvcobjet\models\daos\DirectorDao;
use mvcobjet\models\daos\GenreDao;
use mvcobjet\models\daos\CommentDao;

class MovieService {
    private $movieDao;
    private $actorDao;
    private $directorDao;
    private $genreDao;
    private $commentDao;

    public function __construct() {
        $this -> movieDao = new MovieDao();
        $this -> actorDao = new ActorDao();
        $this -> directorDao = new DirectorDao();
        $this -> genreDao = new GenreDao();
        $this -> commentDao = new CommentDao();
    }

    public function getAllmovies() {
       return $movies = $this ->movieDao ->selectTitles();
    }

    public function getMovieById($id) {
        $movie = $this ->movieDao ->selectById($id);
        $casting = $this ->actorDao ->selectMovieActors($id);
        $director = $this ->directorDao ->selectMovieDirector($id);
        $genre = $this ->genreDao ->selectMovieGenre($id);
        $comments = $this ->commentDao ->selectMovieComments($id);

        $movie ->setCasting($casting);
        $movie ->setDirector($director);
        $movie ->setGenre($genre);
        $movie ->setComments($comments);

        return $movie;
    }

    public function updateMovie($updt) {
        $movie = $this ->getMovieById($updt['id']);
        if ($updt['add-actor'] != "null") {
            $addActor = $this ->actorDao ->findById($updt['add-actor']);
        }
        if ($updt['del-actor'] != "null") {
            $delActor = $this ->actorDao ->findById($updt['del-actor']);
        }
        if ($updt['director'] != $movie ->getDirector() ->getId()) {
            $director = $this ->directorDao ->findById($updt['director']);
        }
        
        
        if ($updt['title'] != $movie ->getTitle()) {
            $movie ->setTitle($updt['title']);
        }
        if ($updt['date'] != "") {
            $date = new DateTime($updt['date']);
            if ($date != $movie ->getDate()) {
                $movie ->setDate($date);
            }
        }
        if ($updt['duration'] != $movie ->getDuration()) {
            $movie ->setDuration($updt['duration']);
        }
        if  ($updt['description'] != $movie ->getDescription()) {
            $movie ->setDescription(htmlspecialchars($updt['description']));
        }
        if (isset($director)) {
            $movie ->setDirector($director);
        }
        if (isset($addActor)) {
            $movie ->addActor($addActor);
            $movie ->movieDao ->addactorMovie($addActor ->getId(), $movie ->getId());
        }
        if (isset($delActor)) {
            $movie ->removeActor($delActor);
        }

        echo"<pre>";print_r($movie);echo"</pre>";die();
    }
}


?>