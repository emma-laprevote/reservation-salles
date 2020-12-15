<?php 

namespace models;

abstract class model {
    
    protected $table;

    /**
     * Fonction qui permet de vérifié un utilisateurs déjà existant 
     * @param string $login
     * @return bool
     */
    public function find(string $login)
    {
        $bdd = new \PDO('mysql:dbname=reservationsalles;host=localhost', 'root', 'root');
        $count = $bdd->prepare("SELECT COUNT(*) FROM {$this->table} WHERE login = :login");
         $count->execute(['login' => $login]);

        
        return($item = $count->fetch()[0]);

    }

    /**
     * Fonction qui permet de rechercher le password d'un utilisateur
     * @param string $login
     */
    public function verifPassword(string $login)
    {
        $bdd = new \PDO('mysql:dbname=reservationsalles;host=localhost', 'root', 'root');
        $count = $bdd->prepare("SELECT password FROM {$this->table} WHERE login = '$login'");
        $count->execute();

        $item = $count->fetch();

        return $item;
    }
}