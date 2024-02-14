<?php

namespace System\checker;

abstract class Process extends checkerManger{

    protected static bool $triggered = false;

    public static function process() {
        if(!self::$triggered) {self::operate();}
        self::$triggered = true;
    }

}