<?php

use mvcobjet\models\daos\MovieDao;
use mvcobjet\models\Entities\Movie;

class MovieDaoTest extends \PHPUnit\Framework\TestCase {
    private $movieDao;

    protected function setUp():void {
        $this ->movieDao = new MovieDao();
    }

    public function testSelectById() {
        $result = $this ->movieDao ->selectById(1);
        $this ->assertInstanceOf(Movie::class, $result);
    }

    public function testSelectTitle() {
        $res = $this ->movieDao ->selectTitle(1)['title'];
        $this ->assertIsString($res);
    }
}

?>