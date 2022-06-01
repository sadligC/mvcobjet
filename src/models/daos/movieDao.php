<?php
namespace mvcobjet\models\daos;
use mvcobjet\models\entities\Movie;

class MovieDao extends BaseDao {

    public function selectAll() {
        $sql = "SELECT * FROM movie";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        if ($result) {
            $moviesAr = [];
            while ($movie = $stmt->fetchObject(Movie::class)) {
                array_push ($moviesAr, $movie);
            }
            return $moviesAr;
        }
    }
}


?>