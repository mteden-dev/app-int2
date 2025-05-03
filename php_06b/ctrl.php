<?php
require_once 'init.php';

$router = new core\Router();

$router->addRoute('calcShow', 'app\\controllers', 'CreditCalcCtrl', 'generateView', 'user');
$router->addRoute('calcCompute', 'app\\controllers', 'CreditCalcCtrl', 'process', 'admin');
$router->addRoute('login', 'app\\controllers', 'LoginCtrl');
$router->addRoute('logout', 'app\\controllers', 'LogoutCtrl');

$router->setDefaultRoute('app\\controllers', 'HomeCtrl', 'generateView');

$router->execute();