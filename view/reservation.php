<?php
require_once('../libraries/autoload.php');
session_start();
$signUp = $_SESSION['user'];
$event = new \Controllers\event();
?>

<?php $pageTitle = 'Le manoir'; ?>

<?php ob_start(); ?>

<main id="mainPlanning2">

    <div id="titleResa">
        <h1>Reservation</h1>
    </div>
     
    <article id='eventInfo'>
    <?php $eventView = $event->showEvent(); ?>
    </article>
</main>

<?php $pageContent = ob_get_clean(); ?>

<?php require 'template.php'; ?>
