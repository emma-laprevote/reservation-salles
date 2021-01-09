<?php

namespace Controllers;

require_once('../libraries/autoload.php');

class planning extends controller {

    protected $modelName = "\Models\Planning";

    public $days = ['',1=>'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    public $hours =  ['08:00','09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];

    public $month;
    public $year;
    public $numbWeek;
    public $day;

    public function __construct()
    {
        parent::__construct();
        $this->month = date("F");
        $this->year = date("Y");
        $this->day = date("w");
        $this->numbweek = date("W");

    }

    /**
     * Permet de générer l'en-tête du planning avec Les jours ecrit en toute lettre + le numero du jour
     */
    public function headTable()
    {
        echo "<th>";

        for($k = 1; $k < 8; $k++) {
            $date = date("d", mktime(0,0,0,date("n"),date("d")-$this->dayAdd()+$k,date("y")));
            $dayy = $this->days[$k];
            
            echo "<th>$dayy<div class='calendar__day'>$date</div>
            </th>";
        }
    }

    /**
     * Permet de générer le body du planning avec l'affichage des réservations ainsi qu'une lien de description si l'utilisateur est connecté.
     */
    public function bodyTable($signUp)
    {

        echo "<tr>";
			foreach($this->hours as $hour) {

                echo "<td>$hour</td>";
            
            
          for($j = 1; $j < 8; $j++) {
            $date = date("Y-m-d $hour", mktime(0,0,0,date("n"),date("d")-$this->day+$j,date("y")));
            

            echo "<td"." ".$date.">";

                $event = $this->model->getEvents();
                $all = $this->model->getId();
                $eventFin = $this->model->getEventsEnd();
                
                if(isset($event[$date])){

                    foreach($event as $key => $e){
                        if($key == $date){
                            echo "<li class='title'>$e</a></li>";
                        }
                    }

                        if(!empty($signUp)) {
                            foreach($all as $keyId => $i){
                                if($keyId == $date){
                                    echo "<a href='../view/reservation.php?id=$i'><button id='but' type='button' class='btn btn-outline-info'>Description</button></a>";
                                }
                            }
                        }
            
                }
                if(isset($eventFin[$date])){
                    foreach($eventFin as $keyFin => $f){
                        if($keyFin == $date) {
                            echo "<div class='title'>$f</div>";
                        }
                    }
                }
                
             

            "</td>";
                }
        echo "</td></tr>"; 
        

    }
    }

    public function dayAdd()
    {
        if (isset($_GET['jour'])){
            $this->day = intval($_GET['jour']);
        }

        return $this->day;
    }

    /**
     * Retourne l'année actuelle
     * @return int
     */
    public function getYear(): int {

        if (isset($_GET['week'])) {

            $this->year = date("Y", mktime(0,0,0,date("n"),date("d")-$this->day+1,date("y")));
        }

        return $this->year;
    }

    /**
     * Retourne le mois en toute lettre 
     * @return string
     */
    public function toString(): string {

        $this->dayAdd();

        if (isset($_GET['week'])){
            $this->month = date("F", mktime(0,0,0,date("n"),date("d")-$this->day+1,date("y")));
        }

        switch($this->month)
        {
            case 'January' : $this->month = 'Janvier'; break;
            case 'February' : $this->month = 'Février'; break;
            case 'March' : $this->month = 'Mars'; break;
            case 'April' : $this->month = 'Avril'; break;
            case 'May' : $this->month = 'Mai'; break;
            case 'June' : $this->month = 'Juin'; break;
            case 'July' : $this->month = 'Juillet'; break;
            case 'August' : $this->month = 'Août'; break;
            case 'September' : $this->month = 'Septembre'; break;
            case 'October' : $this->month = 'October'; break;
            case 'November' : $this->month = 'Novembre'; break;
            case 'December' : $this->month = 'Décembre'; break;
        }

        return $this->month;
    }

    /**
     * Retourne le numero de la semaine
     * @return int
     */
    public function numWeeks (): int
    {
        
        if (isset($_GET['week'])) {

            $this->numbweek = date("W", mktime(0,0,0,date("n"),date("d")-$this->day+1,date("y")));
        }

        return $this->numbweek;
    }

    /** 
    * Retourne la date du premier jour de la semaine
    * @return string
    */
    public function startWeek(): string
    {
        $this->dayAdd();

        $dateBegWeekFr = date("Y-m-d", mktime(0,0,0,date("n"),date("d")-$this->day+1,date("y")));
        $dateBegWeekFr = date("d/m/Y", mktime(0,0,0,date("n"),date("d")-$this->day+1,date("y")));
        
        return $dateBegWeekFr;
    }

    /**
     * Retourne la date du dernier jour de la semaine
     * @return string
     */
    public function endWeek(): string
    {

        $this->dayAdd();

        $dateEndWeekFr = date("Y-m-d", mktime(0,0,0,date("n"),date("d")-$this->day+7,date("y")));
        $dateEndWeekFr = date("d/m/Y", mktime(0,0,0,date("n"),date("d")-$this->day+7,date("y")));

        return $dateEndWeekFr;
    }

    /**
     * Permet de passer à la semaine précédente
     * @return int
     */
    public function previousWeek(): int {

        $this->dayAdd();
 
        if (isset($_GET['week']) == "pre"){
            $this->day = $this->day + 7;
        }

        return $this->day;
    }

    /**
     * Permet de passer à la semaine suivante
     * @return int
     */
    public function nextWeek(): int {

        $this->dayAdd();

        if (isset($_GET['week']) == "next"){
            $this->day = $this->day - 7;
        }

        return $this->day;
    }
  
}

