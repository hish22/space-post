<?php

namespace System\bridges;

use Closure;

/*
----------------------------------
Bridge is able to register a route.
----------------------------------
*/

abstract class Bridge {

    protected static array $getRoutes = [];
    protected static array $postRoutes = [];
    protected static array $executable = [];

    public static function get(String $path, Closure $executable) {
        array_push(self::$getRoutes,$path);
        array_push(self::$executable,$executable);
    }

    public static function post(String $path, callable $executable) {
        array_push(self::$postRoutes,$path);
    }

}