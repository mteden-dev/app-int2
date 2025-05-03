<?php
require_once 'init.php';

// Pobieranie akcji z parametru
$action = getFromRequest('action', '');

// Uprawnienia dla chronionych akcji
$protected_actions = ['calcShow', 'calcCompute'];
if (!isLogged() && in_array($action, $protected_actions)) {
    header("Location: " . _ACTION_URL . "login");
    exit();
}

// Routing
switch ($action) {
    case 'calcShow':
        $ctrl = new \app\controllers\CreditCalcCtrl();
        $ctrl->generateView();
        break;
    
    case 'calcCompute':
        $ctrl = new \app\controllers\CreditCalcCtrl();
        $ctrl->process();
        break;
    
    case 'login':
        $ctrl = new \app\controllers\LoginCtrl();
        $ctrl->process();
        break;
        
    case 'logout':
        session_start();
        session_destroy();
        header("Location: " . _ACTION_URL);
        exit();
        break;
    
    default:
        $ctrl = new \app\controllers\HomeCtrl();
        $ctrl->generateView();
        break;
}