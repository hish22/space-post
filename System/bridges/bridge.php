<?php

namespace System\bridges;

use Closure;

/** 
* ----------------------------------
*@abstract Bridge is able to register a route.
* ----------------------------------
*/

abstract class Bridge {
    

    /**
     * -------------------------
     * @var array
     * Store get request routes.
     * -------------------------
     */
    protected static array $getRoutes = [];
    /**
     * --------------------------
     * @var array
     * Store post request routes.
     * --------------------------
     */
    protected static array $postRoutes = [];
    /**
     * --------------------------
     * @var array
     * Store executable closures.
     * --------------------------
     */
    protected static array $executable = [];
    /**
     * --------------------------
     * @var array
     * Store executable closures.
     * --------------------------
     */
    protected static array $params = [];
    /**
     * ----------------------------
     * @var string
     * Dynamic routes main pattern (regx).
     * ----------------------------
     */
    protected static String $pattern = "/\{[a-zA-Z]+\}/";
    /**
     * --------------------------------------
     * @var bool
     * Check whether a route is dynamic or not.
     * --------------------------------------
     */
    protected static bool $isDynamic = false;


    protected static int $dyg = 1;
    protected static int $stg = 1;

    protected static int $dyp = 1;
    protected static int $stp = 1;


    /**
     * Registering new get route method.
     * @method void get(String,Closure)
     * 
     */
    public static function get(String $path, Closure $executable) {

        if(preg_match(self::$pattern,$path)) {

            self::$getRoutes["dynamic" . self::$dyg++] = $path;

            self::$isDynamic = true;

        } else {

            self::$getRoutes["static" . self::$stg++] = $path;

        }


        self::$executable["get:".$path] = $executable;
        // array_push(self::$executable,$executable);

    }

    /**
     * Registering new post route method.
     * @method void post(String,Closure)
     * 
     */

    public static function post(String $path, Closure $executable) {
        if(preg_match(self::$pattern,$path)) {

            self::$postRoutes["dynamic" . self::$dyp++] = $path;

            self::$isDynamic = true;

        } else {

            self::$postRoutes["static" . self::$stp++] = $path;

        }
        self::$executable["post:".$path] = $executable;
    }

    /**
     * Rest the Dynamic validator.
     * @method void restDynamic()
     * 
     */
    protected static function restDynamic() {
        self::$isDynamic = false;
    }

}