<?php
require_once('../libraries/autoload.php');
session_start();
?>

<?php $pageTitle = 'Connexion'; ?>
<?php ob_start(); ?>

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

                    \Http::redirect("../view/accueil.php");
                }
            
                ?>
            </form>
        </div>
    </main>

    <?php $pageContent = ob_get_clean(); ?>

<?php require 'template.php'; ?>
