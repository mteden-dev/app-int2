<?php
class HomeCtrl {
    private $messages;

    public function __construct() {
        $this->messages = new Messages();
        // Inicjalizacja sesji, jeśli jeszcze nie istnieje
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function generateView() {
        global $app_url;
        
        // Inicjalizacja Smarty
        require_once SMARTY_DIR . 'Smarty.php';
        $smarty = new \Smarty\Smarty();
        
        $smarty->setTemplateDir(_ROOT_PATH . '/app/templates/');
        
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