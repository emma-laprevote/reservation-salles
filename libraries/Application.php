<?php
require('Control.php');
require_once('../libraries/autoload.php');

class Applications {

    public static function process() {

    try {
        if (isset($_GET['action'])) {

            if ($_GET['action'] == 'accueil') {
                    accueil();
            }
        
        }else {
            accueil();  // action par défaut
        }

    }catch (Exception $e) {
            $e->getMessage();
    }

    }

}
