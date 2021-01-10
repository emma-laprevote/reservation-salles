<?php

namespace Models;

class event extends planning {

    public function getAll($id_event)
    {
        $bdd = $this->getBdd();

        $req = $bdd->prepare("SELECT reservations.id, reservations.titre, reservations.description, reservations.debut, reservations.fin, reservations.id_utilisateur, utilisateurs.login FROM reservations INNER JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur WHERE reservations.id = :id");
        $req->execute(['id' => $id_event]);

        // On fouille le résultat pour en extraire les données réelles de l'article
        $item = $req->fetch(\PDO::FETCH_ASSOC);

        return $item;
    }

}