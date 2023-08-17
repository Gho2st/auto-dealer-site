<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/> 
    <title>TwojNazwa - Samochody używane</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="img/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="img/favicon-160x160.png" sizes="160x160" />
    <link rel="icon" type="image/png" href="img/favicon-196x196.png" sizes="196x196" />
    
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png" />
    
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">

    
</head>
<body>
    
    <!--NAVBAR-->

    <header>
        <div class="nav container">
            <i class="bx bx-menu" id="menu-icon"></i>

            <a href="#" class="logo">Twoja<span>Nazwa</span></a>

            <ul class="navbar">
                <li><a href="#home">Strona Główna</a></li>
                <li><a href="#cars">Samochody</a></li>
                <li><a href="#about">O nas</a></li>
                <li><a href="#parts">Używane</a></li>
                <li><a href="#blog">Nasz blog</a></li>
            </ul>
            <i class="bx bx-search" id="search-icon"></i>
            <div class="search-box container">
                <input type="search" name="" id="" placeholder="Search here...">
            </div>
        </div>



    </header>
    <section class="home" id="home">
        <div class="home-text">
            <h1>Mamy idealny <span class="multiple-text">samochód</span><br> dla Ciebie</h1>
            <p>Lorem ipsum dolor sit amet consectetur. <br>Lorem ipsum dolor sit.</p>
            <!--HOME BUTTON-->
            <a href="#" class="btn">Odkryj teraz</a>
        </div>




    </section>


    <section class="cars" id="cars">
        <div class="heading">
            <span>All Cars</span>
            <h2>Mamy wszystkie typy samochodów</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas, laudantium!</p>
        </div> 
        <!--<div class="cars-container container">
            <div class="box">
                <img src="img/car1.jpg" alt="">
                <h2>Porche Car</h2>
            </div>
            <div class="box">
                <img src="img/car2.jpg" alt="">
                <h2>Porche Car</h2>
            </div>
            <div class="box">
                <img src="img/car3.jpg" alt="">
                <h2>Porche Car</h2>
            </div>
            <div class="box">
                <img src="img/car4.jpg" alt="">
                <h2>Porche Car</h2>
            </div>
            <div class="box">
                <img src="img/car5.jpg" alt="">
                <h2>Porche Car</h2>
            </div>
            <div class="box">
                <img src="img/car6.jpg" alt="">
                <h2>Porche Car</h2>
            </div>
        </div>
    -->

    </section>
<!--
    <section class="about container" id="about">
        <img src="img/about.png" alt="">
        <div class="about-text">
            <span>O nas</span>
            <h2>Niskie ceny <br> jakościowe samochody</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum aliquam fugit quae!</p>
            <a href="#" class="btn">Czytaj więcej</a>
        </div>
    </section>

    -->
<section id="parts">
    <div class="parts-container container">

    <?php


           $sciezka_pliku = 'ogloszenia.txt';
           if (file_exists($sciezka_pliku)) {
            $ogloszenia = file_get_contents($sciezka_pliku);
            // reszta kodu obsługującego odczyt pliku
            
                $ogloszenia = explode("\n\n", $ogloszenia);
                foreach ($ogloszenia as $ogloszenie) {
                $linie = explode("\n", $ogloszenie);

        $tytul = substr($linie[0], strlen("Tytuł: "));
       $data = '';
       $cena = '';
       $przebieg = '';
       $rodzaj_paliwa = '';
       $rocznik = '';
       $zdjecie = '';

        $tytulbezspacji = str_replace(' ', '_', $tytul);
        $nazwa_pliku = "ogloszenia/" . $tytulbezspacji ."/" . $tytulbezspacji . ".php";
       
  
       if (isset($linie[1])) {
       $zdjecie = substr($linie[1], strlen("Ścieżka do zdjęcia: "));
       }

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

        
        
        if (!empty($zdjecie)  || !empty($tytul) || !empty($data) || !empty($cena) || !empty($przebieg) || !empty($rocznik) || !empty($rodzaj_paliwa)) {
        echo "<div class='box'>";
       
        if (!empty($zdjecie)) {
            echo "<img src='$zdjecie' alt='Zdjęcie ogłoszenia'>";
            
            }
        if (!empty($tytul)) {
            echo "<h3>$tytul</h3>";
            }
                
        if (!empty($data)) {
            echo "<span class='data'>$data</span>";
            }
            

        if (!empty($cena)) {
            echo "<span class='prize'>$cena PLN</span>";
            }

        echo "<div class ='more'>";
            if (!empty($przebieg)) {
                echo "<p><i class='bx bx-tachometer'></i> $przebieg</p>";
                }
            if (!empty($rocznik)) {
                echo "<p><i class='bx bx-history'></i> $rocznik</p>";
                }
            if (!empty($rodzaj_paliwa)) {
                echo "<p><i class='bx bxs-gas-pump'></i> $rodzaj_paliwa</p>";
                
                }
                echo "</div>";

        
            echo "<a href='#' class='btn'>Kup teraz</a>";
            echo "<a href='$nazwa_pliku' class='details'>Więcej szczegółów</a>";
            
        echo "</div>";
            } 
    }
}

       
 ?>

     
    </div>
</section>
    <section class="blog" id="blog">
        <div class="heading">
            <span>Blog & News</span>
            <h2>Nasze wpisy na blogu</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, accusantium.</p>
        </div>    
        <div class="blog-container container">
            <div class="box">
                <img src="img/car1.jpg" alt="">
                <span>Feb 14 2021</span>
                <h3>Jak kupic perfekcyjne auto w niskiej cenie</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <a href="#" class="blog-btn">Czytaj więcej<i class='bx bx-right-arrow-alt' ></i></a>
            </div>
            <div class="box">
                <img src="img/car2.jpg" alt="">
                <span>Feb 14 2021</span>
                <h3>Jak kupic perfekcyjne auto w niskiej cenie</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <a href="#" class="blog-btn">Czytaj więcej<i class='bx bx-right-arrow-alt' ></i></a>
            </div>
            <div class="box">
                <img src="img/car3.jpg" alt="">
                <span>Feb 14 2021</span>
                <h3>Jak kupic perfekcyjne auto w niskiej cenie</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <a href="#" class="blog-btn">Czytaj więcej<i class='bx bx-right-arrow-alt' ></i></a>
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

<script src="https://unpkg.com/typed.js@2.0.15/dist/typed.umd.js"></script>
<script src="script.js"></script>

</body>
</html>