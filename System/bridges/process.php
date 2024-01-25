<?php

namespace System\process;

use System\bridges\route;

abstract class Process extends Route{

    protected static bool $triggered = false;

    public static function process() {
        if(!self::$triggered) {self::inspect();}
        self::$triggered = true;
    }

}
