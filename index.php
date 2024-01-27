<?php

/**
 * -----------------------------------------------
 * Load All required files from the routing system
 * -----------------------------------------------
 */


include_once("System/load.php");

use System\checker\Process as checkerProcess;
use System\process\Process as bridgeProcess;
use System\recto\Process as RectoProcess;

include_once("ways/way.php");

/**
 * -------------------------------
 * List all process to be executed
 * -------------------------------
 */

checkerProcess::process();
RectoProcess::process();
bridgeProcess::process();
