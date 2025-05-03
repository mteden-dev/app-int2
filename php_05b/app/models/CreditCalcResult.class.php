<?php
namespace app\models;

class CreditCalcResult {
    public $rata;
    
    public function __construct($rata = null) {
        $this->rata = $rata;
    }
}