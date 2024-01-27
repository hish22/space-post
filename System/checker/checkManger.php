<?php 

namespace System\checker;

/**
 * -------------------------------------------
 * The checker manager can manage the checkers 
 * where they are executed before any logic.
 * -------------------------------------------
 */

abstract class checkerManger{

    protected static array $checkers = [
        0 => 'System\checker\activities\HelloCheker::check',
        1 => 'System\checker\activities\userChecker::check'
    ];

    protected static function operate(array $checker = null, int $incrementer = 0) {
        $checker = $checker ?? self::$checkers;
        if(count($checker) == $incrementer) { return; }
        call_user_func($checker[$incrementer]);
        (self::operate($checker,$incrementer + 1));
    }

    public abstract static function check();



}