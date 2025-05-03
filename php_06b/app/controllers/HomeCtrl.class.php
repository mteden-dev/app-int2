<?php
namespace app\controllers;

use core\Messages;

class HomeCtrl {
    private $messages;

    public function __construct() {
        global $messages;
        $this->messages = $messages;
        // // Inicjalizacja sesji, jeśli jeszcze nie istnieje
        // if (session_status() == PHP_SESSION_NONE) {
        //     session_start();
        // }
    }

    public function process() {
        $this->generateView();
    }

    public function generateView() {
        global $app_url;
        
        // Inicjalizacja Smarty
        $smarty = new \Smarty\Smarty();
        
        // Fix templatki
        $smarty->setTemplateDir(_ROOT_PATH . '/app/views/templates/');
        
        // Przekazanie zmiennych do szablonu
        $smarty->assign('app_url', _APP_URL);
        $smarty->assign('action_url', _ACTION_URL);
        $smarty->assign('messages', $this->messages->getMessages());
        
        // Przekazanie zmiennych sesji do szablonu
        $smarty->assign('session', $_SESSION ?? []);
        
        // Ustawienia dla widoku
        $smarty->assign('page_title', 'Kalkulator Kredytowy');
        $smarty->assign('page_description', 'Witaj w kalkulatorze kredytowym');
        $smarty->assign('page_header', 'Strona główna');
        
        // Generowanie widoku
        $smarty->display('home.tpl');
    }
}
?>