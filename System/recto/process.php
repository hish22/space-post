<?php

namespace System\recto;

abstract class Process extends Portal{

    protected static bool $triggered = false;

    public static function process() {
        if(!self::$triggered) {self::port(); }
        self::$triggered = true;
    }

}