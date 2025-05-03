<?php
//off deprecation
ini_set('display_errors', 0);

error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
set_time_limit(120);

header("Location: ctrl.php");
exit;
?>

// require_once dirname(__FILE__).'/config.php';
// require_once dirname(__FILE__).'/autoload.php';
// require_once SMARTY_DIR.'Smarty.php';

// // Przekierowanie do skryptu akcji kalkulatora
// include _ROOT_PATH.'/app/calc.php';