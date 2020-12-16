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
                    <label for="fin">Veuillez choisir une date et une heure de début:</label>
                    <input id="fin" type="datetime-local" name="debut" min="T08:00" max="T19:00">
                </div>
                <br>
                <div class="inputDiv">
                    <label for="fin">Veuillez choisir une date et une heure de fin:</label>
                    <input id="fin" type="datetime-local" name="fin" min="T08:00" max="T19:00">
                </div>
                <br>
                <input id="button" type="submit" name="envoyer" value="Envoyer" />
            </form>
            <?php 
            require_once('libraries/autoload.php');
            session_start();
            $signUp = $_SESSION['user'];

            var_dump($signUp);

            if(isset($_SESSION['user']) && isset($_POST['envoyer'])) 
            {
                $signUp->insertReserve();

                header('Location: ../reservation-salles/connexion.php');
            }

            ?>
</body>
</html>