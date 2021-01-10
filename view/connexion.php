<?php
require('../libraries/Autoloader.php');
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
    <title>Connexion</title>
</head>
<body>
<?php require('header.php'); ?>

<main id="mainConnexion">

    <div id="form">
        <form id="inscription" action="connexion.php" method="POST">
                <legend class="otherLegend">CONNEXION</legend>
                <br>
                <div class="mb-3">
                    <label for="login" class="form-label">Login *</label>
                    <input type="text" class="form-control" name="login" required placeholder="Nom d'utilisateur">
                </div>
                <br>
                <div class="mb-3">
                    <label for="password" class="form-label">Password *</label>
                    <input type="password" class="form-control" name="password" required placeholder="Password">
                </div>
                <br>
                <div class="col-12">
                    <button id="buttonSub" class="btn btn-primary" type="submit" name="envoyer">Envoyer</button>
                </div>
                <?php
                if(isset($_POST['envoyer'])) 
                {
                    $signUp = new \Controllers\user();
                    $signUp->connect();

                    if($signUp->connect())
                    {
                        $_SESSION['user'] = $signUp;
                    }

                    \Http::redirect("accueil.php");
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
