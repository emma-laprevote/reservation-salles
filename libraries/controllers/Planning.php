<?php

namespace Controllers;

require_once('libraries/autoload.php');

class planning extends reservation {

    public $days = ['',1=>'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    public $hours = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];

    public $month;
    public $year;
    public $day;
    public $jour;

    /**
     * 
     * @param int $month Le mois compris entre 1 et 12
     * @param int $year L'année
     * @throws Exception
     */
    public function __construct(?int $day = null, ?int $month = null, ?int $year = null)
    {
        if($day === null){
            $day = intval(date('d'));
        }

        if($month === null){
            $month = intval(date('m'));
        }

        if($year === null){
            $year = intval(date('Y'));
        }

        if($day < 1 || $day > 31)
        {
            throw new \Exception("Le jour de la semaine est incorrect");
        }

        if($month < 1 || $month > 12) {
            throw new \Exception("Le mois $month n'est pas valide");
        }

        if($year < 1970) {
            throw new \Exception("L'année est inférieur à 1970");
        }

        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
        
    }

    /**
     * Retourne le mois en toute lettre en français
     * @return string
     */
    public function toString(): string {

        $nom_mois = date("F");

        switch($nom_mois)
        {
            case 'January' : $nom_mois = 'Janvier'; break;
            case 'February' : $nom_mois = 'Février'; break;
            case 'March' : $nom_mois = 'Mars'; break;
            case 'April' : $nom_mois = 'Avril'; break;
            case 'May' : $nom_mois = 'Mai'; break;
            case 'June' : $nom_mois = 'Juin'; break;
            case 'July' : $nom_mois = 'Juillet'; break;
            case 'August' : $nom_mois = 'Août'; break;
            case 'September' : $nom_mois = 'Septembre'; break;
            case 'October' : $nom_mois = 'Octobre'; break;
            case 'November' : $nom_mois = 'Novembre'; break;
            case 'December' : $nom_mois = 'Décembre'; break;
        }

        return $nom_mois . ' ' . $this->year;
        
    }

    /**
     * Retourne la date du premier jour de la semaine
     * @return string
     */
    public function startWeek (): string {

        $this->jour = date("w");
        $dateBegWeek = date("Y-m-d", mktime(0,0,0,date("n"),date("d")-$this->jour+1,date("y")));
        $dateBegWeek = date("d/m/Y", mktime(0,0,0,date("n"),date("d")-$this->jour+1,date("y")));

        return $dateBegWeek;
    }

    /**
     * Retourne le date du dernier jour de la semaine
     * @return string
     */
    public function endWeek (): string {

        $this->jour = date("w");
        $dateEndWeek = date("Y-m-d", mktime(0,0,0,date("n"),date("d")-$this->jour+7,date("y")));
        $dateEndWeek = date("d/m/Y", mktime(0,0,0,date("n"),date("d")-$this->jour+7,date("y")));
        
        return $dateEndWeek;
    }

    /**
     * Retourne le numéro de la semaine
     * @return int
     */
    public function getWeeks (): int
    {
        $start = new \DateTime("{$this->year}-{$this->month}-{$this->day}");

        $weeks = intval($start->format('W'));
        
        return $weeks;

    }

    public function nextWeek()
    {
        $this->jour = date("w");

        $nextWeek = $this->jour + 7;

        return $nextWeek;
    }

    public function previousWeek()
    {
        $this->jour = date("w");

        $prevWeek = $this->jour - 7;

        return $prevWeek;

    }

    
}