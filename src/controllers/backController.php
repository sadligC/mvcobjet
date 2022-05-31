<?php

namespace mvcobjet\controllers;

use mvcobjet\models\services\ActorService;

class BackController {

    private $actorService;

    public function __construct() {
        $this->actorService = new ActorService();
    }

    public function addActor($actor) {
        $this->actorService->create($actor);
    }

    public function updateActor($actor) {
        $this->actorService->updateActor($actor);
    }

}


?>