<?php
namespace mvcobjet\models\daos;
use mvcobjet\models\entities\Movie;

class MovieDao extends BaseDao {

    public function creeObj ($fields) {
        $movie = new Movie();
        $movie->setId($fields['id']);
        $movie->setTitle($fields['title']);
        $movie->setDescription($fields['description']);
        $movie->setDuration($fields['duration']);
        $movie->setDate($fields['date']);
        $movie->setCover($fields['cover_image']);
        $movie->setGenre_id($fields['genre_id']);
        $movie->setDirector_id($fields['director_id']);
        return $movie;
    }

    public function findAll() {
        $sql = "SELECT * FROM movie";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        if ($result) {
            $movies = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                // $actors = $this->creeObj ($row);
                array_push ($movies, $this->creeObj($row));
            }
            return $movies;
        }
    }
}


?>