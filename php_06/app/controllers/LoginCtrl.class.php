<?php
namespace app\controllers;

use core\Messages;

class LoginCtrl {
    private $form;
    private $messages;
    
    public function __construct() {
        global $messages;
        $this->messages = $messages;
        $this->form = array();
    }
    
    public function getParams() {
        $this->form['login'] = isset($_REQUEST['login']) ? $_REQUEST['login'] : null;
        $this->form['pass'] = isset($_REQUEST['pass']) ? $_REQUEST['pass'] : null;
    }
    
    public function validate() {
        // Check
        if (!isset($this->form['login']) || !isset($this->form['pass'])) {
            return false; // nie ma walidacji bo nie ma danych
        }
        
        if ($this->form['login'] == "") {
            $this->messages->addError('Nie podano loginu');
        }
        if ($this->form['pass'] == "") {
            $this->messages->addError('Nie podano hasła');
        }
        
        if ($this->messages->isError()) {
            return false;
        }
        
        // check if correct
        if ($this->form['login'] == "admin" && $this->form['pass'] == "admin") {
            // logged in admin
            $_SESSION['role'] = 'admin';
            return true;
        } else if ($this->form['login'] == "user" && $this->form['pass'] == "user") {
            // logged in user
            $_SESSION['role'] = 'user';
            return true;
        }
        
        $this->messages->addError('Niepoprawny login lub hasło');
        return false;
    }
    
    public function process() {
        $this->getParams();
        
        if ($this->validate()) {
            // redirect to home
            header("Location: " . _ACTION_URL);
            exit();
        } else {
            // error
            $this->generateView();
        }
    }
    
    public function generateView() {
        // smarty
        $smarty = new \Smarty\Smarty();
        $smarty->setTemplateDir(_ROOT_PATH . '/app/views/templates/');
        
        // zmienne do szablonu
        $smarty->assign('app_url', _APP_URL);
        $smarty->assign('action_url', _ACTION_URL);
        $smarty->assign('form', $this->form);
        $smarty->assign('messages', $this->messages->getMessages());
        
        // view
        $smarty->display('login.tpl');
    }
}