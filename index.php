<?php
require 'functions.php';
$connection = dbConnect();


$result = $connection->query('SELECT * FROM `portfolio`');


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio Ali Çeliksu</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
  <script src="filtler.js" defer></script>
  <script src="spraak.js" defer></script>
</head>
<body>

  <header>
    <nav class="header">
      <div class="persoonlijk_logo">Portfolio Ali Çeliksu</div>
      <ul class="nav__link--list">
        <li class="nav__link">
          <a href="#projects" class="
        nav__link--anchor
        link__hover-effect
        link_1_hover-effect--white
      ">Projects</a>
        </li>
        <li class="nav__link">
          <a href="inlog.html" class="
        nav__link--anchor 
        link__hover-effect  
        link__hover-effect--white
      ">Login</a>
        </li>
        <li class="nav__link">
          <a href="index.html" class="
        nav__link--anchor
        nav__link--anchor-primary
      ">Home</a>
        </li>
      </ul>
    </nav>

   


    <?php foreach($result as $row): ?>
    <article class="places-list__place">
        <h2><?php echo $row ['pakket'];  ?></h2>
        <figure class="places-list__photo" style="background-image: url(images/<?php echo $row ['foto']; ?>)"></figure>
        <header>
            <h3>Prijs:</h3>
            <h2><?php echo $row ['prijs'];  ?></h2>
            <h2><?php echo $row ['inhoud'];  ?></h2>
        </header>
        <h2><?php echo $row ['beschrijving'];  ?></h2>
        <a href="details.php?id=<?php echo $row ['id'];?>"><b>Meer informatie</b></a>
    </article>
    <?php endforeach; ?>





  <footer>
    <div class="row footer__row">
      <a href="#" class="footer__anchor">
        <figure class="footer__logo">
          <img src="img/documenten/logo-top3.webp" class="footer__logo--img"
            alt="Top knop, deze brengt je naar de top van de website">
        </figure>
        <span class="footer__logo--popper">
          Top
          <i class="fas fa-arrow-up"></i>
        </span>
      </a>
      <div class="footer__social--lijst">
        <a href="https://github.com/AliCMA" target="_blank" class="
          footer__social--link
          link__hover-effect
          link__hover-effect--white
        "><i class="fab fa-github"></i></a>
        <a href="contact.html" target="_blank" class="
          footer__social--link
          link__hover-effect
          link__hover-effect--white
        ">📧 </a>
      </div>
      <div class="footer__copyright">Copyright © 2022 Portfolio | Ali Celiksu</div>
    </div>
  </footer>
</body>

</html>