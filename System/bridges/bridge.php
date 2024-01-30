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
    protected static array $params = [];
    protected static String $pattern = "/\{[a-zA-Z]+\}/";
    protected static bool $isDynamic = false;

    protected static function splitDynamic(String $path) : String {

        $uri = $_SERVER["REQUEST_URI"];

        $splited_uri = explode("/",$uri);

        $splited_path =  explode("/",$path);

        $rUri = "";
        // echo count($splited_path);
        for($i = 1; $i < count($splited_path);$i++) {
            if(count($splited_path) == count($splited_uri)) {
        
                if($splited_path[$i] == $splited_uri[$i]) {
                    $rUri .= "/". $splited_uri[$i];
        
                } elseif(preg_match(self::$pattern,$splited_path[$i])) {
                    $rUri .= "/". $splited_uri[$i];
                    preg_match("/[a-zA-Z0-9]+/",$splited_path[$i],$match);
                    $paramName = $match[0];
                    self::$params = [$paramName => $splited_uri[$i]];
                }
            }
        
        }
        return $rUri;

    }

    public static function get(String $path, Closure $executable) {
        if(!preg_match(self::$pattern,$path)) {
            array_push(self::$getRoutes,$path);
            array_push(self::$executable,$executable);
        } else {
            array_push(self::$getRoutes,self::splitDynamic($path));
            array_push(self::$executable,$executable);
            self::$isDynamic = true;
        }
    }

    public static function post(String $path, callable $executable) {
        array_push(self::$postRoutes,$path);
    }

}