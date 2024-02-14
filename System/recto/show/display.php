<?php

namespace System\recto\show;

use System\bridges\Bridge;
use System\recto\Portal;
// error_reporting(0);

class Display extends Portal{

    private static array $data = [];

    public static function build() {
        return new Display();
    }

    public function inject(array $data) {
        self::$data = $data;
    }

    public function view(String $viewName) {
        if(!array_key_exists($viewName,self::$ways)){echo "<h1 style='color:red'>View not found!</h1>";} 
        else{
            include_once("views/".self::$ways[$viewName]);
            die;
        }
    }

    public function redirect(String $route,array $params = []) {
        if(count($params) != 0) {
            $query = http_build_query($params);
            header("Location:".$route."?".$query,302);
        } else {
            header("Location:".$route,302);
        }
        
    }

    public static function bring(String $search) : String | null {
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            return self::$data[$search];
        }
        return null;
    }

}