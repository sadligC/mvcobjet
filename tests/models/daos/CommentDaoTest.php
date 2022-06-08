<?php

use mvcobjet\models\daos\CommentDao;
use mvcobjet\Models\Entities\Comment;

class CommentDaoTest extends \PHPUnit\Framework\TestCase {

    private $commentDao;

    protected function setUp():void {
        $this ->commentDao = new CommentDao();
    }

    public function testSelectComment() {
        $result = $this ->commentDao ->selectComment(5);
        $this ->assertInstanceOf(Comment::class, $result);
    }

    public function testDelete() {
        $com = $this ->commentDao ->selectComment(11);
        $result = $this ->commentDao ->delete($com);
        $this ->assertNull($result);
    }

}

?>