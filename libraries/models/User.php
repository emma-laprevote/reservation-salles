<?php

namespace Models;

require_once('Model.php');

class user extends model {

    private $id;
    public $login;
    public $password;

    /**
     * Function qui permet d'insérer un nouvelle utilisateur
     * @param string $login, $password, $confirm_password
     * @return void 
     */
    public function insert(string $login, string $password, string $confirm_password): void
    {
            $bdd = $this->getBdd();
            //requete afin d'insérer les valeurs du formulaire dans ma base donnée, utilisatiin de bindvalue + sécurité
            $request = $bdd->prepare('INSERT INTO utilisateurs (login, password) VALUES(:login, :password)');
            $request->bindValue(':login', $login, \PDO::PARAM_STR);
            $request->bindValue(':password', $password, \PDO::PARAM_STR);
            $request->execute()or die(print_r($request->errorInfo()));

    }

    public function getId(){
        return $this->id;
    }

    public function getLogin(){
        return $this->login;
    }

    /**
     * Fonction qui permet à l'utilisateur de se connecter, on sélectionne toute les informations dans la base de donnée et on les affectes aux attributs
     * @param string $login string $password
     * @return void
     */
    public function connect(string $login, string $password): void
    {
        
        $bdd = $this->getBdd();

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
        $bdd = $this->getBdd();
         //requete afin d'insérer les valeurs du formulaire dans ma base donnée, utilisatiin de bindvalue + sécurité
        $sth = $bdd->prepare('UPDATE utilisateurs SET login= :login, password= :password WHERE id = "'.$this->id.'" ');
        $sth->bindValue(':login', $login, \PDO::PARAM_STR);
        $sth->bindValue(':password', $password, \PDO::PARAM_STR);
        $sth->execute()or die(print_r($sth->errorInfo()));;
        
    }

    /**
     * Fonction qui permet de vérifié un utilisateurs déjà existant 
     * @param string $login
     * @return bool
     */
    public function find(string $login)
    {
        $bdd = $this->getBdd();
        $count = $bdd->prepare("SELECT COUNT(*) FROM utilisateurs WHERE login = :login");
         $count->execute(['login' => $login]);

        return($item = $count->fetch()[0]);
    }

    /**
     * Fonction qui permet de rechercher le password d'un utilisateur
     * @param string $login
     */
    public function verifPassword(string $login)
    {
        $bdd = $this->getBdd();
        $count = $bdd->prepare("SELECT password FROM utilisateurs WHERE login = '$login'");
        $count->execute();

        $item = $count->fetch();

        return $item;
    }

    public function disconnect()
    {
        $this->id = null;
        $this->login = null;
        $this->password = null;
    }
    

    


}