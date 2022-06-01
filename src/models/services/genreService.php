<?php

namespace mvcobjet\models\services;
use mvcobjet\models\daos\GenreDao;

class GenreService {
    private $genreDao;

    public function __construct() {
        $this ->genreDao = new GenreDao();
    }

    public function getMovieGenre($id) {
        return $this ->genreDao ->selectMovieGenre($id);
    }
}

?>