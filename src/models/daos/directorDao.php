<?php

namespace mvcobjet\models\daos;
use mvcobjet\models\entities\Director;

class DirectorDao extends BaseDao {

// ---------------- requetes SQL ---------------------------//
    public function selectAll() {
        $sql = "SELECT * FROM director";
        $stmt = $this ->db ->prepare($sql);
        $result = $stmt ->execute();
        if ($result) {
            $directorsAr = [];
            while ($director = $stmt ->fetchObject(Director::class)) {
                array_push ($directorsAr, $director);
            }
            return $directorsAr;
        }
    }

    public function selectMovieDirector($id) {
        $sql = "SELECT director.id, first_name, last_name FROM director
                INNER JOIN movie ON movie.director_id = director.id
                WHERE movie.id = ?";
        $stmt = $this ->db ->prepare($sql);
        $result = $stmt ->execute([$id]);
        if ($result) {
            return $stmt -> fetchObject(Director::class);
        }
    }

    public function create($director) {
        $sql = "INSERT INTO director (first_name, last_name) VALUES (?, ?)";
        $stmt = $this ->db -> prepare($sql);
        $stmt ->execute([$director ->getFirst_name(), $director ->getLast_name()]);
    }

    public function findById($id) {
        $sql = "SELECT * FROM director WHERE id = ?";
        $stmt = $this ->db ->prepare($sql);
        $result = $stmt ->execute ([$id]);
        if ($result) {
            return $stmt -> fetchObject(Director::class);
        }
    }

    public function updateDirector($director) {
        $sql = "UPDATE director SET first_name = ?, last_name = ? WHERE id = ?";
        $stmt = $this ->db ->prepare($sql);
        $stmt ->execute([$director ->getFirst_name(), $director ->getLast_name(), $director ->getId()]); 

    }


// --------------------constructeur objet director ------------------------------ //

public function createDirector($directorInfo) {
    $director = new Director();

    $director -> setId($directorInfo['id']);
    $director -> setLast_name($directorInfo['last_name']);
    $director -> setFirst_name($directorInfo['first_name']);

    return $director;
}
}

?>