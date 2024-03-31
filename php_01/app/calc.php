<?php
// KONTROLER kalkulatora kredytowego
require_once dirname(__FILE__).'/../config.php';

// 1. pobranie parametrów
$kwota = $_REQUEST['kwota'];
$lata = $_REQUEST['lata'];
$oprocentowanie = $_REQUEST['oprocentowanie'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku
$messages = array();

// sprawdzenie, czy parametry zostały przekazane
if (!(isset($kwota) && isset($lata) && isset($oprocentowanie))) {
    $messages[] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ($kwota == "") {
    $messages[] = 'Nie podano kwoty kredytu';
}
if ($lata == "") {
    $messages[] = 'Nie podano okresu kredytu';
}
if ($oprocentowanie == "") {
    $messages[] = 'Nie podano oprocentowania';
}

// nie ma sensu walidować dalej gdy brak parametrów
if (empty($messages)) {
    // sprawdzenie, czy $kwota, $lata i $oprocentowanie są liczbami
    if (!is_numeric($kwota)) {
        $messages[] = 'Kwota kredytu nie jest liczbą';
    }
    if (!is_numeric($lata)) {
        $messages[] = 'Okres kredytu nie jest liczbą';
    }
    if (!is_numeric($oprocentowanie)) {
        $messages[] = 'Oprocentowanie nie jest liczbą';
    }
}

// 3. wykonaj zadanie jeśli wszystko w porządku
if (empty($messages)) {
    $kwota = floatval($kwota);
    $lata = intval($lata);
    $oprocentowanie = floatval($oprocentowanie) / 100;

    $miesiace = $lata * 12;
    $rata = ($kwota * $oprocentowanie / 12) / (1 - pow(1 + $oprocentowanie / 12, -$miesiace));
    $rata = round($rata, 2);
}

// 4. Wywołanie widoku z przekazaniem zmiennych
include 'calc_view.php';