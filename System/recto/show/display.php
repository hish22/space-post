<?php

namespace System\recto\show;
use System\recto\Portal;
// error_reporting(0);

abstract class Display extends Portal{

    protected static array $data = [];

    public static function inject(String $viewName,array $data) {
        self::$data = $data;
        self::view($viewName);
    }

    public static function view(String $viewName) {
        if(!array_key_exists($viewName,self::$ways)){echo "<h1 style='color:red'>View not found!</h1>";} 
        else{
            include_once("views/".self::$ways[$viewName]);
            die;
        }
    }

    public static function bring(String $search) : String | null {
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            return self::$data[$search];
        }
        return null;
    }

}