<?php

namespace mvcobjet\models\services;

use mvcobjet\models\daos\ActorDao;

class ActorService {
    private $actorDao;

    public function __construct() {
        $this ->actorDao = new ActorDao();
    }

    public function getAllActors() {
        $acteurs = $this ->actorDao ->findAll();
        return $acteurs;
    }

    public function getOneActor($id) {
        $acteur = $this ->actorDao ->findById($id);
        return $acteur;
    }

    public function create($actor) {
        $this ->actorDao ->create($actor);
    }

    public function updateActor($actor) {
        $this ->actorDao ->updateActor($actor);
    }

    public function getMovieActors($id) {
      return  $this ->actorDao ->selectMovieActors($id);
    }
}


?>