<?php
require_once('../libraries/Autoloader.php');
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
    <title>LE MANOIR</title>
</head>
<body>
<?php require('header.php'); ?>
<!-- Section avec carousel 3 photos manoir-->
<section id="carousel">
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img id="img1" src="../images/homemanoir.jpg" class="d-block w-100" alt="photo le manoir">
    </div>
    <div class="carousel-item">
      <img id="img2" src="../images/manoirbynight.jpg" class="d-block w-100" alt="Photo le manoir by night">
    </div>
    <div class="carousel-item">
      <img id="img3" src="../images/manoirinterior.jpg" class="d-block w-100" alt="photo manoir intérieur">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>
</section>

<main>
<!-- Section pour utilisateur : si connecté bouton pour accéder au profil ou réservé si pas connecté lien vers inscription ou connexion-->
<section id="user">
  <div id="welcomeUser">
    <div id="titleManor">
      <h1>Bienvenue</h1>
        <?php if(isset($_SESSION['user'])): ?> 
          <h2 id='titleUserIndex'><?= $_SESSION['user']->getLogin(); ?></h2>
          <p>Entrez dans notre demeure et vous ressentirez d'emblée une impréssion de quiétude et de chaleur.</p>
        <div id='buttonsSocial'>
          <a href='profil.php'><button type='button' class='btn btn-dark'>MON COMPTE</button></a>
          <a href='reservation-form.php'><button type='button' class='btn btn-dark'>RESERVATION</button></a></div>

        <?php elseif(!isset($_SESSION['user'])): ?>
          <p>Entrez dans notre demeure et vous ressentirez d'emblée une impréssion de quiétude et de chaleur.</p>
        <div id='buttonsSocial'>
          <a href='inscription.php'><button type='button' class='btn btn-dark'>INSCRIPTION</button></a>
          <a href='connexion.php'><button type='button' class='btn btn-dark'>CONNEXION</button></a></div>
        <?php endif; ?>
        </div>
    </div>
</section>

<!-- Mini présentation du manoir avec photo spa-->
<section id="presentManoir">
      <img src="../images/manoirspa.jpg" id="food" alt="photo assiette traiteur manoir">
    <div id="textmanor">
      <h1>Le manoir - « Plus Valet Quam Lucet »</h1>
      <h3>« Être plutôt que paraître »</h3>
      <br>
      <p>La devise inscrite sur les armoiries du Manoir de Lébioles reflète à merveille la philosophie de la maison.
      Situé dans un magnifique environnement, au cœur des belles forêts ardennaises, le Manoir de Lébioles accueille 
      ses hôtes dans un superbe cadre naturel et leur propose un luxe discret, une ambiance privée et un service de 
      première catégorie.</p>
    </div>
</section>

<!-- Section avec 3 card pour afin de contacter le manoir: Mail, Adresse postale et téléphone-->
<section id="cardContact">
<div class="card1" style="width: 18rem;">
  <div class="card-body">
    <i class="fas fa-envelope-open-text"></i>
    <h6>ECRIVEZ-NOUS!</h6>
    <p class="card-text">manoir@manoirdelebioles.com</p>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <div class="card-body">
  <i class="fas fa-map-marker-alt"></i>
    <h6>TROUVEZ-NOUS</h6>
    <p class="card-text">Domaine de Lébioles 1/5<br>B-4900 Spa (Creppe)</p>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <div class="card-body">
  <i class="fas fa-phone-alt"></i>
    <h6>APPELEZ-NOUS!</h6>
    <p class="card-text">Tel: +32 (0) 87 79 19 00<br>Fax: +32 (0) 87 79 19 99</p>
  </div>
</div>
</section>
</main>

<?php require('footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>



