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

class route extends Bridge{

    private function __construct(){}

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
            $uri = explode("?",$_SERVER["REQUEST_URI"])[0];

            $method = $_SERVER['REQUEST_METHOD'];

            $paths = $method == "GET" ? self::$getRoutes : self::$postRoutes;

            $executables = self::$executable;

            $counter = 0;
            
            foreach($paths as $type => $path) {

                if(($uri == $path) && (str_starts_with($type,'static'))) {

                    self::resetDynamic();

                    self::give($method == "GET" ? $executables["get:".$path] : $executables["post:".$path]);
                    
                    die;
                
                } elseif(str_contains($type,'dynamic')) {
                    
                    $mappped_path = self::splitDynamic($path);
                    
                    if(($uri == $mappped_path)) {
                        self::identifyParams($path);

                        self::give($method == "GET" ? $executables["get:".$path] : $executables["post:".$path]);
                        
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

        $splited_uri = explode("/",explode("?",$_SERVER["REQUEST_URI"])[0]);


        for($i=1; $i < count($splited_path); $i++) {

            preg_match("/[a-zA-Z0-9]+/",$splited_path[$i],$match);

            $paramName = $match[0];

            self::$params[$paramName] = $splited_uri[$i];

        }

        
    }
    
    /**
     * --------------------------
     * Execute specified closure.
     * --------------------------
     */
    protected static function give(Closure $executable) {
        http_response_code(200);
        if(self::$isDynamic) {
            if($_SERVER['REQUEST_METHOD'] == "GET") {
                $executable(self::$params);
            } else {
                $executable(self::$params,$_POST);
            }
            
        } else {
            if($_SERVER['REQUEST_METHOD'] == "GET") {
                $executable();
            } else {
                $executable($_POST);
            }
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