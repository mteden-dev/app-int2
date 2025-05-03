<?php

class ClassLoader {
    private $baseDir = '';
    private $namespaces = array();
    
    public function setBaseDir($dir) {
        $this->baseDir = $dir;
    }
    
    public function addNamespace($namespace, $dir) {
        $this->namespaces[$namespace] = $dir;
    }
    
    public function loadClass($class) {
        $class = ltrim($class, '\\');
        $namespace = '';
        $className = $class;
        
        if ($lastNsPos = strrpos($class, '\\')) {
            $namespace = substr($class, 0, $lastNsPos);
            $className = substr($class, $lastNsPos + 1);
        }
        
        foreach ($this->namespaces as $ns => $dir) {
            if ($namespace === $ns || strpos($namespace, $ns) === 0) {
                $fileName = str_replace('\\', '/', $namespace) . '/' . $className . '.class.php';
                $fileName = str_replace($ns, $dir, $fileName);
                $filePath = $this->baseDir . '/' . $fileName;
                
                if (file_exists($filePath)) {
                    require_once $filePath;
                    return true;
                }
            }
        }
        
        // Fallback
        $paths = array(
            $this->baseDir . '/app/forms/' . $className . '.class.php',
            $this->baseDir . '/app/models/' . $className . '.class.php',
            $this->baseDir . '/app/controllers/' . $className . '.class.php'
        );
        
        foreach ($paths as $path) {
            if (file_exists($path)) {
                require_once $path;
                return true;
            }
        }
        
        return false;
    }
    
    public function register() {
        spl_autoload_register(array($this, 'loadClass'));
    }

    public function addStandardNamespaces() {
        $this->addNamespace('app\\controllers', 'app/controllers');
        $this->addNamespace('app\\forms', 'app/forms');
        $this->addNamespace('app\\models', 'app/models');
        $this->addNamespace('core', 'core');
    }
}