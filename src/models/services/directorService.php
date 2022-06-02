<?php

namespace mvcobjet\models\services;
use mvcobjet\Models\daos\DirectorDao;

class DirectorService {
    private $directorDao;

    public function __construct() {
        $this -> directorDao = new DirectorDao();
    }

    public function getAllDirectors() {
       return $this ->directorDao ->selectAll();
    }

    public function getMovieDirector($id) {
        return $this -> directorDao ->selectMovieDirector($id);
    }

    public function create($directorInfo) {
        $director = $this ->directorDao ->createDirector($directorInfo);
        $this ->directorDao ->create($director);
    }

    public function getOneDirector($id) {
        return $this ->directorDao ->findById($id);
    }

    public function updateDirector($directorInfo) {
        $director = $this ->directorDao ->createDirector($directorInfo);
        $this ->directorDao ->updateDirector($director);
    }
}
?>