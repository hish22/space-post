<?php

namespace System\logic;

use Closure;

interface Logic {

    function apply(): Closure;

}