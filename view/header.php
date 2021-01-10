<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="accueil.php"><img id="logomanoir" src="../images/logomanoir.PNG" alt="logo le manoir"></a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="accueil.php">Home</a>
        </li>
        <?php if(!isset($_SESSION['user'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="inscription.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="connexion.php">Connexion</a>
        </li>
        <?php elseif(isset($_SESSION['user'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="reservation-form.php">Reservation</a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="planning.php">Planning</a>
        </li>
        <?php if(!isset($_SESSION['user'])): ?>

        <?php elseif(isset($_SESSION['user'])): ?>
          <li class='nav-item'>
            <form id='deconnect' action='accueil.php' method='POST'>
              <button id='buttonDeco' class='btn btn-primary' type='submit' name='deconnexion'>Deconnexion</button>
            </form>
          </li>
        <?php endif; ?>
        <?php if(isset($_POST['deconnexion'])) {
            $_SESSION['user']->disconnect();
        }
        ?>
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