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
                
                $debutRes = date('Y-m-d H:i:s', strtotime($debut));
                $finRes = date('Y-m-d H:i:s', strtotime($fin));

            } else 
            {
                die("Votre formulaire a été mal rempli !");
            }

            
            
            $this->model->insertReservation($titre, $description, $debutRes, $finRes, $id);
           
            // 4. Redirection vers l'article en question :

            //\Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
    }

    public function verifDate($date, $debut)
    {
        $dateStart = new \DateTime($date . $debut, new \DateTimeZone("Europe/Paris"));
        $jour_debut = $dateStart->format('N');

        if($jour_debut !== '6' && $jour_debut !== '7')
        {
            $debut = $dateStart->format('Y-m-d H:i:s');
        }
        



    }

}