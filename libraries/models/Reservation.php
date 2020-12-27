<?php

namespace Models;

class reservation extends user {

    /**
    * Fonction qui permet d'inserer dans la table reservation dans la base de donnée
    * @param string $titre, $description, $debut, $fin 
    * @return void
    */
    public function insertReservation(string $titre, string $description, $debut, $fin, $id): void
    {
  
    $bdd = new \PDO('mysql:dbname=reservationsalles;host=localhost', 'root', 'root');

    //requete afin d'insérer les valeurs du formulaire dans ma base donnée, utilisatiin de bindvalue + sécurité
    $request = $bdd->prepare('INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES(:titre, :description, :debut, :fin, :id_utilisateur)');
    $request->bindValue(':titre', $titre, \PDO::PARAM_STR);
    $request->bindValue(':description', $description, \PDO::PARAM_STR);
    $request->bindValue(':debut', $debut, \PDO::PARAM_STR);
    $request->bindValue(':fin', $fin, \PDO::PARAM_STR);
    $request->bindValue(':id_utilisateur', $id, \PDO::PARAM_INT);
    $request->execute()or die(print_r($request->errorInfo()));
    //var_dump($this);
    }

    public function findHour($debutRes, $finRes)
    {
        $bdd = new \PDO('mysql:dbname=reservationsalles;host=localhost', 'root', 'root');

        $count = $bdd->prepare("SELECT COUNT(*) FROM reservations WHERE '".$debutRes."' BETWEEN debut AND fin OR '".$finRes."' BETWEEN debut AND fin");
        $count->execute();
        

        return ($item = $count->fetch()[0]);


        
      
 

        
 
        

        /*$count = $bdd->prepare("SELECT COUNT(*) FROM utilisateurs WHERE login = :login");
         $count->execute(['login' => $login]);

        return($item = $count->fetch()[0]);*/

    }

}