<?php
require_once('../libraries/Autoloader.php');
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/planning.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning</title>
</head>
<body>
<?php require('header.php'); ?>

<main id="mainPlanning">
  <?php
  if(isset($_SESSION['user'])){
    $signUp = $_SESSION['user'];
  }
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
		<?php $planning->bodyTable(isset($signUp)); ?>
    </tbody>
  </table>
</main>
<?php require('footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>

