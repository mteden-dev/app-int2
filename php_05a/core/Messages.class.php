<?php

class Messages {
    private $messages = array();
    private $errors = array();
    private $infos = array();
    

    public function addError($message) {
        $this->errors[] = $message;
        $this->messages[] = $message;
    }
    

    public function addInfo($message) {
        $this->infos[] = $message;
        $this->messages[] = $message;
    }
    

    public function getErrors() {
        return $this->errors;
    }
    

    public function getInfos() {
        return $this->infos;
    }
    

    public function getMessages() {
        return $this->messages;
    }
    

    public function isError() {
        return count($this->errors) > 0;
    }
    

    public function isInfo() {
        return count($this->infos) > 0;
    }
    

    public function isEmpty() {
        return count($this->messages) == 0;
    }
    

    public function clear() {
        $this->messages = array();
        $this->errors = array();
        $this->infos = array();
    }
}