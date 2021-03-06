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


 // -------------------------------- ACTOR ----------------------------------//
    public function actorsList() { 
        $actors = $this->actorService->getAllActors();
      }

    public function printActorsList() { 
        $actors = $this->actorService->getAllActors();
        echo $this ->twig ->render('viewActorsList.html.twig', ['actors' => $actors]);
      }
    
    public function printAddActor() {
        $status = "Actor";
        $role = "acteur";
        echo $this ->twig ->render('viewAddPerson.html.twig', ['status' =>$status, 'role' =>$role]);
    }

    public function printUpdateActorList() {
        $status = "Actor";
        $role = "acteur";
        $actors = $this ->actorService ->getAllActors();
        echo $this ->twig ->render('viewUpdatePersonList.html.twig', ['persons' => $actors, 'status' =>$status, 'role' =>$role]);
    }

    public function printUpdateActor($id) {
        $status = "Actor";
        $role = "acteur";
        $actor = $this ->actorService ->getOneActor($id);
        echo $this ->twig ->render('viewUpdatePerson.html.twig', ['person' => $actor, 'status' =>$status, 'role' =>$role]);
    }

    public function selectActor($id) {
        return $this -> actorService ->getOneActor($id);
    }
    public function movieCasting($id) {
       return $this ->actorService ->getMovieActors($id);
    }




 // -------------------------------- DIRECTOR ----------------------------------//
 public function printDirectorsList() {
        $directors =  $this ->directorService ->getAllDirectors();
        echo $this ->twig ->render('viewDirectorsList.html.twig', ['directors' => $directors]);
    }

    public function printAddDirector() {
        $status = "Director";
        $role = "r??alisateur";
        echo $this ->twig ->render('viewAddPerson.html.twig', ['status' =>$status, 'role' =>$role]);
    }

    public function printUpdateDirectorList() {
        $status = "Director";
        $role = "r??alisateur";
        $directors = $this ->directorService ->getAllDirectors();
        echo $this ->twig ->render('viewUpdatePersonList.html.twig', ['persons' => $directors, 'status' =>$status, 'role' =>$role]);
    }

    public function printUpdateDirector($id) {
        $status = "Director";
        $role = "r??alisateur";
        $director = $this ->directorService ->getOneDirector($id);
        echo $this ->twig ->render('viewUpdatePerson.html.twig', ['person' => $director, 'status' =>$status, 'role' =>$role]);
    }
    
    public function movieDirector($id) {
        return $this ->directorService ->getMovieDirector($id);
    }
       




 // -------------------------------- MOVIE ----------------------------------//
    public function moviesList() {
        $movies =  $this ->movieService ->getAllMovies();
        echo $this ->twig ->render('viewMoviesList.html.twig', ['movies' =>$movies]);
    }

    public function printOneMovie($id) {
        $movie = $this ->movieService ->getMovieById($id);
        echo $this ->twig ->render('viewMovieById.html.twig', ['movie' =>$movie]);
    }

    public function printUpdateMovieList() {
        $movies = $this ->movieService ->getAllMovies();
        echo $this ->twig ->render('viewUpdateMovieList.html.twig', ['movies' =>$movies]);
    }

    public function printUpdateMovie($movieInfo) {
        $id = $movieInfo['movie'];
        $movie = $this ->movieService ->getMovieById($id);
        $directors = $this ->directorService ->getAllDirectors();
        $actors = $this ->actorService ->getAllActors();
        echo $this ->twig ->render('viewUpdateMovie.html.twig', ['movie' =>$movie, 'directors' =>$directors, 'actors' =>$actors]);
    }

}

?>