<?php
// Autoloader dla Smarty 5
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

// Autoloader dla naszych klas (model i kontroler)
spl_autoload_register(function($class_name) {
    // Szukaj w katalogu model
    $path = _ROOT_PATH . '/app/model/' . $class_name . '.class.php';
    if (file_exists($path)) {
        require_once $path;
        return true;
    }
    
    // Szukaj w katalogu controller
    $path = _ROOT_PATH . '/app/controller/' . $class_name . '.class.php';
    if (file_exists($path)) {
        require_once $path;
        return true;
    }
    
    return false;
});