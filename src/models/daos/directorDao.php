<?php

namespace mvcobjet\models\daos;
use mvcobjet\models\entities\Director;

class DirectorDao extends BaseDao {

    public function selectAll() {
        $sql = "SELECT * FROM director";
        $stmt = $this ->db ->prepare($sql);
        $result = $stmt -> execute();
        if ($result) {
            $directorsAr = [];
            while ($director = $stmt ->fetchObject(Director::class)) {
                array_push ($directorsAr, $director);
            }
            return $directorsAr;
        }
    }
}

?>