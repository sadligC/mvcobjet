<?php

namespace mvcobjet\controllers;
use mvcobjet\models\services\ActorService;

class FrontController {
    private $actorService;

    public function __construct() {
        $this -> actorService = new ActorService();
    }

    public function listeActeurs() {
        return $this -> actorService -> getAllActors();
    }

    public function selectActeur($id) {
        return $this -> actorService -> getOneActor($id);
    }
}

?>