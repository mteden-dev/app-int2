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
        $this->form['login'] = getFromRequest('login');
        $this->form['pass'] = getFromRequest('pass');
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
        // if logged in - redirect
        if (isLogged()) {
            redirect(_ACTION_URL);
        }
        
        $this->getParams();
        
        if ($this->validate()) {
            // if logged in check for action
            if (isset($_SESSION['after_login_action'])) {
                $action = $_SESSION['after_login_action'];
                $params = isset($_SESSION['after_login_params']) ? $_SESSION['after_login_params'] : array();
                
                // clean
                unset($_SESSION['after_login_action']);
                unset($_SESSION['after_login_params']);
                
                // ready?
                if (!empty($action)) {
                    redirect(_ACTION_URL . $action);
                }
            }
            
            // no action - go home
            redirect(_ACTION_URL);
        } else {
            // error
            $this->generateView();
        }
    }
    
    public function generateView() {
        $smarty = new \Smarty\Smarty();
        $smarty->setTemplateDir(_ROOT_PATH . '/app/views/templates/');
        
        $smarty->assign('app_url', _APP_URL);
        $smarty->assign('action_url', _ACTION_URL);
        $smarty->assign('form', $this->form);
        $smarty->assign('messages', $this->messages->getMessages());
        
        $smarty->display('login.tpl');
    }
}