<?php

namespace System\logic\interpret;

use Closure;
use System\logic\Logic;
use System\recto\show\Display;

class AboutLogic implements Logic{
    
    public static function make() : AboutLogic {
        return new self();
    }

    private function __construct(){}

    public function apply(): Closure {
        return function($params) {
            echo "This is About logic file!";
        };
    }

}