<?php
namespace app\controllers;

class LogoutCtrl {
    
    public function process() {
        // Zdestrtuj sesję
        session_start();
        session_destroy();
        
        // redirect
        redirect(_ACTION_URL);
    }
}