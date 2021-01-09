<?php

namespace Models;

class planning extends user {


    public function getAll()
    {
        $bdd = new \PDO('mysql:dbname=reservationsalles;host=localhost', 'root', 'root');

        $req = $bdd->prepare("SELECT reservations.id, reservations.titre, reservations.description, reservations.debut, reservations.fin, reservations.id_utilisateur, utilisateurs.login FROM reservations INNER JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur");
        $req->execute();
        
        $result = $req->fetchAll(\PDO::FETCH_ASSOC);
           
        return $result;
    }

    public function getId ()
    {

        $bdd = new \PDO('mysql:dbname=reservationsalles;host=localhost', 'root', 'root');

        $req = $bdd->prepare("SELECT reservations.id, reservations.titre, reservations.description, reservations.debut, reservations.fin, reservations.id_utilisateur, utilisateurs.login FROM reservations INNER JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur");
        $req->execute();
        $r = array();
        while($d = $req->fetch(\PDO::FETCH_OBJ)){
            $debut = $d->debut;
            $datedeb = new \DateTime($debut);

            $r[$datedeb->format('Y-m-d H:i')] = $d->id;
        }

        return $r;
    }

    public function getEvents(){
        
        $bdd = new \PDO('mysql:dbname=reservationsalles;host=localhost', 'root', 'root');

        $req = $bdd->prepare("SELECT reservations.id, reservations.titre, reservations.description, reservations.debut, reservations.fin, reservations.id_utilisateur, utilisateurs.login FROM reservations INNER JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur");
        $req->execute();
        $r = array();
        while($d = $req->fetch(\PDO::FETCH_OBJ)){
            $debut = $d->debut;
            $datedeb = new \DateTime($debut);

            $r[$datedeb->format('Y-m-d H:i')] = $d->titre .'<br>'.'<span style="font-size: 12px;">Réservé par</span> : '.$d->login;
        }

        return $r;
    }

    public function getEventsEnd(){
        
        $bdd = new \PDO('mysql:dbname=reservationsalles;host=localhost', 'root', 'root');

        $req = $bdd->query("SELECT fin FROM reservations");
        $r = array();
        while($d = $req->fetch(\PDO::FETCH_OBJ)){
            $fin = $d->fin;
            $datefin = new \DateTime($fin);

            $r[$datefin->format('Y-m-d H:i')] = "Fin de la réservation";
        }

        return $r;
    }


}





