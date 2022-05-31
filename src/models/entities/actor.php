<?php

namespace mvcobjet\Models\Entities;

class Actor {
    private $id;
    private $first_name;
    private $last_name;

    public function getId () {
        return $this -> id;
    }
    public function setId($id) {
        $this -> id =  $id;
        return $this;
    }

    public function getFirst_name () {
        return $this -> first_name;
    }
    public function setFirst_name($fn) {
        $this -> first_name =  $fn;
        return $this;
    }

    public function getLast_name () {
        return $this -> last_name;
    }
    public function setLast_name($ln) {
        $this -> last_name = $ln;
        return $this;
    }
}

?>