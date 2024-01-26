<?php

namespace System\recto\show;
use System\recto\Portal;

abstract class Display extends Portal{

    public static function view(String $viewName) {
        foreach(self::$ways as $way => $file) {
            if($way == $viewName) {include_once("views/".$file); die;}
        }
    }

}