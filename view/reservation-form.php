<?php
require_once('../libraries/autoload.php');
session_start();
?>

<?php $pageTitle = 'Le manoir'; ?>
<?php ob_start(); ?>

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
                                <option value="<?php echo $h; ?>">0<?php echo $h;?> : 00</option>
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
                                <option value="<?php echo $h; ?>">0<?php echo $h;?> : 00</option>
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
            </form>
        <div id="form">
            <?php 
            $signUp = $_SESSION['user'];
            if(isset($_SESSION['user']) && isset($_POST['envoyer'])) 
            {
                $resa = new \Controllers\reservation();
                $resa->insertReserve($_SESSION['user']->getId());
            }
            ?>
    </main>

    <?php $pageContent = ob_get_clean(); ?>

<?php require 'template.php'; ?>

