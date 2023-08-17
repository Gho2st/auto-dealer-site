<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TwojaNazwa - Samochody używane</title>
    <link rel="stylesheet" href="../../style2.css" />
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
  </head>
  <body>
    <header>
      <div class="nav container">
          <i class="bx bx-menu" id="menu-icon"></i>

          <a href="#" class="logo">Twoja<span>Nazwa</span></a>

          <ul class="navbar">
              <li><a href="../../index.php">Strona Główna</a></li>
              <li><a href="../../#cars">Samochody</a></li>
              <li><a href="#about">O nas</a></li>
              <li><a href="#parts">Używane</a></li>
              <li><a href="../../#blog">Nasz blog</a></li>
          </ul>
          <i class="bx bx-search" id="search-icon"></i>
            <div class="search-box container">
                <input type="search" name="" id="" placeholder="Search here...">
            </div>
          
      </div>

  </header>
  <section class="cars" id="cars">
  <div class="heading">
    <span>All Cars</span>
    <h2>Mamy wszystkie typy samochodów</h2>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas, laudantium!</p>
  </div> 
  </section>
  
  
   <!-- Slideshow container -->
<?php
$sciezka_folderu_zdjec_dodatkowych = 'zdjecia_dodatkowe/';
$zdjecia_dodatkowe = glob($sciezka_folderu_zdjec_dodatkowych . 'zdjecie_dodatkowe_*.jpg');
$liczba_zdjec = count($zdjecia_dodatkowe);

echo "<section>";
echo "<div class='slideshow-container container' id='slideshow-container'>";

foreach ($zdjecia_dodatkowe as $key => $zdjecie) {
    $numer_slajdu = $key + 1;
    echo "<div class='mySlides fade'>";
    echo "<div class='numbertext'>$numer_slajdu/$liczba_zdjec</div>";
    echo "<img src='$zdjecie' style='width:100%' alt='Zdjęcie dodatkowe'>";
    echo "</div>";
}

echo "<a class='prev' onclick='plusSlides(-1)'>&#10094;</a>";
echo "<a class='next' onclick='plusSlides(1)'>&#10095;</a>";
echo "<button id='fullscreen-button'><i class='bx bx-fullscreen'></i></button>";
echo "</div>";
echo "<br>";

echo "<div style='text-align:center'>";
for ($i = 1; $i <= $liczba_zdjec; $i++) {
    echo "<span class='dot' onclick='currentSlide($i)'></span>";
}
echo "</div>";

echo "</section>";
?>

<?php
 
       $sciezka_pliku = 'ogloszenie_kolejne.txt';
       $ogloszenia = file_get_contents($sciezka_pliku);
       $ogloszenia = explode("\n\n", $ogloszenia);
       foreach ($ogloszenia as $ogloszenie) {
       $linie = explode("\n", $ogloszenie);

       $tytul = substr($linie[0], strlen("Tytuł: "));
       
       $data = '';
       $cena = '';
       $przebieg = '';
       $rodzaj_paliwa = '';
       $rocznik = '';
       
       $sciezka_pliku_z_opisem = 'opis.txt';
       $opis_ogloszenia = file_get_contents($sciezka_pliku_z_opisem);
     
       if (isset($linie[2])) {
       $data = substr($linie[2], strlen("Data dodania: "));
       }

       if (isset($linie[3])) {
       $cena = substr($linie[3], strlen("Cena: "));
       }

       if (isset($linie[4])) {
       $przebieg = substr($linie[4], strlen("Przebieg: "));
       }

       if (isset($linie[5])) {
       $rodzaj_paliwa = substr($linie[5], strlen("Rodzaj paliwa: "));
       }

       if (isset($linie[6])) {
       $rocznik = substr($linie[6], strlen("Rocznik: "));
       }

       if (!empty($tytul) || !empty($data) || !empty($cena) || !empty($przebieg) || !empty($rocznik) || !empty($rodzaj_paliwa)) {

         echo "<section class='description'>";
         echo "<div class='container-description container'>";
 
         echo "<h4 class = 'date'>Dodane: $data</h4>";
         echo "<h3 class = 'title'>$tytul</h3>";
         echo "<div class = 'prize'>$cena PLN</div>";
         echo "<h2 class = 'description-heading'>Opis ogłoszenia</h2>";
         echo "<div class = 'description'>";
         echo "<div class='description-p'>$opis_ogloszenia</div>";
 
         echo "</div>";
         echo "</div>";
         echo "</section>"; 
        
 
       }
     }

     
     ?>
  

  


  <section class="contact">

    <div class="contact-container container">

      <h2 class="contact-heading">Skontaktuj sie</h2>
        <div class="logo2">
          <img src="../../img/logo.png" alt="logo firmy">
        </div>
        <div class="info-container">
          
          <div class="phone-number">
            <h4 >Kontakt bezposredni</h4>
            <p class="phone"><i class='bx bxs-phone' ></i>576985894</p>
            <p class="phone"><i class='bx bxs-envelope' ></i>dominik.jojczyk@gmail.com</p>
          </div>
        
        
          <div class="open-hours">
            <h4>Godziny Otwarcia</h4>
            <li><span class="day">Poniedziałek</span> <span class="hours"> 09:00-18:00</span> </li>
            <li><span class="day">Wtorek</span> <span class="hours"> 09:00-18:00</span> </li>
            <li><span class="day">Środa</span> <span class="hours"> 09:00-18:00</span> </li>
            <li><span class="day">Czwartek</span> <span class="hours"> 09:00-18:00</span> </li>
            <li><span class="day">Piątek</span> <span class="hours"> 09:00-18:00</span> </li>
            <li><span class="day">Sobota</span> <span class="hours"> 09:00-18:00</span> </li>
            <li><span class="day">Niedziela</span> <span class="hours"> 09:00-18:00</span> </li>
          </div>
        
      </div>


    </div>




  </section>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2585.0801361841623!2d20.631783876419874!3d49.61509387144484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473dfafb6772772f%3A0x7e6ce9fb4a87ec2d!2sNiskowa%2036%2C%2033-395%20Niskowa!5e0!3m2!1spl!2spl!4v1686129700609!5m2!1spl!2spl" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  <!--FOOTER-->
  
  <section class="footer" id="about">
      <div class="footer-container container">
  
          <div class="footer-box">
              <a href="#" class="logo">Twoja<span>Nazwa</span></a>
              <div class="social">
                  <a href="#"><i class="bx bxl-facebook"></i></a>
                  <a href="#"><i class="bx bxl-twitter"></i></a>
                  <a href="#"><i class="bx bxl-instagram"></i></a>
                  <a href="#"><i class="bx bxl-youtube"></i></a>
              </div>
          </div>
          <div class="footer-box">
              <h3>Page</h3>
              <a href="#">Home</a>
              <a href="#">Cars</a>
              <a href="#">Parts</a>
              <a href="#">Sales</a>
          </div>
          <div class="footer-box">
              <h3>Legal</h3>
              <a href="#">Privacy</a>
              <a href="#">Refund Policy</a>
              <a href="#">Cookie Policy</a>
          </div>
          <div class="footer-box3">
              <h3>Contact</h3>
             <!-- <a href="#">Numer telefonu: XXXZZZYYY</a>-->
              <p>Numer telefonu: XXXZZZYYY</p>
              <p>Adres e-mail:</p>
              <p>Adres: </p>
          </div>
      </div>
  
  
  
  </section>
  
  <!--COPYRIGHT-->
  <div class="copyright">
      <p>&#169; TwojaNazwa Wszystkie prawa zastrzeżone</p>
  </div>

  <script src="../../script2.js" defer></script>
  </body>
</html>