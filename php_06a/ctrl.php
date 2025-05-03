<?php
require_once 'init.php';

// Pobieranie akcji z parametru
$action = getFromRequest('action', '');

// // Uprawnienia dla chronionych akcji
// $protected_actions = ['calcShow', 'calcCompute'];
// if (!isLogged() && in_array($action, $protected_actions)) {
//     header("Location: " . _ACTION_URL . "login");
//     exit();
// }

// Routing
switch ($action) {
    case 'calcShow':
        control('app\\controllers', 'CreditCalcCtrl', 'generateView', 'user');
        break;
    
    case 'calcCompute':
        control('app\\controllers', 'CreditCalcCtrl', 'process', 'admin');
        break;
    
    case 'login':
        if (isLogged() && isset($_SESSION['after_login_redirect'])) {
            $redirect = $_SESSION['after_login_redirect'];
            unset($_SESSION['after_login_redirect']);
            redirect($redirect);
        } elseif (isLogged()) {
            redirect(_ACTION_URL);
        }
        
        control('app\\controllers', 'LoginCtrl');
        break;
        
    case 'logout':
        session_start();
        session_destroy();
        redirect(_ACTION_URL);
        break;
    
    default:
        control('app\\controllers', 'HomeCtrl', 'generateView');
        break;
}