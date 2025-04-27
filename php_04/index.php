<?php
//off deprecation
error_reporting(~E_DEPRECATED);
set_time_limit(120);

require_once dirname(__FILE__).'/config.php';
require_once dirname(__FILE__).'/autoload.php';
require_once SMARTY_DIR.'Smarty.php';
//raz działa raz nie, przy Smarty 5 nie powinno tego być

//przekierowanie przeglądarki klienta (redirect)
//header("Location: "._APP_URL."/app/calc_view.php");

//przekazanie żądania do następnego dokumentu ("forward")
include _ROOT_PATH.'/app/calc.php';