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
    <title>Réservation</title>
</head>
<body>
<?php require('header.php'); ?>

    <main id="mainReservation">

        <div id="form">
            <form id="inscriptionReser" action="reservation-form.php" method="POST">
                <legend class="otherLegend">RESERVATION</legend>
                <br>
                <div class="mb-3">
                    <label for="titre" class="form-label">Titre de l'évènement *</label>
                    <input type="text" class="form-control" name="titre" required placeholder="Titre de l'évènement">
                </div>
                <br>
                <div class="mb-3">
                    <label for="description" class="form-label">Description *</label>
                    <input type="text" class="form-control" name="description" required placeholder="Description de l'évènement">
                </div>
                <br>
                <div class="inputDiv">
                    <label for="debut">Veuillez choisir une date et une heure de début:</label>
                    <input id="debut" type="date" name="debut">
                    <select name="hourstart" id="">
                        <?php
                            for ($h = 8; $h < 19; $h++)
                            { if($h < 10) {?>
                                <option value="0<?php echo $h; ?>">0<?php echo $h;?> : 00</option>
                        <?php } else { ?>
                                <option value="<?php echo $h; ?>"><?php echo $h;?> : 00</option>
                            <?php
                            }
                            }
                        ?>
                    </select>
                </div>
                <br>
                <div class="inputDiv">
                    <label for="fin">Veuillez choisir une heure de fin:</label>
                    <input id="fin" type="date" name="fin">
                    <select name="hourend" id="">
                        <?php
                            for ($h = 9; $h < 20; $h++)
                            { if($h < 10) {?>
                                <option value="0<?php echo $h; ?>">0<?php echo $h;?> : 00</option>
                        <?php } else { ?>
                                <option value="<?php echo $h; ?>"><?php echo $h;?> : 00</option>
                            <?php
                            }
                            }
                        ?>
                    </select>
                </div>
                <br>
                <div class="col-12">
                    <button id="buttonSub" class="btn btn-primary" type="submit" name="envoyer">Envoyer</button>
                </div>
                <?php 
            $signUp = $_SESSION['user'];
            if(isset($_SESSION['user']) && isset($_POST['envoyer'])) 
            {
                $resa = new \Controllers\reservation();
                $resa->insertReserve($_SESSION['user']->getId());
            }
            ?>
            </form>
        </div>
    </main>
<?php require('footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>

