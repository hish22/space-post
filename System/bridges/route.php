<?php

namespace System\bridges;

/** 
* ---------------------------------------------------------------------------------
* route is the place where the request will be filltered to the wanted route (path)
* ---------------------------------------------------------------------------------
*/


// Bridge system included

use Closure;
use System\bridges\Bridge;

abstract class route extends Bridge{

    /**
     * --------------------------------
     * Map the dynamic route to static.
     * --------------------------------
     */
    protected static function splitDynamic(String $path) : String {

        $uri = $_SERVER["REQUEST_URI"];
        
        $splited_uri = explode("/",$uri);

        $splited_path =  explode("/",$path);

        $rUri = "";
        
        for($i = 1; $i < count($splited_path);$i++) {
            if(count($splited_path) == count($splited_uri)) {
        
                if($splited_path[$i] == $splited_uri[$i]) {
                    $rUri .= "/". $splited_uri[$i];
        
                } elseif(preg_match(self::$pattern,$splited_path[$i])) {
                    $rUri .= "/". $splited_uri[$i];
                }
            }
        
        }

        return $rUri;

    }

    /**
     * ------------------------------
     * Execute the routing operation.
     * ------------------------------
     */
    protected static function inspect() {
        // Path from server headers.
            $uri = $_SERVER["REQUEST_URI"];

            $paths = self::$getRoutes;

            $executables = self::$executable;

            $counter = 0;
            
            foreach($paths as $type => $path) {

                if(($uri == $path) && (str_starts_with($type,'static'))) {

                    self::give($executables[$counter]);
                    
                    die;
                
                } elseif(str_contains($type,'dynamic')) {
                    
                    $mappped_path = self::splitDynamic($path);
                    
                    if(($uri == $mappped_path)) {
                        self::identifyParams($path);

                        self::give($executables[$counter]);
                        
                        die;
                    
                    }
                
                }
                
                $counter++;                
            
            }

            self::absent();
        
    }

    /**
     * ----------------------------------
     * Identify the specified parameters.
     * ----------------------------------
     */
    protected static function identifyParams($path) {

        $splited_path = explode("/",$path);

        $splited_uri = explode("/",$_SERVER['REQUEST_URI']);


        for($i=1; $i < count($splited_path); $i++) {

            preg_match("/[a-zA-Z0-9]+/",$splited_path[$i],$match);

            $paramName = $match[0];

            self::$params[$paramName] = $splited_uri[$i];

        }

        
    }
    
    /**
     * ----------------
     * Execute specified closure.
     * ----------------
     */
    protected static function give(Closure $executable) {
        http_response_code(200);
        if(self::$isDynamic) {
            $executable(self::$params);
        } else {
            $executable();
        }
        
    }

    /**
     * -----------------------------------------------------
     * Execute absent operation due to absence of the route.
     * -----------------------------------------------------
     */
    protected static function absent() {
        http_response_code(404);
        include_once("System/recto/404.php");
        die();
    }

}