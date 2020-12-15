<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form class="inscription" action="inscription.php" method="POST">
                
                <legend>INSCRIPTION</legend>
                <br>
                <div class="inputDiv">
                    <label class="ins" for="login">Login<span>*</span> :</label>
                    <input class="place" type="text" name="login" required placeholder="Nom d'utilisateur">
                </div>
                <br>
                <div class="inputDiv">
                    <label class="ins" for="passeword">Password<span>*</span> :</label>
                    <input class="place" type="password" name="password" required placeholder="Password">
                </div>
                <br>
                <div class="inputDiv">
                    <label class="ins" for="confirm_passeword">Confirm password<span>*</span> :</label>
                    <input class="place" type="password" name="confirm_password" required placeholder="Password">
                </div>
                <br>
                <input id="button" type="submit" name="envoyer" value="Envoyer" />
                </form>

               <?php

                require_once('libraries/autoload.php');

                if(isset($_POST['envoyer'])) 
                {
                    $signUp = new \Controllers\user();
                    $signUp->insert();

                    header('Location: ../reservation-salles/connexion.php');
                }

                

                ?>
</body>
</html>