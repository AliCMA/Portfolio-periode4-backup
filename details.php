<?php
require 'functions.php';
$connection = dbConnect();

if( !isset($_GET['id']) ){
    echo "De ID is niet gezet";
    exit;
}

$id = $_GET['id'];
$check_int = filter_var($id, FILTER_VALIDATE_INT);
if($check_int == false){
    echo "Dit is geen getal (interger)";
    exit;
}



$statement = $connection->prepare('SELECT * FROM `portfolio` WHERE id=?');
$params = [$id];
$statement->execute($params);
$place =$statement->fetch(PDO::FETCH_ASSOC);
$pakketen = $connection->query('SELECT * FROM `portfolio`');
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
          <a href="indexeng.html" class="
        nav__link--anchor
        link__hover-effect
        link__hover-effect--white
      ">ENG</a>
        </li>
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
          <a href="contact.html" class="
        nav__link--anchor
        nav__link--anchor-primary
      ">Contact</a>
        </li>
      </ul>
    </nav>

   

    <div class="container place-details">
        <h1>Website pakket!</h1>
        <section>
            <article class="place-info">
                <header class="headertype">
                    <h2><?php echo $place['pakket']?></h2>
                    <h3><?php echo $place['inhoud']?></h3>
                </header> 
                <figure style="background-image: url(images/<?php echo $place['foto']?>)">
                    <em>€<?php echo $place['prijs']?></em>
                </figure>
                <p>
                <?php echo $place['beschrijving']?>
                </p>
                <hr>
                <a href="contact.php" class="link-button">Neem contact op!</a>
                <hr>
                <a href="index.php">Terug naar het overzicht</a>
            </article>
            <aside class="places-sidebar">
                <h3>Andere bundels</h3>
                <ul>
                <?php foreach($pakketen as $row): ?>
                    <li><a href="details.php?id=<?php echo $row ['id'];?>"><?php echo $row ['pakket'];?></a></li> 
                    <?php endforeach; ?>
                </ul>
                
   
            </aside>
        </section>
    </div>





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