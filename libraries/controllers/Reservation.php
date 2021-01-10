<?php

namespace Controllers;

require('../libraries/Autoloader.php');


class reservation extends user {

    protected $modelName = "\models\Reservation";

    /**
     * Permet d'inserer dans la base de donnée une réservation via un formulaire
     * @param $id 
     */
    public function insertReserve(int $id)
    {   

            if (!empty($_POST['titre']) && ($_POST['description']) && ($_POST['debut']) && ($_POST['hourstart']) && ($_POST['fin']) && ($_POST['hourend'])) 
            {
                $titre = htmlspecialchars($_POST['titre']);
                $description = htmlspecialchars($_POST['description']);
                $debut = $_POST['debut'].' '.$_POST['hourstart'].'00';
                $fin = $_POST['fin'].' '.$_POST['hourend'].'00';

                $debutRes = date('N', strtotime($debut));
                $finRes = date('N', strtotime($fin));
                
            } else 
            {
                die("<p style='color: white; padding-bottom: 2em';>"."* Votre formulaire a été mal rempli !"."</p>");
            }
            
            if($debutRes !== '6' && $debutRes !== '7')
            {
                if($finRes !== '6' && $finRes !== '7') {

                    if($finRes == $debutRes)
                    {

                    $debutRes = date('Y-m-d H:i:s', strtotime($debut));
                    $finRes = date('Y-m-d H:i:s', strtotime($fin));

                    } else {

                        die("<p style='color: white; padding-bottom: 2em';>"."* Les réservations sont sur un jour seulement"."</p>");

                    }

                } 
            }
            else {

                die("<p style='color: white; padding-bottom: 2em';>"."* Les réservations sont uniquement du Lundi au Vendredi et sur un jour seulement"."</p>");
            } 


            $verifDispo = $this->model->findHour($debutRes, $finRes);

            if($verifDispo == 1)
            {
                die("<p style='color: white; padding-bottom: 2em';>"."* Ce créneau horaire est déjà réservé"."</p>");
            }

            $this->model->insertReservation($titre, $description, $debutRes, $finRes, $id);
            
            // 4. Redirection vers l'article en question :

            \Http::redirect("planning.php");
    }

    

}