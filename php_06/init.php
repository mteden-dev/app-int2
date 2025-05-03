<?php
// Int
require_once 'config.php';
require_once 'core/functions.php';

session_start();

require_once 'core/Messages.class.php';

// autoloader
require_once 'core/ClassLoader.class.php';
$cLoader = new ClassLoader();
$cLoader->setBaseDir(_ROOT_PATH);
$cLoader->addStandardNamespaces(); // Użycie nowej metody
$cLoader->register();

// smarty - fix for Smarty 5
require_once _ROOT_PATH . '/vendor/autoload.php';

$smarty = new \Smarty\Smarty();
$smarty->setTemplateDir(_ROOT_PATH . '/app/views/templates/');
$smarty->setCompileDir(_ROOT_PATH . '/app/views/templates_c/');

// zmienne globalbe
global $messages;
$messages = new \core\Messages();

// zmienne
$smarty->assign('app_url', _APP_URL);
$smarty->assign('app_root', _APP_ROOT);
$smarty->assign('action_url', _ACTION_URL);
$smarty->assign('session', $_SESSION ?? []);