<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sprawdź, czy został przesłany tytuł ogłoszenia do usunięcia
    if (isset($_POST['delete_title'])) {
        $deleteTitle = $_POST['delete_title'];

        // Otwórz plik ogloszenia.txt w trybie odczytu
        $ogloszenia = file_get_contents("ogloszenia.txt");

        // Szukaj ogłoszenia o podanym tytule i usuń je
        $pattern = "/Tytuł: $deleteTitle\n(.*?)\n\n/ms";
        $ogloszenia = preg_replace($pattern, '', $ogloszenia, 1, $count);

        // Zapisz zmodyfikowany plik ogloszenia.txt
        file_put_contents("ogloszenia.txt", $ogloszenia);

        // Utwórz ścieżkę do folderu ogłoszenia
        $tytul_ogloszenia = str_replace(' ', '_', $deleteTitle);
        $sciezka_folderu ='ogloszenia/' . $tytul_ogloszenia;

        // Sprawdź, czy folder istnieje
        if (is_dir($sciezka_folderu)) {
            // Usuń folder ogłoszenia i jego zawartość
            $files = glob($sciezka_folderu . '/*');
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                }
            }
            rmdir($sciezka_folderu);
        }

        // Usuń folder zdjecia_dodatkowe wewnątrz ogłoszenia (jeśli istnieje)
        $sciezka_folderu_zdjecia_dodatkowe = $sciezka_folderu . '/zdjecia_dodatkowe';
        if (is_dir($sciezka_folderu_zdjecia_dodatkowe)) {
            $files_zdjecia_dodatkowe = glob($sciezka_folderu_zdjecia_dodatkowe . '/*');
            foreach ($files_zdjecia_dodatkowe as $file_zdjecia_dodatkowe) {
                if (is_file($file_zdjecia_dodatkowe)) {
                    unlink($file_zdjecia_dodatkowe);
                }
            }
            rmdir($sciezka_folderu_zdjecia_dodatkowe);
        }

        // Usuń folder główny ogłoszenia (jeśli istnieje)
        if (is_dir($sciezka_folderu)) {
            rmdir($sciezka_folderu);
        }

        header("Location: admin.php?success=true");
        exit;
    } else {
        header("Location: admin.php?success=false");
        exit;
    }
}
?>





