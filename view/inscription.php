<?php
require_once('../libraries/autoload.php');
?>

<?php $pageTitle = 'Inscription'; ?>

<?php ob_start(); ?>

<main id="mainInscription">

    <div id="form">
        <form id="inscription" action="inscription.php" method="POST">
                <legend class="otherLegend">INSCRIPTION</legend>
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
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password *</label>
                    <input type="password" class="form-control" name="confirm_password" required placeholder="Password">
                </div>
                <div class="col-12">
                    <button id="buttonSub" class="btn btn-primary" type="submit" name="envoyer">Envoyer</button>
                </div>
                <?php

                if(isset($_POST['envoyer'])) 
                {
                    $signUp = new \Controllers\user();
                    $signUp->insert();
                }
                ?>
            </form>
        </div>
    </main>
  
    <?php $pageContent = ob_get_clean(); ?>

<?php require 'template.php'; ?>
