<?php
define('_SERVER_NAME', 'localhost:8000');
define('_SERVER_URL', 'http://'._SERVER_NAME);
define('_APP_ROOT', '');
define('_APP_URL', _SERVER_URL._APP_ROOT);
define("_ROOT_PATH", dirname(__FILE__));
// define('SMARTY_DIR', _ROOT_PATH.'/libs/smarty/src/');
define('SMARTY_DIR', _ROOT_PATH.'/vendor/smarty/smarty/src/');

define('_ACTION_ROOT', '/ctrl.php?action=');
define('_ACTION_URL', _SERVER_URL._ACTION_ROOT);

// function out(&$param){
//     if (isset($param)){
//         echo $param;
//     }
// }
?>