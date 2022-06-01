<?php

namespace mvcobjet\models\daos;
use mvcobjet\Models\Entities\Comment;

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
}

?>