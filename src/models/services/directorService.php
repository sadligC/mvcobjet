<?php

namespace mvcobjet\models\services;
use mvcobjet\Models\daos\DirectorDao;

class DirectorService {
    private $directorDao;

    public function __construct() {
        $this -> directorDao = new DirectorDao();
    }

    public function getAllDirectors() {
       return $directors = $this ->directorDao ->selectAll();
    }
}
?>