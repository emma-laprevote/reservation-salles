<?php

namespace Controllers;

require_once('libraries/autoload.php');

class user extends controller {

    protected $modelName = "\models\User";

    
    public function insert()
    {
            /**
            * D'abord, on récupère les informations à partir du POST
            * Ensuite, on vérifie qu'elles ne sont pas nulles
            */
            // On commence par le login
            $login = null;
                if (!empty($_POST['login'])) {
                    $login = htmlspecialchars($_POST['login']);
                }

            // Ensuite le password
            $password = null;
                if (!empty($_POST['password'])) {
                    // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son password
                    $password = htmlspecialchars($_POST['password']);
                }

            // Enfin la confirmation du password
            $confirm_password = null;
                if (!empty($_POST['confirm_password'])) {
                    $confirm_password = htmlspecialchars($_POST['confirm_password']);
                }

            // Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
            if (!$login || !$password || !$confirm_password) {
                die("Votre formulaire a été mal rempli !");
            }

            //Si les deux mots de passe sont identique, on crypte le password
            if($password === $confirm_password) {
                $password = password_hash($password, PASSWORD_BCRYPT);
            } else {
                die("Les deux mots de passe sont différents");
            }
            // On recherche un utilisateur déjà existant dans bdd
            $loginExist = $this->model->find($login);

            //Si utilisateur déjà existant, message erreur 
            if($loginExist) {
                die("Ce nom d'utilisateur est déjà utilisé");
            }

            // 3. Insertion de l'utilisateur dans la bdd
            $this->model->insert($login, $password, $confirm_password);

            // 4. Redirection vers l'article en question :

            //\Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
    }

    public function connect()
    {
            // On commence par le login
            $login = null;
                if (!empty($_POST['login'])) {
                    $login = htmlspecialchars($_POST['login']);
                }

            // Ensuite le password
            $password = null;
                if (!empty($_POST['password'])) {
                    // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son password
                    $password = htmlspecialchars($_POST['password']);
                }

            if (!$login || !$password) {
                die("Votre formulaire a été mal rempli !");
            }

            // On sélectionne le mot de password  de l'utilisateur dans la bdd et le compare au pssword entré dans le formulaire
            $passwordExist = $this->model->verifPassword($login);
            $checkPass = password_verify($password, $passwordExist['password']);

            //Si la vérification n'est pas bonne, message erreur 
            if(!$checkPass)
            {
                die("Le nom d'utilisateur ou le mot de passe est incorrect");
    
            }
            // Sinon on connecte l'utilisateur
            $this->model->connect($login, $password);
            return true;
    }

    public function update ()
    {

            // On commence par le login
            $login = null;
                if (!empty($_POST['login'])) {
                    $login = htmlspecialchars($_POST['login']);
                }

            // Ensuite le password
            $password = null;
                if (!empty($_POST['password'])) {
                    // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son password
                    $password = htmlspecialchars($_POST['password']);
                }

            // Enfin la confirmation du password
            $confirm_password = null;

                if (!empty($_POST['confirm_password'])) {
                    $confirm_password = htmlspecialchars($_POST['confirm_password']);
                }


                if (!$login || !$password || !$confirm_password) {
                    die("Votre formulaire a été mal rempli !");
                }

                if($password === $confirm_password) {
                    $password = password_hash($password, PASSWORD_BCRYPT);
                } else {
                    die("Les deux mots de passe sont différents");
                }

                $loginExist = $this->model->find($login);
                    echo 'loginexist   '.$loginExist;

                if($loginExist == 0) {
                    //die("Ce nom d'utilisateur est déjà utilisé");

                    $this->model->update($login, $password, $confirm_password);
                }

           
             
            // 3. Insertion du commentaire
            

            // 4. Redirection vers l'article en question :

            //\Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
    }
}