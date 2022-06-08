<?php

use mvcobjet\models\services\CommentService;

class CommentServiceTest extends \PHPUnit\Framework\TestCase {
    private $commentService;

    protected function setUp():void {
        $this ->commentService = new CommentService();
    }

    public function testDeleteComment() {
        $result = $this ->commentService ->deleteComment(11);
        $this ->assertNull($result);
    }

}