<?php

namespace System\bridges;

/*
---------------------------------------------------------------------------------
route is the place where the request will be filltered to the wanted route (path)
---------------------------------------------------------------------------------
*/


// Bridge system included

use Closure;
use System\bridges\Bridge;

abstract class route extends Bridge{

    // private static bool $hit = false;

    protected static function inspect() {
        // Path from server headers.
            $uri = $_SERVER["REQUEST_URI"];
            $paths = self::$getRoutes;
            $executables = self::$executable;
            $counter = 0;

            foreach($paths as $path) {
                if(($uri == $path)) {self::give($executables[$counter]); die;} 
                $counter++;
            }

            self::absent();
        
    }
    
    protected static function give(Closure $executable) {
        http_response_code(200);
        $executable();
    }

    protected static function absent() {
        http_response_code(404);
        include_once("System/recto/404.php");
        die();
    }

}