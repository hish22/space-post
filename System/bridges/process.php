<?php

namespace System\process;

use System\bridges\route;

class Process extends Route{

    private function __construct(){}

    protected static bool $triggered = false;

    public static function process() {
        if(!self::$triggered) {self::inspect();}
        self::$triggered = true;
    }

}
