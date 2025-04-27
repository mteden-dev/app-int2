<?php
// Przykładowy autoloader dla Smarty 5
spl_autoload_register(function ($class) {
    // Sprawdź, czy klasa należy do namespace'u Smarty
    if (strpos($class, 'Smarty\\') === 0) {
        $path = SMARTY_DIR . str_replace('\\', '/', substr($class, 7)) . '.php';
        if (file_exists($path)) {
            require_once $path;
            return true;
        }
    }
    return false;
});