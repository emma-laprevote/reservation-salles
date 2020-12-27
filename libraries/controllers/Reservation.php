<?php

namespace Controllers;

require_once('libraries/autoload.php');

class reservation extends user {

    protected $modelName = "\models\Reservation";

    public function insertReserve($id)
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
                die("Votre formulaire a été mal rempli !");
            }
            
            if($debutRes !== '6' && $debutRes !== '7')
            {
                if($finRes !== '6' && $finRes !== '7')
                {
                    $finRes = date('Y-m-d H:i:s', strtotime($fin));
                    $debutRes = date('Y-m-d H:i:s', strtotime($debut));

                } else {

                    die("Les réservations sont uniquement du Lundi au Vendredi");
                }
            }

            $deb = substr_replace($debutRes ," ",-9);
            $fi = substr_replace($finRes ," ",-9);

            if($fi != $deb)
            {
                die("Les réservations doivent être comprises sur un jour");
            }

            $verifDispo = $this->model->findHour($debutRes, $finRes);

            if($verifDispo == 1)
            {
                die("Ce créneau horaire est déjà réservé");
            }

            $this->model->insertReservation($titre, $description, $debutRes, $finRes, $id);
            
            // 4. Redirection vers l'article en question :

            //\Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
    }

    

}