<?php

/*
-----------------------------------------------
Load All required files from the routing system
-----------------------------------------------
*/

include_once("System/load.php");

use System\process\Process as bridgeProcess;
use System\recto\Process as RectoProcess;

include_once("ways/way.php");

/*
-------------------------------
List all process to be executed
-------------------------------
*/

bridgeProcess::process();
RectoProcess::process();
