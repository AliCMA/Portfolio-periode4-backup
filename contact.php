<?php
require 'functions.php';
$connection = dbConnect();

$voornaam = '';
$achternaam = '';
$soortpakket = '';
$contactgegevens = '';

$errors = [];

// Gegegevens check
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $soortpakket = $_POST['soortpakket'];
    $contactgegevens = $_POST['contactgegevens'];

    if (isEmpty($voornaam)) {
        $errors['voornaam'] = 'Vul uw voornaam in a.u.b';
    }
    if (isEmpty($achternaam)) {
        $errors['achternaam'] = 'Vul uw voornaam in a.u.b';
    }
    if (!isValidEmail($contactgegevens)) {
        $errors['contactgegevens'] = 'Dit is geen geldig e-mail of telefoonnummer';
    }
    if (!HasMinLength($soortpakket, 8)) {
        $errors['soortpakket'] = 'Zo een pakket bestaat niet, je kan alleen kiezen uit: beginner, standaard & full acces.';
    }


    if (count($errors) == 0) {
        $sql = "INSERT INTO `bestellen` ( `voornaam`, `achternaam`, `soortpakket`, `contactgegevens`) 
        VALUES (:voornaam, :achternaam, :soortpakket, :contactgegevens);";

        $statement = $connection->prepare($sql);
        $params = [
            'voornaam' => $voornaam,
            'achternaam' => $achternaam,
            'soortpakket' => $soortpakket,
            'contactgegevens' => $contactgegevens,
        ];
        $statement->execute($params);

        header('Location: bedankt.html');
        exit;
    }
}


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
          <a href="index.html" class="
        nav__link--anchor
        nav__link--anchor-primary
      ">Home</a>
        </li>
      </ul>
    </nav>

    <div class="container5715">
        <h1 class="h1-titel">Website pakket!</h1>
        <br>
        <section class="contact">
            <header class="titel2">
                <h2 class="h2-titel">Bestel pakket </h2>
            </header>

            <br>
            <form action="contact.php" method="POST" novalidate>
                <div class="form__field">
                    <label class="labelnaam" for="voornaam">Voornaam</label>&nbsp;
                    <input type="text" id="voornaam" name="voornaam" placeholder="Vul uw voornaam in" required />
                    <?php if(!empty($errors['voornaam']) ):?>
                    <p class="forum-error"><?php echo $errors['voornaam']?></p>
                    <?php endif;?>
                </div>

                <br>

                <div class="form__field">
                    <label class="labelnaam" for="achternaam">Achternaam</label>&nbsp;
                    <input type="text" id="achternaam" name="achternaam" placeholder="Vul uw achternaam in" required />
                    <?php if( !empty($errors['achternaam']) ):?>
                    <p class="forum-error"><?php echo $errors['achternaam']?></p>
                    <?php endif;?>
                </div>
                <br>

                <div class="form__field">
                    <label class="labelnaam" for="Soort-pakket">Soort pakket</label>&nbsp;
                    <input type="text" id="soortpakket" name="soortpakket" placeholder="Vul uw soort pakket in die u wilt gaan aanschaffen" required />
                    <?php if(!empty($errors['soortpakket']) ):?>
                    <p class="forum-error"><?php echo $errors['soortpakket']?></p>
                    <?php endif;?>
                </div>
                <br>

                <div class="form__field">
                    <label class="labelnaam" for="contactgegevens">Contactgegevens</label>&nbsp;
                    <textarea type="text" id="contactgegevens" name="contactgegevens" placeholder="E-mail & telefoonnummer" required></textarea>
                    <?php if(!empty($errors['contactgegevens']) ):?>
                    <p class="forum-error"><?php echo $errors['contactgegevens']?></p>
                    <?php endif;?>
                </div>
                <button class="opsturenButton" type="submit" class="form_button">Opsturen</button>
            </form>
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