<?php

namespace mvcobjet\controllers;
use mvcobjet\models\services\ActorService;
use mvcobjet\models\services\DirectorService;
use mvcobjet\models\services\MovieService;
use mvcobjet\models\services\GenreService;
use mvcobjet\models\services\CommentService;

class FrontController {
    private $actorService;
    private $directorService;
    private $movieService;
    private $genreService;
    private $commentService;
    private $twig;

  

  

    public function __construct($twig) {
        $this -> actorService = new ActorService();
        $this -> directorService = new DirectorService();
        $this ->movieService = new MovieService();
        $this ->genreService = new GenreService();
        $this ->commentService = new CommentService();
        $this->twig = $twig;
    }

    public function listeActeurs()
  { // recup des acteurs (liste d'objet)
    $result = $this->actorService->getAllActors();
    // compilation twig + acteur = html
    echo $this->twig->render('actor.html.twig', ['actors' => $result]);
  }

    // ***** controller actor ****
    // public function listeActeurs() {
    //     return $this -> actorService ->getAllActors();
    // }
    public function selectActeur($id) {
        return $this -> actorService ->getOneActor($id);
    }
    public function movieCasting($id) {
       return $this ->actorService ->getMovieActors($id);
    }

    // **** controller director ****
    public function directorsList() {
        return $this ->directorService ->getAllDirectors();
    }

    public function movieDirector($id) {
        return $this ->directorService ->getMovieDirector($id);
    }
       
    // **** controller movie ****
    public function moviesList() {
        return $this ->movieService ->getAllMovies();
    }
    public function getOneMovie($id) {
        return $this ->movieService ->getOneMovie($id);
    }

    // **** controller genre ****
    public function movieGenre($id) {
        return $this ->genreService ->getMovieGenre($id);
    }

    // **** controller comment ****
    public function movieComments($id) {
        return $this ->commentService ->getMovieComments($id);
    }

    public function getOneComment($id) {
        
    }

}

?>