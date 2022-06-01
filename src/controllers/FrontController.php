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

    public function accueil() {
        echo $this ->twig ->render('viewAccueil.html.twig');
    }

    

    // ***** controller actor ****
    public function actorsList() { 
        $actors = $this->actorService->getAllActors();
      }

    public function printActorsList() { 
        $actors = $this->actorService->getAllActors();
        echo $this ->twig ->render('viewActorsList.html.twig', ['actors' => $actors]);
      }
    
    public function printAddActor() {
        echo $this ->twig ->render('viewAddActor.html.twig');
    }

    public function printUpdateActorList() {
        $actors = $this ->actorService ->getAllActors();
        echo $this ->twig ->render('viewUpdateActorList.html.twig', ['actors' => $actors]);
    }

    public function printUpdateActor($id) {
        $actor = $this ->actorService ->getOneActor($id);
        echo $this ->twig ->render('viewUpdateActor.html.twig', ['actor' => $actor]);
    }

    public function selectActor($id) {
        return $this -> actorService ->getOneActor($id);
    }
    public function movieCasting($id) {
       return $this ->actorService ->getMovieActors($id);
    }

    // **** controller director ****
    public function directorsList() {
        $directors =  $this ->directorService ->getAllDirectors();
        echo $this ->twig ->render('viewDirectorsList.html.twig', ['directors' => $directors]);
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