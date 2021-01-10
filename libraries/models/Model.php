<?php 

namespace Models;

class model {

    public function getBdd ()
    {
        $bdd = new \PDO('mysql:dbname=reservationsalles;host=localhost', 'root', 'root');
        return $bdd;
    }
}