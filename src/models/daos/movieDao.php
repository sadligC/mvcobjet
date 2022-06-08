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

    public function selectTitle($id) {
        $sql = "SELECT id, title FROM movie WHERE id = ?";
        $stmt = $this ->db ->prepare($sql);
        $result = $stmt ->execute([$id]);
        if ($result) {
            return $stmt ->fetch(PDO::FETCH_ASSOC);
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


    public function updateMovie($movie) {
        $title = $movie ->getTitle();
        $description = $movie ->getDescription();
        $duration = $movie ->getTitle();
        $date = $movie ->getDate() ->format('Y-m-d');
        $genre_id = $movie ->getGenre() ->getId();
        $director_id = $movie ->getDirector() ->getId();
        $sql = "UPDATE movie SET title = ?, description = ?, duration = ?, date = ?, genre_id = ?, director_id = ? WHERE id = ? ";
        $stmt = $this ->db ->prepare($sql);
        $stmt ->execute([$title, $description, $duration, $date, $genre_id, $director_id, $movie ->getId()]);
    }
}


?>