<?php

// Sprawdzamy, czy formularz został wysłany
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Pobieramy dane z formularza
  $tytul = $_POST["tytul"];
  $opis = $_POST["opis"];
  $zdjecieGlowne = $_FILES["main_photo"];
  $zdjeciaDodatkowe = $_FILES["additional_photos"];
  $data = $_POST["data"];
  $cena = $_POST["cena"];
  $przebieg = $_POST["przebieg"];
  $rodzaj_paliwa = $_POST["rodzaj_paliwa"];
  $rocznik = $_POST["rocznik"];

  // Generuj nazwę pliku na podstawie tytułu ogłoszenia
  $nazwa_pliku = str_replace(' ', '_', $tytul) . ".php";

  // Utwórz zawartość pliku podstrony
  $zawartosc_pliku = file_get_contents('ogloszenie_template.php');

  // Tworzenie folderu ogłoszenia na podstawie tytułu
  $nazwa_folderu = str_replace(' ', '_', $tytul);
 
  $sciezka_folderu = $_SERVER['DOCUMENT_ROOT'] . '/ogloszenia/' . $nazwa_folderu;
  mkdir($sciezka_folderu);

  //przeniesienie pliku php do folderu ze swoim ogloszeniem
  $sciezka_pliku = $sciezka_folderu . '/' . $nazwa_pliku;
  // Zapisz zawartość pliku podstrony
  file_put_contents($sciezka_pliku, $zawartosc_pliku);

  // Przenoszenie zdjęcia głównego do folderu ogłoszenia
  $sciezka_zdjecia_glownego = $sciezka_folderu . '/zdjecie_glowne.jpg';
  move_uploaded_file($zdjecieGlowne['tmp_name'], $sciezka_zdjecia_glownego);

  // Tworzenie folderu na zdjęcia dodatkowe
  $sciezka_folderu_zdjec_dodatkowych = $sciezka_folderu . '/zdjecia_dodatkowe';
  mkdir($sciezka_folderu_zdjec_dodatkowych);

  // Przenoszenie zdjęć dodatkowych
  foreach ($zdjeciaDodatkowe['tmp_name'] as $key => $tmp_name) {
    $zdjecieDodatkoweNazwa = $zdjeciaDodatkowe['name'][$key];
    $numerZdjecia = $key + 1; // Numerowanie plików od 1

    // Tworzenie nowej nazwy pliku z numerem
    $rozszNazwa = pathinfo($zdjecieDodatkoweNazwa, PATHINFO_EXTENSION);
    $nowaNazwa = 'zdjecie_dodatkowe_' . $numerZdjecia . '.' . $rozszNazwa;

    $sciezka_zdjecia_dodatkowego = $sciezka_folderu_zdjec_dodatkowych . '/' . $nowaNazwa;
    move_uploaded_file($tmp_name, $sciezka_zdjecia_dodatkowego);
}
  //sciezka do zdjecia glownego dla kolejnych ogloszen zapisywana w ogloszenia.txt w folderze glownym
  $zdjecie_glowne_index = 'ogloszenia/' . $nazwa_folderu . '/zdjecie_glowne.jpg';

  // Generuj nazwę pliku ogłoszenia
  $nazwa_pliku = 'ogloszenie_kolejne.txt';

  // Ścieżka do pliku ogłoszenia
  $sciezka_pliku = $sciezka_folderu . '/' . $nazwa_pliku;

  // Zapisz dane ogłoszenia do pliku tekstowego
  $ogloszenie_kolejne = "Tytuł: $tytul\nŚcieżka do zdjęcia: $zdjecie_glowne_index\nData dodania: $data\nCena: $cena\nPrzebieg: $przebieg\nRodzaj paliwa: $rodzaj_paliwa\nRocznik: $rocznik\n\n";
  file_put_contents($sciezka_pliku, $ogloszenie_kolejne);

  // Zapisujemy ogłoszenie do pliku tekstowego
  $sciezkaPliku = "ogloszenia.txt";
  $ogloszenie = "Tytuł: $tytul\nŚcieżka do zdjęcia: $zdjecie_glowne_index\nData dodania: $data\nCena: $cena\nPrzebieg: $przebieg\nRodzaj paliwa: $rodzaj_paliwa\nRocznik: $rocznik\n\n";
  file_put_contents($sciezkaPliku, $ogloszenie, FILE_APPEND);

  //generuj nazwe pliku z opisem
  $nazwa_pliku_z_opisem = 'opis.txt';

  //sciezka do pliku z opisem

  $sciezka_pliku_z_opisem = $sciezka_folderu . '/' . $nazwa_pliku_z_opisem;

  //zapisz opis do pliku z opisem

  $opis_ogloszenia = "$opis";
  file_put_contents($sciezka_pliku_z_opisem, $opis_ogloszenia);

  

 
    header("Location: admin.php?well=true");
    } else {
    header("Location: admin.php?well=false");

}