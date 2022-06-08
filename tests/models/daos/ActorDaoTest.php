<?php

use mvcobjet\models\daos\ActorDao;
use mvcobjet\Models\Entities\Actor;

class ActorDaoTest extends \PHPUnit\Framework\TestCase {

    private $actorDao;
    private $actor;

    protected function setUp():void {
        $this ->actorDao = new ActorDao();
        $this ->actor = new Actor;
    }

    public function testFindById():void {
        $result = $this ->actorDao ->findById(1);
        $this ->assertIsObject($result);
    }

    public function testFindAll():void {
        $result = $this ->actorDao ->findAll();
        $this ->assertIsArray($result);
    }

    public function testCreate():void {
        $actor = [];
        // $actor ->setFirst_name("test");
        // $actor ->setLast_name("test");
        
        $result = $this ->actorDao ->create($actor);
        $this ->assertNull($result);
    }
}