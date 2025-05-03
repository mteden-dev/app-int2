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