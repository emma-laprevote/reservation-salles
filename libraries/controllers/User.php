<?php

namespace Controllers;

require('../libraries/Autoloader.php');

class user extends controller {

    protected $modelName = "\models\User";

    public function __construct()
    {
        parent::__construct();
    }


    public function getId()
    {
        return($this->model->getId());
    }

    public function getLogin()
    {
        return($this->model->getLogin());
    }

    /**
     * Permet d'inserer un nouveau utilisateur en base de donnée via un formulaire
     */
    public function insert()
    {

            if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {

                    $login = htmlspecialchars($_POST['login']);
                    $password = htmlspecialchars($_POST['password']);
                    $confirm_password = htmlspecialchars($_POST['confirm_password']);

            } else {
                die("<p style='color: white; padding-bottom: 2em';>"."* Votre formulaire a été mal rempli !"."</p>");
            }

            //Si les deux mots de passe sont identique, on crypte le password
            if($password === $confirm_password) {

                $password = password_hash($password, PASSWORD_BCRYPT);

            } else {
                die("<p style='color: white; padding-bottom: 2em';>"."* Les deux mots de passe sont différents"."</p>");
            }
            // On recherche un utilisateur déjà existant dans bdd
            $loginExist = $this->model->find($login);

            //Si utilisateur déjà existant, message erreur 
            if($loginExist) {
                die("<p style='color: white; padding-bottom: 2em';>"."* Ce nom d'utilisateur est déjà utilisé"."</p>");
            }

            // 3. Insertion de l'utilisateur dans la bdd
            $this->model->insert($login, $password, $confirm_password);

            // 4. Redirection 
            \Http::redirect("connexion.php");
    }

    /**
     * Permet de connecter l'utilisateur via un formulaire
     * @return booleen
     */
    public function connect(): bool
    {
           
            if (!empty($_POST['login']) && ($_POST['password'])) 
            {
                $login = htmlspecialchars($_POST['login']);
                $password = htmlspecialchars($_POST['password']);

            } else 
            {
                die("<p style='color: white; padding-bottom: 2em';>"."* Votre formulaire a été mal rempli !"."</p>");
            }

            // On sélectionne le mot de password  de l'utilisateur dans la bdd et le compare au pssword entré dans le formulaire
            $passwordExist = $this->model->verifPassword($login);

            $checkPass = password_verify($password, $passwordExist['password']);

            //Si la vérification n'est pas bonne, message erreur 
            if(!$checkPass)
            {
                die("<p style='color: white; padding-bottom: 2em';>"."* Le nom d'utilisateur ou le mot de passe est incorrect"."</p>");
            }
            // Sinon on connecte l'utilisateur
            $this->model->connect($login, $password);

            return true;

    }

    /**
     * Permet à l'utilisateur de modifier ces information en base de donnée via un formulaire
     */
    public function update ()
    {

        if (!empty($_POST['login']) && ($_POST['password']) && ($_POST['confirm_password'])) 
        {
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            $confirm_password = htmlspecialchars($_POST['confirm_password']);

        } else 
        {
            die("<p style='color: white; padding-bottom: 2em';>"."* Votre formulaire a été mal rempli !"."</p>");
        }

        if($password === $confirm_password) 
        {
            $password = password_hash($password, PASSWORD_BCRYPT);

        } else 
        {
            die("<p style='color: white; padding-bottom: 2em';>"."* Les deux mots de passe sont différents"."</p>");
        }

            $loginExist = $this->model->find($login);
                //echo 'loginexist   '.$loginExist;

            if($loginExist == 1) 
            {
                die("<p style='color: white; padding-bottom: 2em';>"."* Ce nom d'utilisateur est déjà utilisé"."</p>");
                
            }

            $this->model->update($login, $password, $confirm_password);

            // 4. Redirection
            \Http::redirect("connexion.php");
    }

    public function disconnect() {

        $this->model->disconnect();
        session_destroy();
        \Http::redirect("accueil.php");
    }

}