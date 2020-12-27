<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/planning.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
            require_once('libraries/autoload.php');
                $planning = new \Controllers\planning($_GET['day'] ?? null, $_GET['month'] ?? null , $_GET['year'] ?? null);
                $jour = date("w"); 
                
                if (isset($_GET['jour']))
                {
                    $jour = intval($_GET['jour']);
                }
                if (isset($_GET['week']) == "pre") // Si on veut afficher la semaine précédente
                {
                    $jour = $jour - 7;
                } elseif (isset($_GET['week']) == "next") {
                    $jour = $jour + 7;
                }

                $nom_mois = date("F"); // nom du mois actuel
                $annee = date("Y"); // année actuelle
                $num_week = date("W");
 
if (isset($_GET['week']))
{
    $nom_mois = date("F", mktime(0,0,0,date("n"),date("d")-$jour+1,date("y")));
    $annee = date("Y", mktime(0,0,0,date("n"),date("d")-$jour+1,date("y")));
    $num_week = date("W", mktime(0,0,0,date("n"),date("d")-$jour+1,date("y")));
}

?>

<a href="planning.php?week=prev&jour=<?= $jour; ?>" class="btn btn-primary">&lt</a><h3>Semaine n°<?= $planning->getWeeks(); ?><a href="planning.php?week=next&jour=<?= $jour; ?>" class="btn btn-primary">&gt</a></h3>
<h4>Du <?= $planning->startWeek(); ?> au <?= $planning->endWeek(); ?></h4>
<h1><?= $planning->toString(); ?></h1>

<table class="plantable">
    <thead>
    <tr>
        <th></th>
        <?php for($k = 1; $k < 8; $k++ ): ?>
        <th>
            <?= $planning->days[$k]. ' ' . date("d", mktime(0,0,0,date("n"),date("d")-$jour+$k,date("y"))); ?>
        </th>
        <?php endfor; ?>
    </tr>
    </thead>
    <tbody>
        <tr>
            <?php foreach($planning->hours as $hour): ?>
            <td>
                <?= $hour; ?>
            </td>
            <?php for($j = 1; $j < 9; $j++): ?>
            <td></td>
            <?php endfor; ?>
            </td></tr>
            <?php endforeach; ?>
        
    </tbody>
</table>
</body>
</html>