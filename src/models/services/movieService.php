<?php

namespace mvcobjet\models\services;
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
}


?>