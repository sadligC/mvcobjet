<?php

namespace mvcobjet\models\services;
use mvcobjet\models\daos\MovieDao;

class MovieService {
    private $movieDao;

    public function __construct() {
        $this -> movieDao = new MovieDao();
    }

    public function getAllmovies() {
       return $movies = $this ->movieDao ->selectAll();
    }
}


?>