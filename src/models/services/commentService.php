<?php

namespace mvcobjet\models\services;
use mvcobjet\models\daos\CommentDao;

class CommentService {
    private $commentDao;

    public function __construct() {
        $this ->commentDao = new CommentDao();
    }

    public function getMovieComments($id) {
        return $this ->commentDao ->selectMovieComments($id);
    }

    public function createComment($com) {
        $comment = $this ->commentDao -> create($com);
        $this ->commentDao ->insertComment($comment);
    }

    public function deleteComment($id) {
        $comment = $this ->commentDao -> selectComment($id);
        $this ->commentDao ->delete($comment);
    }
}

?>
