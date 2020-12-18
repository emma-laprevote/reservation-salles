<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
            <form class="inscription" action="reservation-form.php" method="POST">
                
                <legend>RESERVATION</legend>
                <br>
                <div class="inputDiv">
                    <label class="ins" for="titre">Titre de l'évènement<span>*</span> :</label>
                    <input class="place" type="text" name="titre" required placeholder="Titre de l'évènement">
                </div>
                <br>
                <div class="inputDiv">
                    <label class="ins" for="Description">Description<span>*</span> :</label>
                    <input class="place" type="text" name="description" required placeholder="Description de l'évènement">
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
                    <label for="fin">Veuillez choisir une date et une heure de fin:</label>
                    <input id="fin" type="date" name="fin">
                    <select name="hourend" id="">
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
                <input id="button" type="submit" name="envoyer" value="Envoyer" />
            </form>
            <?php 
            require_once('libraries/autoload.php');
            session_start();
            $signUp = $_SESSION['user'];

            if(isset($_SESSION['user']) && isset($_POST['envoyer'])) 
            {
                $resa = new \Controllers\reservation();
                $resa->verifDate();

                header('Location: ../reservation-salles/reservation-form.php');
            }
            
            ?>

</body>
</html>