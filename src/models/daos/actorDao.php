<?php
namespace mvcobjet\models\daos;
use mvcobjet\models\entities\Actor;

class ActorDao extends BaseDao {

    public function creeObj ($fields) {
        $acteur = new Actor();
        $acteur->setId($fields['id']);
        $acteur->setFirst_name($fields['first_name']);
        $acteur->setLast_name($fields['last_name']);
        return $acteur;
    }

    public function findAll() {
        $sql = "SELECT * FROM actor";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt;
        if ($result) {
            $actors = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                array_push ($actors, $this->creeObj($row));
            }
            return $actors;

        }
    }

    public function findById ($id) {
        $sql = "SELECT * FROM actor WHERE id = ?";
        $stmt = $this ->db ->prepare ($sql);
        $stmt ->execute([$id]);
        $result = $stmt;
        if ($result) {
           return $stmt -> fetchObject(Actor::class);
        }
    }

    public function create($actor) {
        $sql = "INSERT INTO actor (first_name, last_name) VALUES (?,?)";
        $stmt = $this ->db ->prepare($sql);
        $result= $stmt ->execute([$actor['nom'], $actor['prenom']]);
        if ($result) {
            header('Location:listeActeurs');
            die();
        }
    }

    public function updateActor($actor) {
        $sql = "UPDATE actor SET first_name = ?, last_name = ? WHERE id = ?";
        $stmt = $this ->db ->prepare($sql);
        $result = $stmt ->execute([$actor['prenom'], $actor['nom'], $actor['id']]);
        if ($result) {
            header('Location:updateActeur');
            die();
        }
    }

    public function selectMovieActors($id) {
        $sql = "SELECT actor.id, first_name, last_name FROM actor, movies_actors
                WHERE actor.id = actor_id AND movie_id = ?";
        $stmt = $this ->db ->prepare($sql);
        $result = $stmt ->execute([$id]);
        if ($result) {
            $casting = [];
            while ($actor = $stmt ->fetchObject(Actor::class)) {
                array_push($casting, $actor);
            }
            return $casting;
        }
    }
}


?>