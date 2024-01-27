<?php

namespace System\checker\activities;
use System\checker\checkerManger;

abstract class userChecker extends checkerManger{
    public static function check() {
        echo "This is user checker!";
    }
}