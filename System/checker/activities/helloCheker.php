<?php

namespace System\checker\activities;
use System\checker\checkerManger;

abstract class HelloCheker extends checkerManger{
    public static function check() {
        if(!http_response_code() == 404) { return;}
        else{
            // echo "200 baby!";
        }
    }
}