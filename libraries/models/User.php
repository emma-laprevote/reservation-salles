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
     */
    public function insert(string $login, string $password, string $confirm_password)
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
     */
    public function connect(string $login, string $password)
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
     */
    public function update (string $login, string $password, string $confirm_password)
    {
        $bdd = new \PDO('mysql:dbname=reservationsalles;host=localhost', 'root', 'root');

         //requete afin d'insérer les valeurs du formulaire dans ma base donnée, utilisatiin de bindvalue + sécurité
        $sth = $bdd->prepare("UPDATE utilisateurs SET login= :login, password= :password WHERE id = '$this->id' ");
        $sth->bindValue(':login', $login, \PDO::PARAM_STR);
        $sth->bindValue(':password', $password, \PDO::PARAM_STR);
        $sth->execute()or die(print_r($sth->errorInfo()));;
        
    }


}

