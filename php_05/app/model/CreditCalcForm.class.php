<?php

class CreditCalcForm {
    public $kwota;
    public $lata;
    public $oprocentowanie;
    
    public function __construct($kwota = null, $lata = null, $oprocentowanie = null) {
        $this->kwota = $kwota;
        $this->lata = $lata;
        $this->oprocentowanie = $oprocentowanie;
    }
    

    public function setFromRequest($request) {
        $this->kwota = isset($request['kwota']) ? $request['kwota'] : null;
        $this->lata = isset($request['lata']) ? $request['lata'] : null;
        $this->oprocentowanie = isset($request['oprocentowanie']) ? $request['oprocentowanie'] : null;
    }
}