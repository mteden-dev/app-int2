<?php
namespace core;

class Router {
    private $routes = array(); // tablica zawierająca trasy
    private $default = null;   // akcja domyślna
    
    /**
     * dodaje nową trasę
     * @param string $action Nazwa akcji
     * @param string $namespace Przestrzeń nazw kontrolera
     * @param string $controller Nazwa kontrolera
     * @param string $method Nazwa metody do wywołania
     * @param string|null $role Rola wymagana do dostępu (null = brak wymagań)
     */
    public function addRoute($action, $namespace, $controller, $method = 'process', $role = null) {
        $this->routes[$action] = array(
            'namespace' => $namespace,
            'controller' => $controller,
            'method' => $method,
            'role' => $role
        );
    }
    
    // trasa domyślna
    public function setDefaultRoute($namespace, $controller, $method = 'process') {
        $this->default = array(
            'namespace' => $namespace,
            'controller' => $controller,
            'method' => $method,
            'role' => null
        );
    }
    
    //uruchomienie routingu
    public function execute($action = null) {
        // jśli nie podano akcji, pobierz z żądania
        if (is_null($action)) {
            $action = getFromRequest('action', '');
        }
        
        // wyszukaj trasę
        if (array_key_exists($action, $this->routes)) {
            $route = $this->routes[$action];
        } else if (!empty($this->default)) {
            // użyj trasy domyślnej
            $route = $this->default;
        } else {
            // brak pasującej trasy i brak domyślnej
            $this->forwardTo("Błąd 404 - nie znaleziono akcji: " . $action);
            exit();
        }
        
        // sprawdź uprawnienia
        if (!is_null($route['role']) && !$this->hasRoleAccess($route['role'])) {
            // dodaj komunikat o braku uprawnień
            global $messages;
            
            if (isLogged()) {
                // Użytkownik jest zalogowany, ale ma niewystarczające uprawnienia
                $msg = 'Brak uprawnień do wykonania tej operacji - wymagana rola: ' . $route['role'];
                $messages->addError($msg);
                
                // Zapisz komunikat w sesji, aby był dostępny po przekierowaniu
                if (!isset($_SESSION['messages'])) $_SESSION['messages'] = [];
                $_SESSION['messages'][] = $msg;
                
                // Dla użytkowników kalkulatora - przekieruj z powrotem do widoku kalkulatora
                if ($action == 'calcCompute' && hasRole('user')) {
                    redirect(_ACTION_URL . 'calcShow');
                    exit();
                }
                
                // Dla innych przypadków - przekieruj na stronę główną
                redirect(_ACTION_URL);
            } else {
                // Użytkownik nie jest zalogowany - zapisz parametry akcji
                $_SESSION['after_login_action'] = $action;
                $_SESSION['after_login_params'] = $_REQUEST;
                $messages->addError('Musisz się zalogować - wymagana rola: ' . $route['role']);
                
                // Przekierowanie do logowania
                redirect(_ACTION_URL . 'login');
            }
            exit();
        }

        // wywołaj kontroler
        $this->callController($route);
    }
    
    // sprawdzenie uprawnien, naprawienie błędów, admin ma mieć dostęp do wszystkiego
    protected function hasRoleAccess($requiredRole) {
        if (!isLogged()) {
            return false;
        }
        
        if (hasRole('admin')) {
            return true;
        }
        
        return hasRole($requiredRole);
    }
    
    // wywołanie kontrolera
    protected function callController($route) {
        // określenie pełnej nazwy klasy
        $fullClassName = $route['namespace'] . '\\' . $route['controller'];
        
        // sprawdź czy klasa istnieje
        if (!class_exists($fullClassName)) {
            $this->forwardTo("Błąd 500 - nie znaleziono klasy kontrolera: " . $fullClassName);
            exit();
        }
        
        // utwórz instancję kontrolera
        $controller = new $fullClassName();
        
        // sprawdź czy metoda istnieje
        if (!method_exists($controller, $route['method'])) {
            $this->forwardTo("Błąd 500 - nie znaleziono metody kontrolera: " . $route['method']);
            exit();
        }
        
        // wywołaj metodę kontrolera
        return $controller->{$route['method']}();
    }
    
    // redirect do widoku błędu
    protected function forwardTo($message) {
        global $messages;
        $messages->addError($message);
        
        // Inicjalizacja Smarty do renderowania szablonu błędu
        $smarty = new \Smarty\Smarty();
        $smarty->setTemplateDir(_ROOT_PATH . '/app/views/templates/');
        
        // Przekazanie zmiennych do szablonu
        $smarty->assign('app_url', _APP_URL);
        $smarty->assign('action_url', _ACTION_URL);
        $smarty->assign('messages', $messages->getMessages());
        
        // Wyświetlenie szablonu błędu
        $smarty->display('error.tpl');
        exit;
    }
}