<?php
namespace mvcobjet\models\daos;
use mvcobjet\models\entities\Movie;
use PDO;

class MovieDao extends BaseDao {

    public function selectTitles() {
        $sql = "SELECT title FROM movie";
        $stmt = $this ->db ->prepare($sql);
        $result = $stmt ->execute();
        if ($result) {
            $moviesAr = [];
            while ($title = $stmt ->fetch(PDO::FETCH_ASSOC)) {
                array_push ($moviesAr, $title);
            }
            return $moviesAr;
        }
    }

    public function selectById($id) {
        $sql = "SELECT * FROM movie WHERE id = ?";
        $stmt = $this-> db ->prepare($sql);
        $result = $stmt ->execute([$id]);
        if ($result) {
            return $stmt ->fetchObject(Movie::class);
        }
    }
}


?>