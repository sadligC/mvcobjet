<?php

namespace mvcobjet\models\services;

use mvcobjet\models\daos\ActorDao;

class ActorService {
    private $actorDao;

    public function __construct() {
        $this ->actorDao = new ActorDao();
    }

    public function getAllActors() {
        return $this ->actorDao ->findAll();
    }

    public function getOneActor($id) {
        try {
            return $this ->actorDao ->findById($id);
        }  catch(\Exception $e) {
            print_r($e ->getMessage());
        }
        
    }

    public function create($actorInfo) {
        $actor = $this ->actorDao ->createActor($actorInfo);
        $this ->actorDao ->create($actor);
    }

    public function updateActor($actorInfo) {
        $actor = $this ->actorDao ->createActor($actorInfo);
        $this ->actorDao ->updateActor($actor);
    }

    public function getMovieActors($id) {
      return  $this ->actorDao ->selectMovieActors($id);
    }
}


?>