<?php

namespace models;

class user extends model {

    protected $table = "utilisateurs";

    protected $id;
    public $login;
    public $password;

    /**
     * Function qui permet d'insérer un nouvelle utilisateur
     * @param string $login, $password, $confirm_password
     * @return void 
     */
    public function insert(string $login, string $password, string $confirm_password): void
    {
        $bdd = new \PDO('mysql:dbname=reservationsalles;host=localhost', 'root', 'root');
            //requete afin d'insérer les valeurs du formulaire dans ma base donnée, utilisatiin de bindvalue + sécurité
            $request = $bdd->prepare('INSERT INTO utilisateurs (login, password) VALUES(:login, :password)');
            $request->bindValue(':login', $login, \PDO::PARAM_STR);
            $request->bindValue(':password', $password, \PDO::PARAM_STR);
            $request->execute()or die(print_r($request->errorInfo()));

    } 

    /**
     * Fonction qui permet à l'utilisateur de se connecter, on sélectionne toute les informations dans la base de donnée et on les affectes aux attributs
     * @param string $login string $password
     * @return void
     */
    public function connect(string $login, string $password): void
    {
        
        $bdd = new \PDO('mysql:dbname=reservationsalles;host=localhost', 'root', 'root');

            $validPass = $bdd->prepare("SELECT * FROM utilisateurs WHERE login='$login'");
            $validPass->execute();
            $result = $validPass->fetch(\PDO::FETCH_OBJ);

                $this->id = $result->id;
                $this->login = $result->login;
                $this->password = $result->password;
            
    }

    /**
     * Function qui permet de modifié les informations dans la base de donnée
     * @param string $login string $password, string $confirm_password
     * @return void
     */
    public function update (string $login, string $password, string $confirm_password): void
    {
        $bdd = new \PDO('mysql:dbname=reservationsalles;host=localhost', 'root', 'root');

         //requete afin d'insérer les valeurs du formulaire dans ma base donnée, utilisatiin de bindvalue + sécurité
        $sth = $bdd->prepare("UPDATE utilisateurs SET login= :login, password= :password WHERE id = '$this->id' ");
        $sth->bindValue(':login', $login, \PDO::PARAM_STR);
        $sth->bindValue(':password', $password, \PDO::PARAM_STR);
        $sth->execute()or die(print_r($sth->errorInfo()));;
        
    }

    /**
     * Fonction qui permet d'inserer dans la table reservation dans la base de donnée
     * @param string $titre, $description, $debut, $fin 
     * @return void
     */
    public function insertReservation(string $titre, string $description, string $debut, string $fin): void
    {
       
        $bdd = new \PDO('mysql:dbname=reservationsalles;host=localhost', 'root', 'root');

        //requete afin d'insérer les valeurs du formulaire dans ma base donnée, utilisatiin de bindvalue + sécurité
        $request = $bdd->prepare('INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES(:titre, :description, :debut, :fin, :id_utilisateur)');
        $request->bindValue(':titre', $titre, \PDO::PARAM_STR);
        $request->bindValue(':description', $description, \PDO::PARAM_STR);
        $request->bindValue(':debut', $debut, \PDO::PARAM_STR);
        $request->bindValue(':fin', $fin, \PDO::PARAM_STR);
        $request->bindValue(':id_utilisateur', $this->id, \PDO::PARAM_INT);
        $request->execute()or die(print_r($request->errorInfo()));
    }


}

