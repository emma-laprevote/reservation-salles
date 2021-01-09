<?php
require_once('../libraries/autoload.php');
session_start();
?>

<?php $pageTitle = 'Planning'; ?>

<?php ob_start(); ?>

<main id="mainPlanning">
  <?php
  $signUp = $_SESSION['user']; 
  $planning = new \Controllers\Planning();
  ?>
  <section id="date">
	  <div id="titreMois" align="center">
        <h1><?= $planning->toString(); ?> <?= $planning->getYear(); ?></h1>
        <a href="planning.php?week=pre&jour=<?= $planning->previousWeek(); ?>"><button type="button" class="btn btn-dark">&lt</button></a>  Semaine <?= $planning->numWeeks(); ?>  <a href="planning.php?week=next&jour=<?= $planning->nextWeek(); ?>"><button type="button" class="btn btn-dark">&gt</button></a><br />
        du <?= $planning->startWeek(); ?> au <?= $planning->endWeek(); ?>
    </div>
  </section>
	<br>
	<table class="calendar__table">
		<thead class="calendar__head">
      <?php $planning->headTable(); ?>
    </thead>
    
		<tbody class="calendar__body">
		<?php $planning->bodyTable($signUp); ?>
    </tbody>
  </table>
</main>

<?php $pageContent = ob_get_clean(); ?>

<?php require 'template.php'; ?>

