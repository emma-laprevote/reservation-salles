<?php

namespace Controllers;

require('../libraries/Autoloader.php');

class event extends planning {

    protected $modelName = "\Models\Event";

    public function showEvent()
    {
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id_event = $_GET['id'];
        }

        $eventView = $this->model->getAll($id_event);

        //Formatage des date et heure pour l'affichage 
        $dateDeb = explode(' ', $eventView['debut'])[0];
        $dateDebFr = strftime('%d-%m-%Y',strtotime($dateDeb));

        $HourDeb = explode(' ', $eventView['debut'])[1];
        $HourDebForm = date('H:i', strtotime($HourDeb));
        
        $dateEnd = explode(' ', $eventView['fin'])[0];
        $dateEndFr = strftime('%d-%m-%Y',strtotime($dateEnd));

        $HourEnd = explode(' ', $eventView['fin'])[1];
        $HourEndForm = date('H:i', strtotime($HourEnd));

            
            echo "<h2 id='titleRe'>".$eventView['titre']."</h2>
            <li class='nameView'><span class='infoRes'>Réservé par :</span> ".$eventView['login']."</li>
            <li class='nameView'><span class='infoRes'>Date et heure du début de l'évènement :</span> Le ".$dateDebFr." "."à"." ".$HourDebForm."</li>
            <li class='nameView'><span class='infoRes'>Date et heure de fin de l'évènement :</span> Le ".$dateEndFr." "."à"." ".$HourEndForm."</li>
            <li class='nameView'><span class='infoRes'>Description de l'évènement :</span> ".$eventView['description']."</li>";

     
        }
        
    
   

    }

