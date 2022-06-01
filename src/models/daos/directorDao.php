<?php

namespace mvcobjet\models\daos;
use mvcobjet\models\entities\Director;

class DirectorDao extends BaseDao {

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
}

?>