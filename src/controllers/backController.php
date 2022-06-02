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
    public function addActor($actorInfo) {
        $this ->actorService ->create($actorInfo);
    }

    public function updateActor($actor) {
        $this ->actorService ->updateActor($actor);
    }


// ------------------------ DIRECTOR---------------------------- //
public function addDirector($directorInfo) {
    $this ->directorService ->create($directorInfo);
}

public function updateDirector($directorInfo) {
    $this ->directorService ->updateDirector($directorInfo);
}

}


?>