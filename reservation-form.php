<?php
require_once('libraries/autoload.php');
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/planning.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#"><img id="logomanoir" src="images/logomanoir.PNG" alt="logo le manoir"></a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Reservation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Planning</a>
        </li>
      </ul>
    </div>
  <div id="iconesReseau" class="d-flex flex-row">
    <li id="tel"><a href="#" target="_blank"><i class="fas fa-phone-alt"></i>+32 (0) 87 79 19 00</a></li>
    <li><a href="https://fr-fr.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
    <li><a href="https://www.instagram.com/?hl=fr" target="_blank"><i class="fab fa-youtube"></i></a></li>
    <li><a href="https://twitter.com/?lang=fr" target="_blank"><i class="fas fa-hashtag"></i></a></li>
  </div>
  </div>
</nav>
</header>

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

<footer>
<nav class="navbar bottom navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="#"><img id="logomanoir2" src="images/logomanoir.PNG" alt="logo le manoir"></a>
  <div id="iconesReseau" class="d-flex flex-row">
      <li>COPYRIGHT &copy 2021 LAPREVOTE EMMA </li>
    <li><a href="https://fr-fr.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
    <li><a href="https://www.instagram.com/?hl=fr" target="_blank"><i class="fab fa-youtube"></i></a></li>
    <li><a href="https://twitter.com/?lang=fr" target="_blank"><i class="fas fa-hashtag"></i></a></li>
  </div>
  </div>
</nav>
</footer>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>