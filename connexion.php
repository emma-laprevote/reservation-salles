
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

        <form class="inscription" action="connexion.php" method="POST">
            <legend>CONNEXION</legend>
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
                <input id="button" type="submit" name="envoyer" value="Envoyer" />
                </form>
                <?php
                require_once('libraries/autoload.php');
                session_start();

                if(isset($_POST['envoyer'])) 
                {
                    $signUp = new \Controllers\user();
                    $signUp->connect();

                    if($signUp->connect())
                    {
                        $_SESSION['user'] = $signUp;
                    }
                    
                    header('Location: ../reservation-salles/profil.php');
                }
                

                ?>
</body>
</body>
</html>