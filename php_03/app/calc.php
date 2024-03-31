<?php
// KONTROLER kalkulatora kredytowego

require_once dirname(__FILE__).'/../config.php';

//bramkarz
include dirname(__FILE__).'/security/check.php';

$kwota = null;
$lata = null;
$oprocentowanie = null;
$result = null;
$messages = array();

// 1. pobranie parametrów
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_REQUEST['kwota']) && isset($_REQUEST['lata']) && isset($_REQUEST['oprocentowanie'])) {
        $kwota = $_REQUEST['kwota'];
        $lata = $_REQUEST['lata'];
        $oprocentowanie = $_REQUEST['oprocentowanie'];
    } else {
        $messages[] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
    }
}

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($kwota == "") {
        $messages[] = 'Nie podano kwoty kredytu';
    }

    if ($lata == "") {
        $messages[] = 'Nie podano okresu kredytu';
    }

    if ($oprocentowanie == "") {
        $messages[] = 'Nie podano oprocentowania';
    }
}

// nie ma sensu walidować dalej gdy brak parametrów
if (empty($messages)) {
    // sprawdzenie, czy $kwota, $lata i $oprocentowanie są liczbami
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!is_numeric($kwota)) {
            $messages[] = 'Kwota kredytu nie jest liczbą';
        }

        if (!is_numeric($lata)) {
            $messages[] = 'Okres kredytu nie jest liczbą';
        }

        if (!is_numeric($oprocentowanie)) {
            $messages[] = 'Oprocentowanie nie jest liczbą';
        }

        // Sprawdzenie, czy okres kredytu jest większy od zera
        if (is_numeric($lata) && intval($lata) <= 0) {
            $messages[] = 'Okres kredytu musi być większy od zera';
        }

        // Sprawdzenie, czy oprocentowanie nie jest równe zero
        if (is_numeric($oprocentowanie) && floatval($oprocentowanie) == 0) {
            $messages[] = 'Oprocentowanie nie może być równe zero';
        }
    }
}

// 3. wykonaj zadanie jeśli wszystko w porządku
if (empty($messages)) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $kwota = floatval($kwota);
        $lata = intval($lata);
        $oprocentowanie = floatval($oprocentowanie) / 100;
        $miesiace = $lata * 12;

        // Sprawdzenie, czy $miesiace nie jest ujemne
        if ($miesiace < 0) {
            $messages[] = 'Nieprawidłowa liczba miesięcy kredytu';
        } else {
            if ($role === 'admin') { // Obliczaj ratę tylko dla administratora
                $rata = ($kwota * $oprocentowanie / 12) / (1 - pow(1 + $oprocentowanie / 12, -$miesiace));
                $rata = round($rata, 2);
            } else {
                $messages[] = 'Dostęp tylko dla administratora'; // Komunikat dla użytkownika
            }
        }
    }
}

// 4. Wywołanie widoku z przekazaniem zmiennych
include 'calc_view.php';