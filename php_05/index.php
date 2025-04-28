<?php
//off deprecation
error_reporting(~E_DEPRECATED);
set_time_limit(120);

require_once dirname(__FILE__).'/config.php';
require_once dirname(__FILE__).'/autoload.php';
require_once SMARTY_DIR.'Smarty.php';

// Przekierowanie do skryptu akcji kalkulatora
include _ROOT_PATH.'/app/calc.php';