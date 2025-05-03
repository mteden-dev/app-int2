<?php
// KONTROLER kalkulatora kredytowego (punkt wejścia)

require_once dirname(__FILE__).'/../config.php';
require_once dirname(__FILE__).'/../autoload.php'; 

// Sprawdzenie uprawnień (bramkarz)
include dirname(__FILE__).'/security/check.php';

// Klasa kontrolera zostanie dołączona przez autoloader

// Utworzenie i uruchomienie kontrolera
$ctrl = new CreditCalcCtrl();
$ctrl->run();