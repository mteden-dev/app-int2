<?php
namespace app\controllers;

use core\Messages;
use app\forms\CreditCalcForm;
use app\models\CreditCalcResult;

class CreditCalcCtrl {
    private $form; 
    private $result; 
    private $messages; 
    private $hide_intro;
    
    public function __construct() {
        global $messages;
        $this->form = new CreditCalcForm();
        $this->result = new CreditCalcResult();
        $this->messages = $messages;
        $this->hide_intro = false;
    }
    
    public function getParams() {
        // Pobranie parametrów GET lub POST 
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
        $this->hide_intro = true;
        $this->getParams();
        
        if (isset($_REQUEST['kwota'])) {
            if ($this->validate()) {
                $kwota_calc = floatval($this->form->kwota);
                $lata_calc = intval($this->form->lata);
                $oprocentowanie_calc = floatval($this->form->oprocentowanie) / 100;
                $miesiace = $lata_calc * 12;
                
                if ($miesiace < 0) {
                    $this->messages->addError('Nieprawidłowa liczba miesięcy kredytu');
                } else {
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
                }
            }
        }
        
        $this->generateView();
    }
    
    public function generateView() {
        global $messages;
        
        // Odczytaj komunikaty błędów z sesji, jeśli istnieją
        if (isset($_SESSION['messages'])) {
            foreach ($_SESSION['messages'] as $msg) {
                $messages->addError($msg);
            }
            // Wyczyść komunikaty po wyświetleniu
            unset($_SESSION['messages']);
        }
        
        $smarty = new \Smarty\Smarty();
        $smarty->setTemplateDir(_ROOT_PATH . '/app/views/templates/');
        
        $smarty->assign('app_url', _APP_URL);
        $smarty->assign('action_url', _ACTION_URL);
        $smarty->assign('kwota', $this->form->kwota);
        $smarty->assign('lata', $this->form->lata);
        $smarty->assign('oprocentowanie', $this->form->oprocentowanie);
        $smarty->assign('rata', $this->result->rata);
        $smarty->assign('messages', $this->messages->getMessages());
        $smarty->assign('hide_intro', $this->hide_intro);
        
        $smarty->assign('page_title', 'Kalkulator Kredytowy');
        $smarty->assign('page_description', 'Profesjonalne szablonowanie oparte na bibliotece Smarty');
        $smarty->assign('page_header', 'Szablony Smarty');
        
        $smarty->display('calc.tpl');
    }
}