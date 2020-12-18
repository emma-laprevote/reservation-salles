<?php

namespace Models;

class reservation extends user {

    /**
    * Fonction qui permet d'inserer dans la table reservation dans la base de donnée
    * @param string $titre, $description, $debut, $fin 
    * @return void
    */
    public function insertReservation(string $titre, string $description, $debutRes, $finRes, $id): void
    {
  
    $bdd = new \PDO('mysql:dbname=reservationsalles;host=localhost', 'root', 'root');

    //requete afin d'insérer les valeurs du formulaire dans ma base donnée, utilisatiin de bindvalue + sécurité
    $request = $bdd->prepare('INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES(:titre, :description, :debut, :fin, :id_utilisateur)');
    $request->bindValue(':titre', $titre, \PDO::PARAM_STR);
    $request->bindValue(':description', $description, \PDO::PARAM_STR);
    $request->bindValue(':debut', $debutRes, \PDO::PARAM_STR);
    $request->bindValue(':fin', $finRes, \PDO::PARAM_STR);
    $request->bindValue(':id_utilisateur', $id, \PDO::PARAM_INT);
    $request->execute()or die(print_r($request->errorInfo()));
    //var_dump($this);
    }

    

}