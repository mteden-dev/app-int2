<?php
// Kontroler kalkulatora kredytowego

// Zintegorwany autoloader (oby juz bez błedów scieżek)
class CreditCalcCtrl {
    private $form;     // obiekt formularza (CreditCalcForm)
    private $result;   // obiekt wyniku (CreditCalcResult)
    private $messages; // obiekt z komunikatami (Messages)
    private $hide_intro; // zmienna do ukrycia intro
    private $role;     // rola użytkownika


    public function __construct() {
        // Inicjalizacja właściwości
        $this->form = new CreditCalcForm();
        $this->result = new CreditCalcResult();
        $this->messages = new Messages();
        $this->hide_intro = false;
        
        // Pobranie roli z sesji - bez ponownego uruchamiania sesji

        $this->role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
    }


    public function getParams() {
        // Pobranie parametrów  GET lub POST
        $this->form->setFromRequest($_REQUEST);
    }


    public function validate() {
        if (empty($this->form->kwota)) {
            $this->messages->addError('Nie podano kwoty kredytu');
        }
        
        if (empty($this->form->lata)) {
            $this->messages->addError('Nie podano okresu kredytu');
        }
        
        if (empty($this->form->oprocentowanie)) {
            $this->messages->addError('Nie podano oprocentowania');
        }
        
        if ($this->messages->isError()) return false;
        
        if (!is_numeric($this->form->kwota)) {
            $this->messages->addError('Kwota kredytu nie jest liczbą');
        }
        
        if (!is_numeric($this->form->lata)) {
            $this->messages->addError('Okres kredytu nie jest liczbą');
        }
        
        if (!is_numeric($this->form->oprocentowanie)) {
            $this->messages->addError('Oprocentowanie nie jest liczbą');
        }
        
        if (is_numeric($this->form->lata) && intval($this->form->lata) <= 0) {
            $this->messages->addError('Okres kredytu musi być większy od zera');
        }
        
        if (is_numeric($this->form->oprocentowanie) && floatval($this->form->oprocentowanie) == 0) {
            $this->messages->addError('Oprocentowanie nie może być równe zero');
        }
        
        return !$this->messages->isError();
    }


    public function process() {
        // Konwersja parametrów na odpowiednie typy
        $kwota_calc = floatval($this->form->kwota);
        $lata_calc = intval($this->form->lata);
        $oprocentowanie_calc = floatval($this->form->oprocentowanie) / 100;
        $miesiace = $lata_calc * 12;
        
        // Po przejściu do kalkulatora ukryj intro
        $this->hide_intro = true;
        
        // Sprawdzenie, czy liczba miesięcy nie jest ujemna
        if ($miesiace < 0) {
            $this->messages->addError('Nieprawidłowa liczba miesięcy kredytu');
            return false;
        }
        
        // Sprawdzenie roli - tylko admin może obliczać ratę
        if ($this->role === 'admin') {
            if ($oprocentowanie_calc == 0) {
                if ($miesiace > 0) {
                    $this->result->rata = $kwota_calc / $miesiace;
                } else {
                    $this->result->rata = $kwota_calc;
                }
            } else {
                $this->result->rata = ($kwota_calc * $oprocentowanie_calc / 12) / (1 - pow(1 + $oprocentowanie_calc / 12, -$miesiace));
            }
            $this->result->rata = round($this->result->rata, 2);
        } else {
            $this->messages->addError('Dostęp tylko dla administratora');
            return false;
        }
        
        return true;
    }


    public function generateView() {
        $app_root = _APP_ROOT;
        global $app_url;
        
        // Smarty
        require_once SMARTY_DIR . 'Smarty.php';
        $smarty = new \Smarty\Smarty();
        
        $smarty->setTemplateDir(dirname(__FILE__) . '/../../app/templates/');
        
        // Przekazanie zmiennych do szablonu
        $smarty->assign('app_url', _APP_URL);
        $smarty->assign('app_root', $app_root);
        $smarty->assign('kwota', $this->form->kwota);
        $smarty->assign('lata', $this->form->lata);
        $smarty->assign('oprocentowanie', $this->form->oprocentowanie);
        $smarty->assign('rata', $this->result->rata);
        $smarty->assign('messages', $this->messages->getMessages());
        $smarty->assign('hide_intro', $this->hide_intro);
        
        // Dodatkowe ustawienia dla widoku
        $smarty->assign('page_title', 'Kalkulator Kredytowy');
        $smarty->assign('page_description', 'Profesjonalne szablonowanie oparte na bibliotece Smarty');
        $smarty->assign('page_header', 'Szablony Smarty');
        
        // Wygenerowanie widoku
        $smarty->display('calc.tpl');
    }
    

    public function run() {
        // Pobierz parametry
        $this->getParams();
        
        // Walidacja i wykonanie obliczeń tylko przy przesłanych danych
        if (isset($_REQUEST['kwota'])) {
            if ($this->validate()) {
                $this->process();
            }
        }
        
        // Wygeneruj widok
        $this->generateView();
    }
}