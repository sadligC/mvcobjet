<?php

namespace mvcobjet\models\daos;
use mvcobjet\Models\Entities\Comment;
use PDO;

class CommentDao extends BaseDao {

    public function selectMovieComments($id) {
        $sql = "SELECT comment.id, author, mark, content, movie_id FROM comment
                INNER JOIN movie ON movie.id = comment.movie_id
                WHERE  movie_id = ?";
        $stmt = $this ->db ->prepare($sql);
        $result = $stmt ->execute([$id]);
        if ($result) {
            $commentsAr = [];
            while ($comment = $stmt ->fetchObject(Comment::class) ) {
                array_push($commentsAr, $comment);
            }
            return $commentsAr;
        }
    }
    public function selectComment($id) {
        $sql = "SELECT id, author, mark, content, movie_id FROM comment
                WHERE  id = ?";
        $stmt = $this ->db ->prepare($sql);
        $result = $stmt ->execute([$id]);
        if ($result) {
            return $stmt ->fetchObject(Comment::class);
        }
    }

    public function create($com) {
        
        $comment = new Comment();

        $comment ->setId($com['id']);
        $comment ->setAuthor($com['author']);
        $comment ->setMark($com['mark']);
        $comment ->setContent($com['content']);
        $comment ->setMovie_id($com['movie_id']);

        return $comment;
    }

    public function insertComment($com) {
        $author = htmlspecialchars($com ->getAuthor()) ;
        $mark = $com ->getMark();
        $content = htmlspecialchars($com ->getContent()) ;
        $movie_id = $com ->getMovie_Id();

        $sql = "INSERT INTO comment (id, author, mark, content, movie_id) VALUES (NULL, ?, ?, ?, ?)";
        $stmt = $this ->db ->prepare($sql);
        $stmt ->execute([$author, $mark, $content, $movie_id]);
    }

    public function delete($com) {
        $sql = "DELETE FROM comment WHERE id = ?";
        $stmt = $this ->db ->prepare($sql);
        $stmt -> execute([$com ->getId()]);
    }

    public function update($com) {
        $sql = "UPDATE comment SET author = ?, mark = ?, content = ? WHERE id = ?";
        $stmt = $this ->db ->prepare($sql);
        $stmt ->execute([$com ->getAuthor(), $com ->getMark(), $com ->getContent(), $com ->getId()]);
    }
}

?>