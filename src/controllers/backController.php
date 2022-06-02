<?php

namespace mvcobjet\controllers;

use mvcobjet\models\services\ActorService;
use mvcobjet\models\services\DirectorService;

class BackController {

    private $actorService;
    private $directorService;

    public function __construct() {
        $this ->actorService = new ActorService();
        $this ->directorService = new DirectorService();
    }

// ------------------------ ACTOR ---------------------------- //
    public function addActor($actor) {
        $this ->actorService ->create($actor);
    }

    public function updateActor($actor) {
        $this ->actorService ->updateActor($actor);
    }


// ------------------------ DIRECTOR---------------------------- //
public function addDirector($director) {
    $this ->directorService ->create($director);
}

public function updateDirector($director) {
    $this ->directorService ->updateDirector($director);
}

}


?>