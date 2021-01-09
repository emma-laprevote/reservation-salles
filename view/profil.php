<?php
require_once('../libraries/autoload.php');
session_start();
$signUp = $_SESSION['user'];
?>

<?php $pageTitle = 'Mon compte'; ?>

<?php ob_start(); ?>

<main id="mainProfil">

    <div id="form2">
        <form id="inscription" action="profil.php" method="POST">
            <?php if(isset($_SESSION['user'])) {
                    echo "<h2 id='titleUser'>"."Hello"." ".$_SESSION['user']->getLogin()."</h2>";
                } ?>
                <legend id="legendProfil">MODIFIE TON PROFIL</legend>
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
                if (isset($_SESSION['user']) && isset($_POST['envoyer']))
                {
                    $signUp->update();
                    $_SESSION['user'] = $signUp;  
                }
                ?>
            </form>
        </div>
    </main>
    <?php $pageContent = ob_get_clean(); ?>

<?php require 'template.php'; ?>
