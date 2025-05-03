<?php
require_once 'init.php';

// Pobieranie akcji z parametru
$action = getFromRequest('action', '');

// Uprawnienia dla chronionych akcji
$protected_actions = ['calcShow', 'calcCompute'];
if (!isLogged() && in_array($action, $protected_actions)) {
    include _ROOT_PATH.'/app/security/login.php';
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
        include _ROOT_PATH.'/app/security/login.php';
        break;
        
    case 'logout':
        include _ROOT_PATH.'/app/security/logout.php';
        break;
    
    default:
        $ctrl = new \app\controllers\HomeCtrl();
        $ctrl->generateView();
        break;
}