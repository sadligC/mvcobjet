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
}

?>
