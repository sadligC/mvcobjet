<?php

namespace mvcobjet\controllers;
use mvcobjet\models\services\ActorService;
use mvcobjet\models\services\DirectorService;
use mvcobjet\models\services\MovieService;

class FrontController {
    private $actorService;
    private $directorService;
    private $movieService;

    public function __construct() {
        $this -> actorService = new ActorService();
        $this -> directorService = new DirectorService();
        $this ->movieService = new MovieService();
    }

    // ***** controller actor ****
    public function listeActeurs() {
        return $this -> actorService ->getAllActors();
    }
    public function selectActeur($id) {
        return $this -> actorService ->getOneActor($id);
    }

    // **** controller director ****
    public function directorsList() {
        return $this ->directorService ->getAllDirectors();
    }
       
    // **** controller movie ****
    public function moviesList() {
        return $this ->movieService ->getAllMovies();
    }
    public function getOneMovie($id) {

    }

}

?>