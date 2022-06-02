<?php
namespace mvcobjet\models\daos;

use DateTime;
use mvcobjet\models\entities\Movie;
use PDO;

class MovieDao extends BaseDao {

    public function selectTitles() {
        $sql = "SELECT id, title FROM movie";
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
        if ($stmt ->execute([$id])) {
            $movieInfo = $stmt ->fetch(PDO::FETCH_ASSOC);
            return $this ->createMovie($movieInfo);
        }
    }


    public function createMovie($movieInfo) {
        $movie = new Movie();
        $date = new DateTime($movieInfo['date']);

        $movie ->setId($movieInfo['id']);
        $movie ->setTitle($movieInfo['title']);
        $movie ->setDescription($movieInfo['description']);
        $movie ->setDuration($movieInfo['duration']);
        $movie ->setDate($date);
        $movie ->setCover_image($movieInfo['cover_image']);
    
    
        return $movie;
    }
}


?>