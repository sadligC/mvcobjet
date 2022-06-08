<?php

namespace mvcobjet\controllers;

use mvcobjet\models\services\ActorService;
use mvcobjet\models\services\DirectorService;
use mvcobjet\models\services\MovieService;
use mvcobjet\models\services\CommentService;

class BackController {

    private $actorService;
    private $directorService;
    private $movieService;
    private $commentService;

    public function __construct() {
        $this ->actorService = new ActorService();
        $this ->directorService = new DirectorService();
        $this ->movieService = new MovieService();
        $this ->commentService = new CommentService();
    }

// ------------------------ ACTOR ---------------------------- //
    public function addActor($actorInfo) {
        $this ->actorService ->create($actorInfo);
    }

    public function updateActor($actorUpdt) {
        $this ->actorService ->updateActor($actorUpdt);
    }


// ------------------------ DIRECTOR---------------------------- //
public function addDirector($directorInfo) {
    $this ->directorService ->create($directorInfo);
}

public function updateDirector($directorUpdt) {
    $this ->directorService ->updateDirector($directorUpdt);
}


// -------------------------- MOVIE ------------------------------//
public function updateMovie($movieUpdt) {
    $this ->movieService ->updateMovie($movieUpdt);
}

public function addComment($com) {
    $this ->commentService ->createComment($com);
}

public function deleteComment($id) {
    $this ->commentService ->deleteComment($id);
}

}


?>