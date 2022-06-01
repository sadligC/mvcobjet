<?php

namespace mvcobjet\models\daos;
use mvcobjet\models\entities\Genre;

class GenreDao extends BaseDao {

    public function selectMovieGenre($id) {
        $sql = "SELECT genre.id, genre.name FROM genre INNER JOIN movie ON movie.genre_id = genre.id
                WHERE movie.id = ?";
        $stmt = $this ->db ->prepare($sql);
        $result = $stmt ->execute([$id]);
        if ($result) {
            return $stmt ->fetchObject(Genre::class);
        }
    }
}

?>