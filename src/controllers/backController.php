<?php

namespace mvcobjet\controllers;

use mvcobjet\models\daos\ActorDao;
use mvcobjet\models\daos\MovieDao;

class BackController {

    

    public function listeActeurs () {

        $actordao = new ActorDao ();
        $result = $actordao -> findAll();
        echo "<pre>";
        print_r($result);
        echo "</pre>";

    }

    public function listeFilms () {

        $movdao = new MovieDao ();
        $result = $movdao -> findAll();
        echo "<pre>";
        print_r($result);
        echo "</pre>";

    }

    public function getActor ($id) {
        $actorDao = new ActorDao ();
        $result = $actorDao -> findById($id);
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }
}


?>