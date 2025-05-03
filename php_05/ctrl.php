<?php
ini_set('display_errors', 0);
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

require_once 'config.php';
require_once 'autoload.php';
require_once SMARTY_DIR.'Smarty.php';

session_start();

// pobranie aactio z url
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

// check if log-in
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
$protected_actions = ['calcShow', 'calcCompute'];

if (empty($role) && in_array($action, $protected_actions)) {
    // loginr reroute
    include _ROOT_PATH.'/app/security/login.php';
    exit();
}

// Routing
switch ($action) {
    case 'calcShow' :
        // kalkulator
        require_once _ROOT_PATH.'/app/controller/CreditCalcCtrl.class.php';
        $ctrl = new CreditCalcCtrl();
        $ctrl->generateView();
        break;
    
    case 'calcCompute' :
        // wynik
        require_once _ROOT_PATH.'/app/controller/CreditCalcCtrl.class.php';
        $ctrl = new CreditCalcCtrl();
        $ctrl->process();
        break;
    
    case 'login':
        // login
        include _ROOT_PATH.'/app/security/login.php';
        break;
        
    case 'logout':
        // logout
        include _ROOT_PATH.'/app/security/logout.php';
        break;
    
    default :
        // default
        require_once _ROOT_PATH.'/app/controller/HomeCtrl.class.php';
        $ctrl = new HomeCtrl();
        $ctrl->generateView();
        break;
}
?>