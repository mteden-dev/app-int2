<?php

// wypisanie zmiennych
function out(&$param) {
    if (isset($param)) {
        echo $param;
    }
}

//przekierowanie od url
function redirect($url) {
    header("Location: " . $url);
    exit();
}

// generowanie url
function getActionUrl($action) {
    return _ACTION_URL . $action;
}

// pobieranie wartosci
function getFromRequest($param, $default = null) {
    return isset($_REQUEST[$param]) ? $_REQUEST[$param] : $default;
}

// logged in?
function isLogged() {
    return isset($_SESSION['role']) && !empty($_SESSION['role']);
}

// role check
function hasRole($role) {
    return isset($_SESSION['role']) && $_SESSION['role'] == $role;
}

// sprawdzanie roli admin
function isAdmin() {
    return hasRole('admin');
}

function storeRole($role) {
    $_SESSION['role'] = $role;
}

// fnkcja do automatycznego wywoływania kontrolera
function control($namespace, $class, $method = 'process', $requiredRole = null) {
    // Jeśli wymagana jest rola, sprawdź uprawnienia
    if ($requiredRole && !isLogged()) {
        // Użytkownik nie jest zalogowany - zapisz akcję do wykonania po zalogowaniu
        $_SESSION['after_login_action'] = getFromRequest('action', '');
        $_SESSION['after_login_params'] = $_REQUEST;
        
        global $messages;
        $messages->addError('Zaloguj się, aby kontynuować');
        
        // Przekierowanie do logowania
        redirect(_ACTION_URL . 'login');
        exit(); 
    } elseif ($requiredRole && !hasRole($requiredRole)) {
        // Użytkownik zalogowany ale ma niewłaściwą rolę
        if (!($requiredRole == 'user' && hasRole('admin'))) {
            global $messages;
            $messages->addError('Brak uprawnień - wymagana rola: ' . $requiredRole);
            redirect(_ACTION_URL);
            exit(); 
        }
    }
    
    // Określenie pełnej nazwy klasy
    $fullClassName = $namespace . '\\' . $class;
    
    // Utworzenie obiektu kontrolera
    $controller = new $fullClassName();
    
    // Wywołanie metody kontrolera
    return $controller->$method();
}

// funkcja do kontynuowania akcji po zalogowaniu
function continueAfterLogin() {
    if (isset($_SESSION['after_login_action']) && isset($_SESSION['after_login_params'])) {
        $action = $_SESSION['after_login_action'];
        $_REQUEST = array_merge($_REQUEST, $_SESSION['after_login_params']);
        
        // cleanup
        unset($_SESSION['after_login_action']);
        unset($_SESSION['after_login_params']);
        
        // wywołanie akcji
        header("Location: " . _ACTION_URL . $action);
        exit();
    }
}

// pobieranie listy parametrów z formularza do tablicy asocjacyjnej
function getParamsToForm(&$form) {
    if (isset($_REQUEST['form'])) {
        $form = $_REQUEST['form'];
    }
}

// funkcja do weryfikacji zalogowania z obsługą przekierowania
function requireLogin() {
    if (!isLogged()) {
        $_SESSION['after_login_redirect'] = $_SERVER['REQUEST_URI'];
        redirect(_ACTION_URL . 'login');
    }
}