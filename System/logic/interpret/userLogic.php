<?php

namespace System\logic\interpret;

use Closure;
use System\logic\Logic;
use System\recto\show\Display;

class UserLogic implements Logic {

    public static function make() : UserLogic {
        return new self();
    }

    private function __construct(){}

    public function apply(): Closure {
        return function($params) {
            $view = Display::build();
            $view->inject($params);
            $view->view("user");
        };
    }

}