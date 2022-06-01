<?php

namespace mvcobjet\models\entities;

class Person {
    protected $id;
    protected $first_name;
    protected $last_name;


    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    
    public function getFirst_name(){
        return $this->first_name;
    }
    public function setFirst_name($first_name){
        $this->first_name = $first_name;
        return $this;
    }


    public function getLast_name(){
        return $this->last_name;
    }
    public function setLast_name($last_name){
        $this->last_name = $last_name;
        return $this;
    }
}

?>