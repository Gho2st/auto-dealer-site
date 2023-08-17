<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Panel admina</title>
    
    <link rel="stylesheet" href="admin.css"/> 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>
<body>
<div class="container">
    <h1>Panel Admina - Auto<span>Speed</span></h1>
    <div class="cards">
        <div class="card">
            <h3>Dodaj ogłoszenie</h3>
            <form action="dodaj_ogloszenie.php" method="POST" enctype="multipart/form-data">
                <label for="tytul">Tytuł:</label>
                <input type="text" name="tytul" id="tytul" required>
<!--
                <label for="zdjecie">Zdjęcie:</label>
                <input type="file" name="zdjecie" id="zdjecie" accept="image/*" required> -->

                <label for="main_photo">Zdjecie Głowne</label>
                <input type="file" name="main_photo" id="main_photo" required>

                <label for="additional_photos[]">Dodatkowe zdjecia</label>
                <input type="file" name="additional_photos[]" multiple>

                <label for="opis">Opis:</label>
                <textarea name="opis" id="opis" required></textarea>

                <label for="data">Data dodania:</label>
                <input type="date" name="data" id="data" required>

                <label for="cena">Cena:</label>
                <input type="text" name="cena" id="cena" required>

                <label for="przebieg">Przebieg:</label>
                <input type="text" name="przebieg" id="przebieg" required>

                <label for="rodzaj_paliwa">Rodzaj paliwa:</label>
                <input type="text" name="rodzaj_paliwa" id="rodzaj_paliwa" required>

                <label for="rocznik">Rocznik:</label>
                <input type="text" name="rocznik" id="rocznik" required>

                <input type="submit" value="Dodaj ogłoszenie">
            </form>
            <?php
                    if (isset($_GET['well'])) {
                        if ($_GET['well'] == 'true') {
                             echo "Ogłoszenie zostało pomyślnie dodane.";
                    } elseif ($_GET['well'] == 'false') {
                            echo "Nie udało się dodać ogłoszenia.";
                         }
                    }?>
        </div>
        <div class="card2">
            <h3>Zmien zdjecie ogloszenia</h3>
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="plik">
                <input type="submit" name="submit">
             </form>
        </div>
        <div class="card2">
            <h3>Usuwanie ogloszenia</h3>
            
                <!-- Formularz usuwania ogłoszenia -->
                    <form action="usun_ogloszenie.php" method="post">
                        <input type="text" name="delete_title" placeholder="Tytuł ogłoszenia do usunięcia">
                        <button type="submit" class="action-button delete">Usuń ogłoszenie</button>
                    </form>
                    <?php
                    if (isset($_GET['success'])) {
                        if ($_GET['success'] == 'true') {
                             echo "Ogłoszenie zostało pomyślnie usunięte.";
                    } elseif ($_GET['success'] == 'false') {
                            echo "Nie udało się usunąć ogłoszenia.";
                         }
                    }?>
        </div>
    </div>
</div>


</body>
</html>